<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importa la fachada de autenticación
use Illuminate\Support\Facades\Log; // Para logging

class UserAuthController extends Controller
{
    /**
     * Muestra el formulario de login para usuarios de la ferretería.
     * (Aunque el formulario ya está en el dashboard, esta ruta podría ser para una página de login dedicada)
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth_ferreteria.login'); // Puedes crear esta vista si quieres una página de login dedicada
    }

    /**
     * Procesa las credenciales de login del usuario de la ferretería.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        Log::info('UserAuthController: login() - Attempting login for email: ' . $request->email);

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Intentar autenticar al usuario
        // Por defecto, Auth::attempt() usa el guard 'web'.
        // Si tienes un guard diferente para usuarios de ferretería, deberías especificarlo:
        // Auth::guard('ferreteria_guard')->attempt($credentials)
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            Log::info('UserAuthController: login() - User authenticated successfully: ' . $request->email);
            // Redirigir al usuario a la página principal de la ferretería o a donde desees
            return redirect()->intended(route('ferreteria.catalogo'))->with('success', '¡Bienvenido a la Ferretería!');
        }

        Log::warning('UserAuthController: login() - Authentication failed for email: ' . $request->email);
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    /**
     * Cierra la sesión del usuario de la ferretería.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout(); 

        $request->session()->invalidate(); // Invalida la sesión actual
        $request->session()->regenerateToken(); // Regenera el token CSRF

        Log::info('UserAuthController: logout() - User logged out.');
        return redirect('/')->with('success', 'Has cerrado sesión correctamente.'); // Redirige a la página de inicio
    }
}