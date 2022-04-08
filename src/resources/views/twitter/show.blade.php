@extends('layouts.app')
@section('content')
    <div>
{{--        <div class="alert alert-warning">--}}
{{--            <div>{{$twitt->id}}.{{$twitt->text}}</div>--}}
{{--        </div>--}}
        <div class="media">
            <h1>the twitt</h1>
            <div class="alert-warning">

                {{--                            <p class="pull-right"><small>5 days ago</small></p>--}}
                <p class="pull-right"><small>{{$twitt->difference}} days ago</small></p>
                <a class="media-left" href="#">
                    <img alt="" width="5%" height="5%"
                         src="{{asset('storage/images/'.$twitt->user->image)}}">
                </a>
                <div class="media-body">

                    <h4 class="media-heading user_name">{{$twitt->user->name}}</h4>
                    {{$twitt->text}}
                </div>

            </div>
        </div>

{{--        <div class="row">--}}
{{--            <div class="col-md-8">--}}
                <div class="page-header">
                    <h1><small class="pull-right">{{$countOfAnswers}} answers</small></h1>
                </div>
                <div class="comments-list">
                    @foreach($answers as $answer)
                        @include('twitter.answer', ['answer' => $answer])
                    @endforeach
                </div>


{{--            </div>--}}
{{--        </div>--}}
        <div>
            <form action="{{route('answer.save', $twitt->id)}}" method="post">

                @csrf
                <div class="form-group">
                    <label for="text">New answer</label>
                    <textarea class="form-control" name="value" id="text" placeholder="Text"></textarea>
                </div>
                <button>Save answer</button>
            </form>
        </div>
        @if($twitt->user_id == $auth_id)
        <div>
            <form action="{{route('twitts.delete', $twitt->id)}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="Delete" class="btn-danger">
            </form>
        </div>
        @endif
        <div>
            <a href="{{route('index')}}" class="btn btn-outline-danger">Back</a>

@endsection
