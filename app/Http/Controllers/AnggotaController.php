<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;

class AnggotaController extends Controller
{
    public function index(){

    	$anggota = Anggota::orderBy('id', 'DESC')->paginate(10);
    	return view('anggota.index')->with('anggota', $anggota);

    }

    public function create() {
    	return view('anggota.create');
    }

    public function store(Request $request){
    	$this->validate($request, [
           'nama' => 'required', 
           'alamat' => 'required', 
           'tgl_lhr' => 'required',
           'tmp_lahir' => 'required',
           'j_kelamin' => 'required',
           'status' => 'required',
           'no_tlp' => 'required',
        ]);

    	$anggota = new Anggota();
    	$anggota->nama = $request->nama;
    	$anggota->alamat = $request->alamat;
    	$anggota->tgl_lhr = $request->tgl_lhr;
    	$anggota->tmp_lahir = $request->tmp_lahir;
    	$anggota->j_kelamin = $request->j_kelamin;
    	$anggota->status = $request->status;
    	$anggota->no_tlp = $request->no_tlp;
    	$anggota->save();
    	return redirect('home/anggota')->with('message', 'Data berhasil di tambahkan');;
    }

    public function show() {

    }

    public function edit($id) {

    	$anggota = Anggota::where('id', $id)->first();
    	return view('anggota.edit')->with('anggota', $anggota);

    }

    public function update(Request $request, $id) {
		$this->validate($request, [
           'nama' => 'required', 
           'alamat' => 'required', 
           'tgl_lhr' => 'required',
           'tmp_lahir' => 'required',
           'j_kelamin' => 'required',
           'status' => 'required',
           'no_tlp' => 'required',
        ]);

		$anggota = Anggota::find($id);
    	$anggota->nama = $request->nama;
    	$anggota->alamat = $request->alamat;
    	$anggota->tgl_lhr = $request->tgl_lhr;
    	$anggota->tmp_lahir = $request->tmp_lahir;
    	$anggota->j_kelamin = $request->j_kelamin;
    	$anggota->status = $request->status;
    	$anggota->no_tlp = $request->no_tlp;
    	$anggota->update();

    	return redirect('home/anggota')->with('messageedit', 'Data berhasil di edit');

    }

    public function destroy(Request $request, $id){
      $checked = $request->input('checked',[]);
    
        if ($checked == null) {
          return redirect('home/anggota')->with('messagehapusgagal', 'Anda belum menceklis beberapa data untuk di hapus!');        
        }else{
          Anggota::whereIn("id",$checked)->delete();
          return redirect('home/anggota')->with('messagehapus', 'Data berhasil di hapus!');        
        }

    }


}
