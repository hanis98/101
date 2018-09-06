<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Peralatan extends Model
{
    protected $guarded = ['id'];
    public function applications()
    {
        return $this->belongsToMany('App\Models\Application');
    }
}