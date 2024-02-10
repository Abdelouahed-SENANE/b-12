<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Passenger;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //
    public function create(): View
    {

        return view('auth.signup');
    }

    public function passenger(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        // insert user to database
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->picture = 'vector.jpg';
        $user->password = Hash::make($request->password);
        $user->save();

        $passenger = new Passenger();
        $passenger->user_id = $user->id;
        $passenger->save();

        return redirect('/');
    }

    public function driver(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);


            // insert user to database
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->picture = 'vector.jpg';
            $user->password = Hash::make($request->password);
            $user->save();

            $driver = new Driver();
            $driver->user_id = $user->id;
            $driver->description = $request->description;
            $driver->registration = $request->registration;
            $driver->type_car = $request->type_car;
            $driver->save();

        return redirect('/');
    }

    public function login()
    {

        return view('auth.signin');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentiels = $request->only('email', 'password');
        if (Auth::attempt($credentiels)) {
            $request->session()->regenerate();
            if (Gate::allows('admin')) {
//              dd(Auth::user()->role);
                return redirect('/admin/dashboard');
            } else if (Gate::allows('passenger')) {
                return redirect('/mytrips');
            } else {
                return redirect('/mytrajets');
            }
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

}
