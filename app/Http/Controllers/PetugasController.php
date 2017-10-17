<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petugaskoperasi;

class PetugasController extends Controller
{
    public function index(){

    	$petugas = Petugaskoperasi::orderBy('id', 'DESC')->paginate(10);
    	return view('petugas.index')->with('petugas', $petugas);

    }

    public function create() {
    	return view('petugas.create');
    }

    public function store(Request $request){
    	$this->validate($request, [
           'nama' => 'required', 
           'alamat' => 'required', 
           'no_tlp' => 'required',
           'tgl_lhr' => 'required',
           'tmp_lhr' => 'required',
        ]);

    	$petugas = new Petugaskoperasi();
    	$petugas->nama = $request->nama;
    	$petugas->alamat = $request->alamat;
    	$petugas->no_tlp = $request->no_tlp;
    	$petugas->tgl_lhr = $request->tgl_lhr;
    	$petugas->tmp_lhr = $request->tmp_lhr;
    	$petugas->save();
    	return redirect('home/petugas')->with('message','Petugas berhasil di tambahkan');
    }

    public function show() {

    }

    public function edit($id) {

    	$petugas = Petugaskoperasi::where('id', $id)->first();
    	return view('petugas.edit')->with('petugas', $petugas);

    }

    public function update(Request $request, $id) {
    	$this->validate($request, [
           'nama' => 'required', 
           'alamat' => 'required', 
           'no_tlp' => 'required',
           'tgl_lhr' => 'required',
           'tmp_lhr' => 'required',
        ]);

    	$petugas = Petugaskoperasi::find($id);
    	$petugas->nama = $request->nama;
    	$petugas->alamat = $request->alamat;
    	$petugas->no_tlp = $request->no_tlp;
    	$petugas->tgl_lhr = $request->tgl_lhr;
    	$petugas->tmp_lhr = $request->tmp_lhr;
    	$petugas->update();
    	return redirect('home/petugas')->with('messageedit','Petugas berhasil di edit');

    }


    public function destroy(Request $request, $id){
      $checked = $request->input('checked',[]);
    
        if ($checked == null) {
          return redirect('home/petugas')->with('messagehapusgagal', 'Anda belum menceklis beberapa data untuk di hapus!');        
        }else{
          Petugas::whereIn("id",$checked)->delete();
          return redirect('home/petugas')->with('messagehapus', 'Data berhasil di hapus!');        
        }

    }   


}
