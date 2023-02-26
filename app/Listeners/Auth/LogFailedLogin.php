<?php

namespace App\Listeners\Auth;

use Illuminate\Auth\Events\Failed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Storage;

class LogFailedLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Failed  $event
     * @return void
     */
    public function handle(Failed $event)
    {
        $arrayExclusion = [
                   
                ];
                  
        $credentials = array_values($event->credentials)[0];
        
        if(!in_array($credentials, $arrayExclusion))
		{
            $guard = $event->guard;
            //$username = $event->user->first_name.' '.$event->user->last_name;
    		$message = '[ '.date('d-m-Y H:i:s').' ] user credential: [ '.$credentials.' ] with guard: [ '.$guard.' ] login Failed';
    		Storage::prepend('failedlogins.txt', $message);
		}
    }
}