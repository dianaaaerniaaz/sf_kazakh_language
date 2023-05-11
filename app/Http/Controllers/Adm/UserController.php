<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        $users = null;
        if($request->search) {
            $users = User::where('name', 'LIKE', '%' . $request->search . '%')->
            orWhere('email', 'LIKE', '%' . $request->search . '%')
                ->with('role')->get();

        }else{
            $users = User::with('role')->get();
        }
        return view('adm.users',['users'=>$users]);
    }
    public function myProfile(){
        return view('userProfile.profile');
    }
}
