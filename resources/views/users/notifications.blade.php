@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
       Notifiations
    </div>

    <div class="card-body">
        <ul class="list-group">
            @foreach ($notifications as $notification)
                <li class="list-group-item">
                    @if ($notification->type=='App\Notifications\AddReplyAdded')
                        A new reply added to the Discussion..
                        <strong>
                            {{$notification->first()->data['discussion']['title']}}
                        </strong>
                        <a href="{{route('discussion.show',$notification->first()->data['discussion']['slug'])}}" class="btn btn-info float-right btn-sm">View Discussion</a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
