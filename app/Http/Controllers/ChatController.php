<?php

namespace App\Http\Controllers;

use App\Chat;
use App\RoomChat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rchat = RoomChat::where('author_id', '=', Auth::user()->id)
            ->orWhere('penerima_id', '=', Auth::user()->id)
            ->orderBy('created_at','desc')->get();
        return view('chat.index', compact('rchat'));
    }

    public function inbox()
    {
        $rchat = RoomChat::where('penerima_id', '=', Auth::user()->id)
            ->orderBy('created_at','desc')->get();
        return view('chat.index', compact('rchat'));
    }

    public function sent()
    {
        $rchat = RoomChat::where('author_id', '=', Auth::user()->id)
            ->orderBy('created_at','desc')->get();
        return view('chat.index', compact('rchat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::where('id', '!=', Auth::user()->id )->get();
        return view('chat.compose', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah_room = new RoomChat();
        $tambah_room->author_id = Auth::user()->id;
        $tambah_room->subj = $request['subj'];
        $tambah_room->body = $request['body'];
        $tambah_room->author_id = Auth::user()->id;
        $tambah_room->penerima_id = $request['penerima'];
        $tambah_room->save();

        return redirect()->to('/chat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rchat = RoomChat::where('id', '=', $id)->first();
        return view('chat.show', compact('rchat'));
    }

    public function reply(Request $request, $id)
    {
        $chat = new Chat();
        $chat->author_id = Auth::user()->id;
        $chat->body = $request['body'];
        $chat->room_chat_id = $id;
        $chat->save();

        return redirect()->to('/chat/'.$id);
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
}
