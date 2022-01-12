<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view("register");
    }

    public function val_and_store()
    {
        $validatedData =  $this->validate(request(), [
            'name' => ['required', 'min:5', 'max:30'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required',
                'min:8',
                'required_with:confirm_password'
            ],
            'confirm_password' => ['min:8', 'same:password'],
            'gender' => ['required', 'in:M,F,ND']
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = new User;
        $user->user_name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];
        $user->gender = $validatedData['gender'];
        $user->role = 'customer';

        $user->save();

        request()->session()->flash('success', 'Registration successfull!');

        return redirect()->to('/login');
    }
}
