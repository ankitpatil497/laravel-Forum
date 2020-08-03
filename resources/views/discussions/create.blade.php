@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-header">Add Discussions</div>

    <div class="card-body">
        <form action="{{route('discussion.store')}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
           
            <div class="form-group">
                <label for="content">Content</label>
                <input id="x" type="hidden" name="content">
                <trix-editor input="x"></trix-editor>
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


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" type="text/css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
@endsection

