<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UpdateController extends Controller
{
    public function edit(User $user, Request $request)
    {
        $new_name = $request->input('name');
        $user->name = $new_name;
        $user->save();

        $user->update([
           'name' => $new_name
        ]);
//        return view('edit', compact('user'));
        return redirect()->route('profile');
    }

}
