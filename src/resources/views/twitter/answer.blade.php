<div class="media">
    <div class="alert-info">

        {{--                            <p class="pull-right"><small>5 days ago</small></p>--}}
        <p class="pull-right"><small>{{$answer->difference}} days ago</small></p>
        <a class="media-left" href="#">
            <img alt="" width="5%" height="5%"
                 src="{{asset('storage/images/'.$answer->user->image)}}">
        </a>
        <div class="media-body">

            <h4 class="media-heading user_name">{{$answer->user->name}}</h4>
            {{$answer->value}}

            <p><small><a href="{{route('kid_answer.create', $answer->id)}}">do answer</a></small></p>
            @if($answer->user_id == $auth_id)
                <p><small><a class="text-danger" href="{{route('answer.clear', $answer->id)}}">clear answer</a></small>
                </p>
            @endif
        </div>

    </div>
</div>

@foreach($answer->kids as $kid_answer)
    <div style="margin-left: 10%">
        @include('twitter.answer', ['answer' => $kid_answer])
    </div>

@endforeach
