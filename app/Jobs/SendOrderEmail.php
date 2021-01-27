<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use App\Models\Order;
use Log;

class SendOrderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {       
       $this->order = $order;       
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {        
        
        $recipient = 'steven@example.com';
        Mail::to($recipient)->queue(new OrderShipped($this->order));        
        Log::info('Emailed order ' . $this->order->id);

         /*$recipient = 'steven@example.com';
         Mail::to($recipient)->send(new OrderShipped($this->order));
         Log::info('Emailed order ' . $this->order->id);*/
    }
}
