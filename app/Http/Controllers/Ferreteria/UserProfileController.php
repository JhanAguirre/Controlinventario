<?php

namespace App\Http\Controllers\Ferreteria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    /**
     * Muestra el perfil del usuario autenticado.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $user = Auth::user();
        return view('ferreteria.profile.show', compact('user'));
    }

    /**
     * Muestra el formulario para editar el perfil del usuario.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user = Auth::user();
        return view('ferreteria.profile.edit', compact('user'));
    }

    /**
     * Actualiza el perfil del usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            // Agrega otros campos del perfil que quieras actualizar
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        // user->address = $request->address; // Ejemplo: Si tuvieras un campo de dirección

        // Solo actualiza la contraseña si se proporciona una nueva
        if ($request->filled('password')) {
            $request->validate([
                'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            ]);
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('ferreteria.profile.show')->with('success', 'Perfil actualizado exitosamente.');
    }

    /**
     * Muestra el historial de pedidos del usuario.
     * (Necesitarás implementar la lógica de Pedidos y su relación con el usuario)
     *
     * @return \Illuminate\View\View
     */
    public function showOrders()
    {
        $user = Auth::user();
        // Aquí necesitarías cargar los pedidos asociados a este usuario
        // Ejemplo: $orders = $user->orders()->orderBy('created_at', 'desc')->get();
        $orders = collect(); // Placeholder: Asume una colección vacía por ahora

        return view('ferreteria.profile.orders', compact('user', 'orders'));
    }
}