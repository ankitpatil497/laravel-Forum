<div class="card-header">
    <div class="d-flex justify-content-between">
        <div>
              <img height="40px" width="40px" style="border-radius: 50%" src="{{Gravatar::src($discussion->author->email )}}" alt="">
            <span class="font-weight-bold ml-2">{{$discussion->author->name}}</span> 
        </div>
        <div>
            <a href="{{route('discussion.show',$discussion->slug)}}" class="btn btn-success btn-sm">View</a>
        </div>
    </div>
</div>