<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterKepalaDinas extends Model
{
    //
    use SoftDeletes;
    protected $table = 'master_kepala_dinas';
    protected $fillable = [
        'nama','user_id','flag','created_at','updated_at','deleted_at'
    ];

    function kepaladinas(){
		return $this->belongsTo('App\Models\MasterDinas','dinas_id');
    }
    
    function userkepala(){
		return $this->belongsTo('App\User','user_id');
	}
}
