<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\MyFirstNotification;
use Notification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

        /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function allUsers()

    {

        dd('Access All Users');

    }

    public function test(){
        return "yes";
    }


    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function adminSuperadmin()

    {

        dd('Access Admin and Superadmin');

    }


    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function superadmin()

    {

        dd('Access only Superadmin');

    }

    public function sendNotification(){
        $user = User::where('id', '4')->first();
       
        $details= [
            'greeting'=> 'Hii',
            'body'=> 'This is my first notification',
            'thanks'=> 'Thankyou for the noti',
            'actionText'=> 'View Site',
            'actionURL' => url('/'),
            'orderid' => '101'
        ];

        Notification::send($user,new MyFirstNotification($details));

        dd(done);
    }
}
