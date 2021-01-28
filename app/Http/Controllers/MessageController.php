<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Events\NewMessageNotification;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
   	public function __construct() {
   		$this->middleware('auth');
   	}

   	public function index(){
   		
   		$user_id = Auth::user()->id;
        $data = array('user_id' => $user_id);

        return view('broadcast', $data);
   	}

   	public function send(){
   		$message = new Message;
   		$message->setAttribute('from', 1);
   		$message->setAttribute('to', 2);
   		$message->setAttribute('message', 'Demo message from user 1 to user 2');
        $message->save();

        event(new NewMessageNotification($message));
   	}
}
