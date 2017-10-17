<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Simpanan;
use App\Anggota;

class SimpananController extends Controller
{
    public function index(){

    	$anggota = Anggota::all();
    	$simpanan = Simpanan::orderBy('id', 'DESC')->paginate(10);
    	return view('simpanan.index')->with('simpanan', $simpanan);

    }

    public function create() {
    	$anggota = Anggota::all();
    	return view('simpanan.create', compact('anggota', $anggota));
    }

    public function store(Request $request){
    	$this->validate($request, [
           'nm_simpanan' => 'required', 
           'id_anggota' => 'required', 
           'tgl_simpanan' => 'required',
           'besar_simpanan' => 'required',
           'ket' => 'required',
        ]);

    	$simpanan = new Simpanan();
    	$simpanan->nm_simpanan = $request->nm_simpanan;
    	$simpanan->id_anggota = $request->id_anggota;
    	$simpanan->tgl_simpanan = $request->tgl_simpanan;
    	$simpanan->besar_simpanan = $request->besar_simpanan;
    	$simpanan->ket = $request->ket;
    	$simpanan->save();
    	return redirect('home/simpanan')->with('message', 'Data berhasil di tambahkan');
    }

    public function show() {

    }

    public function edit($id) {

    	$simpanan = Simpanan::where('id', $id)->first();
    	$anggota = Anggota::all();
    	return view('simpanan.edit')->with('simpanan', $simpanan)->with('anggota', $anggota);

    }

    public function update(Request $request, $id) {
    	$this->validate($request, [
           'nm_simpanan' => 'required', 
           'id_anggota' => 'required', 
           'tgl_simpanan' => 'required',
           'besar_simpanan' => 'required',
           'ket' => 'required',
        ]);

    	$simpanan = Simpanan::find($id);
    	$simpanan->nm_simpanan = $request->nm_simpanan;
    	$simpanan->id_anggota = $request->id_anggota;
    	$simpanan->tgl_simpanan = $request->tgl_simpanan;
    	$simpanan->besar_simpanan = $request->besar_simpanan;
    	$simpanan->ket = $request->ket;
    	$simpanan->update();    

    	return redirect('home/simpanan')->with('messageedit', 'Data berhasil di edit');

    }

    public function destroy(Request $request, $id){
    	$checked = $request->input('checked',[]);
		
      	if ($checked == null) {
      		return redirect('home/simpanan')->with('messagehapusgagal', 'Anda belum menceklis beberapa data untuk di hapus!');      	
      	}else{
      		Simpanan::whereIn("id",$checked)->delete();
      		return redirect('home/simpanan')->with('messagehapus', 'Data berhasil di hapus!');      	
      	}

    }


}
