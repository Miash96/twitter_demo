@extends('layouts.app')
@section('content')
    <form action="{{route('kid_answer.store', $parentAnswer->id)}}" method="post">

        @csrf
        <div class="form-group">
            <label for="text">New answer</label>
            <textarea class="form-control" name="value" id="text" placeholder="Text"></textarea>
        </div>
        <button>Save answer</button>
    </form>
@endsection
