<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function showLogin(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth.login');
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function showRegister(): \Illuminate\Contracts\View\View|Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth.register');
    }

    /**
     * @param Request $request
     * @return RedirectResponse|void
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user) {
                return redirect()->intended('/home');
            }
        } else {
            return back()->withErrors(['error' => 'Не вірно введено пошту або пароль']);
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function register(Request $request): RedirectResponse
    {

        $validatedData = $request->validate([
            'name' => 'string|required|unique:users',
            'email' => 'string|required|unique:users',
            'password' => 'string|required',
        ]);
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),

        ]);

        Auth::attempt(['email' => $user->email, 'password' => $validatedData['password']]);

        return redirect()->intended('/home');
    }

    /**
     * @param Request $request
     * @return Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
     */
    public function logout(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        Auth::logout();
        return redirect('/login');
    }
}
