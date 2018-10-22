<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PivotUserDinas extends Model
{
    protected $table='pivot_user_dinas';
    protected $fillable = [
        'user_id','dinas_id','flag','created_at','updated_at','deleted_at'
    ];

    function dinas()
    {
        return $this->belongsTo('App\Models\MasterDinas','dinas_id');
    }
    function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
