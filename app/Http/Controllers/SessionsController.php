<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create(){
    return view ('sessions.create');
    }

    public function store(){
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($attributes)){
            return redirect('/');
            //dd($attributes);

        }
        else{
            return Redirect::back()->withErrors(
                [
                    'email' => 'Invalid Credentials'
                ]
            );
        }
        // throw ValidationException::withMessages([
        //     'email' => 'Your Provide Credentials could not be verified'
        // ]);
        }

    public function  destroy(){
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye');
    }
}
