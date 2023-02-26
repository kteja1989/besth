<?php

namespace App\Listeners\Auth;

use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Storage;

class LogSuccessfulLogout
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
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $arrayExclusion = [
                 
            	];
                  
        $username = $event->user->name;
        
        if(!in_array($username, $arrayExclusion))
        {
            $message = '[ '.date('d-m-Y H:i:s').' ] user: [ '.$username.' ] logged out';
            Storage::prepend('logoutactivity.txt', $message);
        }
    }
}
