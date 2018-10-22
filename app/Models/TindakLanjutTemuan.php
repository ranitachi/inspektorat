<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TindakLanjutTemuan extends Model
{
    use SoftDeletes;
    protected $table = 'tindak_lanjut_temuan';
    protected $fillable = ['detail_id','status','tindak_lanjut','paraf_inspektorat','keterangan','created_at','updated_at','deleted_at'];

    function detail()
    {
        return $this->belongsTo('App\Models\DetailTemuan','detail_id');
    }
}
