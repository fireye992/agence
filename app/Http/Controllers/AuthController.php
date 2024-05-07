<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function login()
    {
        // User::create([
        //     'name' => 'Tyler',
        //     'email' => 'tyler@durden.fr',
        //     'password' => Hash::make('12345')
        // ]);
        return view('auth.login');
    }

    public function dologin(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.propriete.index'));
        }

        return back()->withErrors([
            'email' => 'Non !'
        ])->onlyInput('email');
    }

    public function register(Request $request)
{
    // Validation des données du formulaire
    $validatedData = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ])->validate();

    // Création de l'utilisateur
    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
    ]);

    // Attribution du rôle ici, si nécessaire (supposons qu'un rôle par défaut soit attribué)
    // $user->assignRole('user'); // Assurez-vous que le package de gestion des rôles est configuré

    // Connexion de l'utilisateur après l'inscription
    Auth::login($user);

    // Redirection vers une route spécifique, par exemple le tableau de bord de l'utilisateur
    return redirect(route('dashboard'))->with('success', 'Inscription réussie et connexion effectuée!');
}

    public function logout()
    {
        Auth::logout();
        return to_route('login')->with('success', 'Déconnexion réussie');
    }
}
