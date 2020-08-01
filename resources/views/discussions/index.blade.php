@extends('layouts.app')

@section('content')

@foreach ($diss as $discussion)
    <div class="card">
        <div class="card-header">
            <img height="40px" width="40px" style="border-radius: 50%" src="{{Gravatar::src($discussion->author->email )}}" alt="">
            <strong class="ml-2">{{$discussion->author->name}}</strong>
        </div>

        <div class="card-body">

            {!! $discussion->content !!}
        </div>
    </div>           
@endforeach
{{$diss->links()}}
@endsection


