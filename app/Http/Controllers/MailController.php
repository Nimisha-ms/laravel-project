<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Jobs\SendOrderEmail;
use App\Models\Order;
use Log;

use App\Mail\SendEmailMailable;


class MailController extends Controller
{
	public function index(){		

		$order = Order::findOrFail( rand(1,20) );
        SendOrderEmail::dispatch($order);
        
        Log::info('Dispatched order ' . $order->id);
        return 'Dispatched order ' . $order->id;

		/*$order = Order::findOrFail(rand(1,20));

		SendOrderEmail::dispatch($order);
		Log::info('Dispatched order '.$order->id);
		return "Dispatched order ".$order->id;
*/


		/*$recepient = 'steven@example.com';
		Mail::to($recepient)->send(new OrderShipped($order));
		return 'Sent order '.$order->id;*/
	}

	/*public function sendMail1(){
		Mail::to('bitfumes@gmail.com')->send(new SendEmailMailable());
	}*/
}
