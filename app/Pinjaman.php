<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    //
    protected $table = 'pinjaman'; 
    protected $primary = 'id';
    protected $fillable = ['nama_pinjaman','id_anggota','besar_pinjaman','tgl_pengajuan_peminjaman','tgl_acc_peminjaman','tgl_pinjaman','tgl_pelunasan','id_angsuran','ket'];

    public function anggota(){
        return $this->belongsTo('App\Anggota', 'id_anggota', 'id');
    }

}
