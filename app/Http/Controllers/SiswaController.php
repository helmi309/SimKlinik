<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SiswaController extends Controller
{
    //
    public function index(){

    	//$data_siswa = \App\model\Siswa::paginate(10);
        $data_siswa = \App\model\Siswa::with('mapel')->orderBy('created_at', 'DESC')->paginate(10);
    	return view('siswa.index',['data_siswa'=>$data_siswa,'no'=>'0','title'=>'Data Siswa','subtitle'=>'List Siswa']);
    }

    public function create(Request $request){
    
    // insert ke tabel user    
    //pada saat input siswa baru juga di input ke tabel user untuk login
    $user = new \App\User;
    $user->role = 'siswa';
    $user->name = $request->nama_depan;
    $user->email = $request->email;
    $user->password = bcrypt('12345678');
    $user->remember_token = str_random(60);
    $user->save();

    $request->request->add(['user_id'=>$user->id]); 
    $request->request->add(['avatar'=>'user.png']);      
    $siswa=	\App\model\Siswa::create($request->all());
    //	return $request->all();
    return redirect('/siswa')->with('sukses','Data Berhasil di input');
    }

    public function edit($id){
       $data = Crypt::decrypt($id);
       $siswa = \App\model\Siswa::find($data);
       // dd($siswa);
       return view('siswa/edit',['siswa' => $siswa]);
    }

    public function do_edit(Request $request,$id){

       // dd($request->all());
        $siswa = \App\model\Siswa::find($id);
        $siswa->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses','data berhasil di update');
    }

    public function profile($id){
        $data = Crypt::decrypt($id);
        $siswa = \App\model\Siswa::find($data);
       //dd($siswa);
       return view('siswa/profile',['siswa' => $siswa,'title'=> 'Siswa Profile']);
    }
}
