<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Discussion;
use App\Http\Requests\CreateDiscussionRequest;
use App\Reply;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{

    public function __construct(){
        $this->middleware(['auth','verified'])->only(['create','store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('discussions.index',[
            'diss'=>Discussion::filterbyChannels()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discussions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiscussionRequest $request)
    {  
        auth()->user()->discusion()->create([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'content'=>$request->content,
            'channel_id'=>$request->channel
        ]);

        session()->flash('succes','Discussion Posted Successfully');
        return redirect()->route('discussion.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {
        return view('discussions.hello',[
            'discussion'=>$discussion
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reply(Discussion $discussion,Reply $reply){

        $discussion->markAsBestReply($reply);

        session()->flash('success','Marked As best Reple...');
        return redirect()->back();

    }
}
