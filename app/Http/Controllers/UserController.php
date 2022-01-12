<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::where('role', '!=', 'admin')->get();
        return view('admin.manage-user', ['customers' => $customers]);
    }

    public function delete($id){
        $user = User::findOrFail($id);

        if(isset($user)){
            Storage::delete('public/'.$user->image_path);
            $user->delete();
        }

        return redirect("/home");
    }
}
