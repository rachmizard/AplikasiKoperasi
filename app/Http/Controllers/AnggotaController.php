<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;
use App\User;

class AnggotaController extends Controller
{
    public function index(){

    	$anggota = User::orderBy('id', 'DESC')->whereIn('role', ['ANGGOTA','BANNED', 'Not Activated'])->paginate(10);
    	return view('anggota.index')->with('anggota', $anggota);

    }

    public function create() {
    	return view('anggota.create');
    }

    public function store(Request $request){
    	$this->validate($request, [
           'name' => 'required', 
           'email' => 'required',
           'password' => 'required',
           'alamat' => 'required', 
           'tgl_lhr' => 'required',
           'tmp_lahir' => 'required',
           'j_kelamin' => 'required',
           'status' => 'required',
           'no_tlp' => 'required',
           'role' => 'required',
        ]);

      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = $request->password;
      $user->alamat = $request->alamat;
      $user->tgl_lhr = $request->tgl_lhr;
      $user->tmp_lahir = $request->tmp_lahir;
      $user->j_kelamin = $request->j_kelamin;
      $user->status = $request->status;
      $user->no_tlp = $request->no_tlp;
      $user->role = $request->role;
      $user->save();
    	return redirect('home/anggota')->with('message', 'Data berhasil di tambahkan');;
    }

    public function show() {

    }

    public function edit($id) {

    	$anggota = User::where('id', $id)->first();
    	return view('anggota.edit')->with('anggota', $anggota);

    }

    public function update(Request $request, $id) {
      $this->validate($request, [
           'name' => 'required', 
           'email' => 'required',
           'password' => 'required',
           'alamat' => 'required', 
           'tgl_lhr' => 'required',
           'tmp_lahir' => 'required',
           'j_kelamin' => 'required',
           'status' => 'required',
           'no_tlp' => 'required',
           'role' => 'required',
        ]);

      $user = User::find($id);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = $request->password;
      $user->alamat = $request->alamat;
      $user->tgl_lhr = $request->tgl_lhr;
      $user->tmp_lahir = $request->tmp_lahir;
      $user->j_kelamin = $request->j_kelamin;
      $user->status = $request->status;
      $user->no_tlp = $request->no_tlp;
      $user->role = $request->role;
      $user->update();
      return redirect('home/anggota')->with('messageedit', 'Data berhasil di edit!');;

    }

    public function destroy(Request $request, $id){
      $checked = $request->input('checked',[]);
    
        if ($checked == null) {
          return redirect('home/anggota')->with('messagehapusgagal', 'Anda belum menceklis beberapa data untuk di hapus!');        
        }else{
          User::whereIn("id",$checked)->delete();
          return redirect('home/anggota')->with('messagehapus', 'Data berhasil di hapus!');        
        }

    }


}
