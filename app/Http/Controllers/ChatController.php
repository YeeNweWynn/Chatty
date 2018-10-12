<?php

namespace App\Http\Controllers;

use App\Chat;
use App\User;
use Illuminate\Http\Request;
use Auth;
class ChatController extends Controller
{
    public function show($id)
    {
        $friend=User::find($id);
        return view('chat.show',compact('friend'));
    }

    public function getChat($id)
    {
        $messages = Chat::where(function ($query) use ($id){
            $query->where('user_id',Auth::id())->where('friend_id',$id);
        })->orWhere(function ($query) use ($id){
            $query->where('friend_id',Auth::id())->where('user_id',$id);
        })->get();
        return $messages;
    }

    public function postChat(Request $request)
    {
        $chat = new Chat();
        $chat->user_id = $request->user_id;
        $chat->friend_id = $request->friend_id;
        $chat->message = $request->message;
        $chat->save();
    }
}
