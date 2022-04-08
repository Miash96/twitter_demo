<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index(){
        $user = auth()->user();
        $image = $user->image;

        return view('profile', compact('image', 'user'));
    }
    public function create()
    {
        return view('user.create');
    }
    public function username()
    {
        return 'username';
    }
    /**
     * Помещает созданный ресурс в хранилище
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

    }

}
