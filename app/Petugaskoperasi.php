<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugaskoperasi extends Model
{
    protected $table = 'petugas_koperasi';
    protected $id = 'id';
    protected $fillable = ['nama','alamat','no_tlp','tmp_lhr','tgl_lhr'];
}
