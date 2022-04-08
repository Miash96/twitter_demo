@extends('layouts.app')
@section('content')
    <div>
        <form action="{{route('twitts.update', $twitt->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="text">Your Twitt</label>
                <textarea type="text" name="text" class="form-control" id="text" placeholder="Text"> {{$twitt->text}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Edit message</button>
            <a href="{{route('index')}}" class="btn btn-outline-danger" >Back</a>
        </form>

@endsection
