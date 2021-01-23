<?php

namespace App\Http\Controllers;
use App\Jobs\SendWelcomeMail;

use Illuminate\Http\Request;

class JobController extends Controller
{
	public function processQueue(){ 
		
	  $emailJob = new SendWelcomeMail();
      dispatch($emailJob);
      echo 'Mail Sent';
	}
}
