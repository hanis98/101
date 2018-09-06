<?php
namespace App\Models;
use App\Events\Application\Created as ApplicationCreated;
use App\Events\Application\Updated as ApplicationUpdated;
use Illuminate\Database\Eloquent\Model;
class Application extends Model
{
    const EXTERNAL = 1;
    const INTERNAL = 2;
    
    const IN_PROGRESS = 1;
    const SUCCESS = 2;
    const REJECTED = 3;
    protected $guarded = ['id'];
    protected $dates = [
        'started_at', 'ended_at',
        'approved_at', 'authorized_at',
    ];
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => ApplicationCreated::class,
        // if ask for authorization, use event() helper in ApprovalController
        // 'updated' => ApplicationUpdated::class,
    ];
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
    public function items()
    {
        return $this->belongsToMany('App\Models\Peralatan')
            ->as('peralatan')
            ->withPivot('quantity')
            ->wherePivot('quantity', '>', 0);
    }
    public function peralatan()
    {
        return $this->belongsToMany(Peralatan::class, 'application_peralatan')
            ->as('peralatan')
            ->withPivot('quantity');
    }
    public function approver()
    {
        return $this->belongsTo(\App\User::class, 'approved_by')->withDefault();
    }
    public function authorizer()
    {
        return $this->belongsTo(\App\User::class, 'authorized_by')->withDefault();
    }
}