<?php
namespace App\Providers;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Illuminate\Auth\Events\Registered' => [
            'App\Listeners\AssignDefaultRole',
            'App\Listeners\SendWelcomeEmail',
            'App\Listeners\SendActivationEmailListener',
        ],
        'App\Events\Application\Created' => [
            'App\Listeners\Application\SendApprovalNotification',
        ],
        'App\Events\Application\Updated' => [
            'App\Listeners\Application\SendAuthorizeNotification',
            'App\Listeners\Application\SendAuthorizedNotification',
            'App\Listeners\Application\SendRejectedNotification',
        ],
    ];
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        //
    }
}