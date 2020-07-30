@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end md-2">
    <a href="{{route('discussion.create')}}" class="btn btn-success">Add Discussion</a>
</div>

@foreach ($diss as $discussion)
    <div class="card">
        <div class="card-header">
            {{$discussion->title}}
        </div>

        <div class="card-body">

            {!! $discussion->content !!}
        </div>
    </div>           
@endforeach
{{$diss->links()}}
@endsection


