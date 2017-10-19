<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pinjaman;
use App\Anggota;

class PeminjamanController extends Controller
{
    public function index(){

    	$pinjaman = Pinjaman::orderBy('id', 'DESC')->paginate(10);
    	return view('pinjaman.index')->with('pinjaman', $pinjaman);

    }

    public function create() {
    	$anggota = Anggota::all();
    	return view('pinjaman.create')->with('anggota', $anggota);
    }

    public function store(Request $request){
    	$this->validate($request, [
           'nama_pinjaman' => 'required', 
           'id_anggota' => 'required', 
           'besar_pinjaman' => 'required',
           'tgl_pengajuan_peminjaman' => 'required',
           'tgl_acc_peminjaman' => 'required',
           'tgl_pinjaman' => 'required',
           'tgl_pelunasan' => 'required',
           'id_angsuran' => 'required',
           'ket' => 'required',
        ]);

    	$pinjaman = new Pinjaman();
    	$pinjaman->nama_pinjaman = $request->nama_pinjaman;
    	$pinjaman->id_anggota = $request->id_anggota;
    	$pinjaman->besar_pinjaman = $request->besar_pinjaman;
    	$pinjaman->tgl_pengajuan_peminjaman = $request->tgl_pengajuan_peminjaman;
    	$pinjaman->tgl_acc_peminjaman = $request->tgl_acc_peminjaman;
    	$pinjaman->tgl_pinjaman = $request->tgl_pinjaman;
    	$pinjaman->tgl_pelunasan = $request->tgl_pelunasan;
    	$pinjaman->id_angsuran = $request->id_angsuran;
    	$pinjaman->ket = $request->ket;
    	$pinjaman->save();
    	return redirect('home/pinjaman')->with('message', 'Data berhasil di tambahkan');;
    }

    public function show() {

    }

    public function edit($id) {

    	$pinjaman = Pinjaman::where('id', $id)->first();
    	$anggota = Anggota::all();
    	return view('pinjaman.edit')->with('pinjaman', $pinjaman)->with('anggota', $anggota);

    }

    public function update(Request $request, $id) {
    	$this->validate($request, [
           'nama_pinjaman' => 'required', 
           'id_anggota' => 'required', 
           'besar_pinjaman' => 'required',
           'tgl_pengajuan_peminjaman' => 'required',
           'tgl_acc_peminjaman' => 'required',
           'tgl_pinjaman' => 'required',
           'tgl_pelunasan' => 'required',
           'id_angsuran' => 'required',
           'ket' => 'required',
        ]);

    	$pinjaman = Pinjaman::find($id);
    	$pinjaman->nama_pinjaman = $request->nama_pinjaman;
    	$pinjaman->id_anggota = $request->id_anggota;
    	$pinjaman->besar_pinjaman = $request->besar_pinjaman;
    	$pinjaman->tgl_pengajuan_peminjaman = $request->tgl_pengajuan_peminjaman;
    	$pinjaman->tgl_acc_peminjaman = $request->tgl_acc_peminjaman;
    	$pinjaman->tgl_pinjaman = $request->tgl_pinjaman;
    	$pinjaman->tgl_pelunasan = $request->tgl_pelunasan;
    	$pinjaman->id_angsuran = $request->id_angsuran;
    	$pinjaman->ket = $request->ket;
    	$pinjaman->update();
    	return redirect('home/pinjaman')->with('messageedit', 'Data berhasil di edit');;

    }

    public function destroy(Request $request, $id){
      $checked = $request->input('checked',[]);
    
        if ($checked == null) {
          return redirect('home/pinjaman')->with('messagehapusgagal', 'Anda belum menceklis beberapa data untuk di hapus!');        
        }else{
          Pinjaman::whereIn("id",$checked)->delete();
          return redirect('home/pinjaman')->with('messagehapus', 'Data berhasil di hapus!');        
        }

    }


}
