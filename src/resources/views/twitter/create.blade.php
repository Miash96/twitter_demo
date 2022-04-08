@extends('layouts.app')
@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
        {!! implode('', $errors->all('<div>:message</div>')) !!}
        </div>
    @endif
   <div>
       <form action="{{route('twitts.store')}}" method="post">
           @csrf
           <div class="form-group">
               <label for="text">New Twitt</label>
               <textarea class="form-control" name="text" id="text"  placeholder="Text"></textarea>
           </div>
           <button type="submit" class="btn btn-success">Create</button>
       </form>
   </div>
@endsection
