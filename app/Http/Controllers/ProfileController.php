<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(User $user ){
        return view('userProfile.profile', ['user' => $user]);
    }
    public function edit(User $user){
        return view('userProfile.edit', ['user' => $user]);

    }
    public function update(Request $request, User $user)
    {
        if($request->file('img') != ''){

            $fileName = time().$request->file('img')->getClientOriginalName();
            $image_path = $request->file('img')->storeAs('users', $fileName, 'public');

            $user->update(['img' => '/storage/'.$image_path]);
        }
        $validated = $user->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('profile.index')->with('message', __('messages.user_updated'));

    }
}
