<?php
namespace App\Listeners\Application;
use App\Events\Application\Created;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
class SendApprovalNotification
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
     * @param  Created  $event
     * @return void
     */
    public function handle(Created $event)
    {
        \App\User::permission('can approve')
            ->get()
            ->each
            ->notify(
                new \App\Notifications\NewApprovalApplication($event->application)
            );
    }
}