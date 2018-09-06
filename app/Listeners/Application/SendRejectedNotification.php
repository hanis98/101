<?php
namespace App\Listeners\Application;
use App\Events\Application\Updated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
class SendRejectedNotification
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
     * @param  Updated  $event
     * @return void
     */
    public function handle(Updated $event)
    {
        if(! $event->application->is_approved) {
            $event
                ->application
                ->user
                ->notify(
                    new \App\Notifications\SendApplicationRejected()
                );
        }
    }
}