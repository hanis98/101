<?php
namespace App\Listeners\Application;
use App\Events\Application\Updated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
class SendAuthorizeNotification
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
        if($event->application->is_approved 
            && $event->application->status != \App\Models\Application::SUCCESS
            && is_null($event->application->authorized_by)
        ) {
            \App\User::permission('can authorize')
                ->get()
                ->each
                ->notify(
                    new \App\Notifications\NewAuthorizationApplication($event->application)
                );
        }
    }
}