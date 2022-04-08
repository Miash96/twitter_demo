<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerStoreRequest;
use App\Http\Requests\TwittUpdateRequest;
use App\Models\Twitt;
use Carbon\Carbon;

class MyTwitterController extends Controller
{
    public function index()
    {
        $auth_user_id = auth()->id();
        $twitts = Twitt::paginate(10);

        return view('twitts', compact('twitts', 'auth_user_id'));

    }

    public function create()
    {
        return view('twitter.create');
    }

    public function store(AnswerStoreRequest $request)
    {
        $user = auth()->user();
        $user_id = $user->id;

        Twitt::create([
            'text' => $request->input('text'),
            'user_id' => $user_id,

        ]);
        return redirect()->route('index');
    }

    public function edit(Twitt $twitt)
    {

        return view('twitter.edit', [
            'twitt' => $twitt
        ]);
    }

    public function update(Twitt $twitt, TwittUpdateRequest $request)
    {
        $user = auth()->user();
        if ($twitt->user_id == $user->id) {
            $twitt->update([
                'text' => request('text'),
                'user_id' => auth()->user()->id,]);
            return redirect()->route('index');
        }
    }

    public function show(Twitt $twitt)
    {
        $answersQuery = $twitt->answers()
            ->whereNull('parent_id')
            ->with('user');

        $countOfAnswers = $answersQuery->count();
        $answers = $answersQuery->get();
        $auth_id = auth()->id();
        return view('twitter.show', compact('twitt', 'answers', 'countOfAnswers', 'auth_id'));
    }

    public function destroy(Twitt $twitt)
    {
        $user = auth()->user();

        $answers = $twitt->answers()->get();

        foreach ($answers as $answer){
            $answer->delete();
        }

        if ($twitt->user_id == $user->id) {
            $twitt->delete();
        }
        return redirect()->route('index')->with('success', ' your twitt deleted successfully');
    }
}

