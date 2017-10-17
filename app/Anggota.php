<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    protected $primarykey = 'id';
    protected $fillable = ['nama','alamat','tgl_lhr','tmp_lahir','j_kelamin','status','no_tlp'];

    public function simpanan(){
        return $this->hasMany('App\Simpanan', 'id');
    }

}
