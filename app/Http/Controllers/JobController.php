<?php

namespace App\Http\Controllers;
use App\Jobs\SendWelcomeMail;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;

use Illuminate\Http\Request;

class JobController extends Controller
{
	public function processQueue(){ 
		
	  $emailJob = new SendWelcomeMail();
      dispatch($emailJob);
      echo 'Mail Sent';
	}

	public function processBitQueue(){ 		
		$sendbitJob = (new SendEmailJob())->delay(Carbon::now()->addSeconds(5));
		dispatch($sendbitJob);
		 echo 'Mail Sent Successfully';
	}
}
