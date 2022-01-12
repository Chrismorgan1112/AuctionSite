<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UpdateProfileController extends Controller
{
    //
    public function index($id){
        $user = User::Where('id', $id)->first();
        return view('updateProfileForm',['user'=>$user]);
    }

    public function update(Request $request, $id){
        $validateData = $request->validate([
            'username' => ['required', 'min:5', 'max:30'],
            'password' => [
                'required',
                'min:8',
                'required_with:confirm_password'
            ],
            'confirm-pass' => ['min:8', 'same:password'],
            'gender' => ['required', 'in:M,F']
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        Session::put('username_session', $validateData['username']);

        User::where('id', $id)->update(['user_name'=>$validateData['username'], 'password'=>$validateData['password'],'gender'=>$validateData['gender']]);
        
        request()->session()->flash('success', 'Update Profile successfull!');
        return redirect()->route('home');
    }
}
