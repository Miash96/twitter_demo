@extends('layouts.app')

@section('content')
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-10"><h1><p>{{$user->name}}</p></h1></div>
        </div>
        <div class="row">
            <div class="col-sm-3"><!--left col-->

                <form action="{{route('image.upload.post')}}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="text-center">
                        <img src="{{ asset('storage/images/'.$image) }}" alt="" width="400" height="260"/>

                        <h6>Upload a different photo...</h6>
                        <input type="file" name="image" class="text-center center-block file-upload">
                    </div><br>
                    <button type="submit">Upload avatar</button>
                </form>
                <form action="{{route('user.edit',['user'=>$user->id])}}" method="get" >
                    @csrf
                    <p>{{$user->name}}</p>
                    <input type="text" name="name">
                    <button type="submit">Change user name</button>
                </form>
            </div>
        </div>
    </div>
@endsection





