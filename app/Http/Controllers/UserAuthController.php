<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash; // Agrega esta línea para usar Hash
use App\Models\User; // Agrega esta línea para usar el modelo User

class UserAuthController extends Controller
{
    /**
     * Muestra el formulario de login para usuarios de la ferretería.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('ferreteria.login'); // Ahora devuelve la nueva vista dedicada
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

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            Log::info('UserAuthController: login() - User authenticated successfully: ' . $request->email);
            // Redirigir al usuario a la página principal de la ferretería (catálogo)
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

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Log::info('UserAuthController: logout() - User logged out.');
        return redirect('/')->with('success', 'Has cerrado sesión correctamente.');
    }

    /**
     * Muestra el formulario de registro para nuevos usuarios de la ferretería.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('ferreteria.register');
    }

    /**
     * Procesa los datos del formulario de registro y crea un nuevo usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        Log::info('UserAuthController: register() - Attempting registration for email: ' . $request->email);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // 'confirmed' asegura que password_confirmation coincida
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Autenticar al usuario recién registrado
        Auth::login($user);

        Log::info('UserAuthController: register() - User registered and logged in successfully: ' . $user->email);

        return redirect(route('ferreteria.catalogo'))->with('success', '¡Registro exitoso! Bienvenido a la Ferretería.');
    }
}