<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function imageUpload()
    {
        return view('imageUpload');
    }

    public function imageUploadPost(Request $request)
    {
        $user = auth()->user();
//        dd($user);
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8166',
        ]);
        $imageName =$user->id . '-'. time() . '.' . $request->image->extension();

        if($user->image !== $imageName)
        {
            Storage::delete('/public/images/' . $user->image);

            $request->image->storeAs('public/images', $imageName);

            $user->image = $imageName;

            $user->save();
        }

        return back()
            ->with('success', 'You have successfully upload image.')
            ->with('image', $imageName);
    }
}
