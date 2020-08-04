@extends('layouts.app')

@section('content')
    <div class="card">
        @include('partials.discussion-header')

        <div class="card-body">
            <div class="text-center">
                <strong>
                    {{ $discussion->title}}
                </strong>
            </div>
            <hr>{!!$discussion->content!!}  

            @if ($discussion->bestReply)
                <div class="card bg-success my-5" style="color: white">

                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <img height="40px" width="40px" style="border-radius: 50%" src="{{Gravatar::src($discussion->bestReply->owner->email )}}" alt="">
                                <strong>
                                    <span class="font-weight-bold ml-2">{{$discussion->bestReply->owner->name}}</span> 
                                </strong>
                            </div>
                            <div style="color: rgb(160, 0, 0)">
                                <strong>
                                    BEST REPLY
                                </strong>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {!!$discussion->bestReply->content!!}
                    </div>
                </div>
            @endif
        </div>
    </div>         
    @foreach ($discussion->replies()->paginate(3) as $reply)
        <div class="card my-3">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <img height="40px" width="40px" style="border-radius: 50%" src="{{Gravatar::src($reply->owner->email )}}" alt="">
                        <span class="font-weight-bold ml-2">{{$reply->owner->name}}</span> 
                    </div>
                    <div>
                        @auth
                            @if (auth()->user()->id==$discussion->user_id)
                            <form action="{{route('mark-best-reply',['discussion'=>$discussion->slug,'reply'=>$reply->id])}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-info btn-sm" style="color: #fff">Mark as best reply</button>
                            </form>
                            @endif
                        @endauth
                    </div>
                </div>
                
            </div>
            <div class="card-body">
                <hr>{!!$reply->content!!}

               
            </div>
        </div>   
             
    @endforeach  
    {{$discussion->replies()->paginate(3)->links()}}
    <div class="card my-5">
        <div class="card-header">
            Add Reply
        </div>
        <div class="card-body">
            @auth
                <form action="{{route('reply.store',$discussion->slug)}}" method="POST">
                    @csrf
                    <input type="hidden" name="reply" id="reply">

                    <input id="x" type="hidden" name="content">
                    <trix-editor input="x"></trix-editor>

                    <button type="submit" class="btn btn-success my-2 btn-sm">Add Reply</button>
                </form>
                @else
                  <a href="{{route('login')}}" style="width: 100%; colour=#fff" class="btn btn-success my-2">Sing in to Add Reply</a>
            @endauth
        </div>
    </div>
    
@endsection


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" type="text/css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
@endsection

