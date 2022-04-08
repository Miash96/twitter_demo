@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Communication</h3>
        <a href="{{route('twitts.create')}}">
            <button class="btn btn-primary">Create New Twitt</button>
        </a>
        @foreach($twitts as $twitt)
            <div class="alert alert-warning">

                <div class='float-rigth'>{{ $twitt->created_at }}</div>
                <br>
                <h6 class="text-break">{{ $twitt->text }}</h6>
                <br>
                <h6 class="text-break">{{ $twitt->user->name }}</h6>
                <a href="{{route('twitts.show',$twitt->id)}}" class="btn btn-info">Answers</a>
                @if($twitt->user_id == $auth_user_id)
                    <a href="{{route('twitts.edit',$twitt->id)}}" class="btn btn-success">Edit Twitt</a>
                    <form action="{{route('twitts.delete',$twitt->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                @endif
            </div>
        @endforeach
        <div>
            {{$twitts->links()}}
        </div>
@endsection
