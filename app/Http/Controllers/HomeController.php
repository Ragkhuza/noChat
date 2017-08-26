<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Chat;
use App\User;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $allUser = User::where('id', '!=', $user->id)->get(['id', 'name']);
        return view('home', compact('user', 'allUser'));
    }

    public function sendMessage(Request $request)
    {
        if ($request->ajax()) {

            $message = new Chat;
            $message->from = Auth::user()->id;
            $message->to = $request->input('to');
            $message->message = $request->input('msg');
            $message->save();
        } else {
            return "error sending message!";
        }
    }

    public function messages($id)
    {
        $user = Auth::user();
        $messages = User::chat($user->id, $id);
        $from = User::find($id);
        return view('messages', compact('user', 'messages', 'from'));
    }

    public function refresh(Request $request)
    {
        if ($request->ajax()) {
            $chat = NULL;

            $chat = Chat::where('to', Auth::user()->id)->where('from', $request->from)
                ->where('created_at', '>', $request->timestamp)->get(['message', 'created_at']);

            return $chat;
        }
    }
}
