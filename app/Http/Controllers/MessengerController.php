<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessengerController extends Controller
{
    public function index($id=null)
    {
        $user=Auth::user();
//        $chats=$user->conversations()->with([
//            'lastMessage',
//            'participants'=>function($builder) use($user){
//            $builder->where('id','<>',$user->id);
//            }
//        ])->get();
//        $activeChat=new Conversation();
//        $messages=[];
//        if($id)
//        {
//            $activeChat=$chats->where('id',$id)->first();
//            $messages=$activeChat->messages()->with('user')->paginate();
//        }
        $friends=User::where('id','<>',Auth::id())->orderBy('name')->paginate();
        return view('messenger',compact('friends'));
    }
}
