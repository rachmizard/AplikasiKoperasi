<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    protected $table = 'simpanan';
    protected $primarykey = 'id';
    protected $fillable = ['nm_simpanan','id_anggota','tgl_simpanan','besar_simpanan','ket'];

    public function anggota(){
        return $this->belongsTo('App\Anggota', 'id_anggota', 'id');
    }

}
