<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function create_account()
    {
        return view('auth.create');
    }

    public function login_post_user(CreateUserRequest $request)
    {
        $values = $request->validated();

        $user = new User();
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->phone = $request->input('telephone');
        $user->adresse = $request->input('adresse');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = 0;
        $user->save();
        if ($user) {
            return redirect()->route('user.login')->with('success', 'Inscription effectuée avec succès. Vous pouvez vous connecter');
        } else {
            return back()->with('erreur', 'Erreur d\'enregistrement Veillez contacter notre service client');
        }
       

    }

    public function login()
    {
        // User::create([
        //     'name' => 'moussa',
        //     'last_name' => 'samake',
        //     'phone' => '77612839',
        //     'adresse' => 'Moribabougou',
        //     'email' => 'moussasamake884@gmail.com',
        //     'password' => Hash::make(11111),
        //     'role' => 1,
        // ]);
        

        return view('auth.login');
    }
    public function login_user()
    {
        return view('auth.login_user');
    }
    public function login_post(LoginRequest $request)
    {

        $values = $request->validated();

        if (Auth::attempt($values)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.categorie'));
        }

        return to_route('user.login')->withErrors([
            'email' => 'Véfieir votre email et votre mot de passe',
        ])->onlyInput('email');
    }
   
    // public function login_post_user(LoginRequest $request)
    // {

    //     $values = $request->validated();

    //     if (Auth::attempt($values)) {
    //         $request->session()->regenerate();
    //         return redirect()->intended(route('credit.form'));
    //     }

    //     return to_route('user.login')->withErrors([
    //         'email' => 'Véfieir votre email et votre mot de passe',
    //     ])->onlyInput('email');
    // }



}
