<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerStoreRequest;
use App\Models\Answer;
use App\Models\Twitt;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Parent_;

class AnswerController extends Controller
{
    public function saveOneByTwitt(Twitt $twitt, AnswerStoreRequest $request)
    {
        $answer = $twitt->answers()->create([
            'value' => $request->input('value'),
            'user_id' => auth()->id()
        ]);

        return redirect()->back();
    }

    public function createKidAnswer(Answer $parentAnswer)
    {

        return view('twitter.create_kid_answer', compact('parentAnswer'));
        dd($parentAnswer);
    }

    public function storeKidAnswer(Answer $parentAnswer, AnswerStoreRequest $request)
    {
        Answer::query()->create([
            'parent_id' => $parentAnswer->id,
            'value' => $request->input('value'),
            'twitt_id' => $parentAnswer->twitt_id,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('twitts.show', ['twitt' => $parentAnswer->twitt_id]);
        return redirect()->back();
    }

    public function clearAnswer(Answer $answer)
    {
        $answer->update([
            'value' => 'Answer was cleared'
        ]);

        return redirect()->back();
    }

}

