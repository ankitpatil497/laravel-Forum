@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-header">Add Discussions</div>

    <div class="card-body">
       <form action="{{route('discussion.store')}}" method="POST">
           @csrf

           <div class="form-group">
               <label for="title">Title</label>
               <input type="text" class="form-control">
           </div>
           
           <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea> 
            </div>
            <div class="form-group">
                <label for="channle">Channels</label>
                <select name="channel" id="channel" class="form-control">
                    <option value="">--Select--</option>
                    @foreach ($channels as $channel)
                        <option value="{{$channel->id}}">{{$channel->name}}</option>        
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Create Discussion</button>

       </form>
    </div>
</div>
@endsection
