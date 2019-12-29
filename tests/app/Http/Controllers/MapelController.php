<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapelController extends Controller
{
    //
     public function index(){

    	$mapel = \App\model\Mapel::paginate(10);
    	return view('mapel.index',
    		['mapel'=>$mapel,
    		'no'=>'0',
    		'title'=>'Data Mata Pelajaran',
    		'subtitle'=>'List Mata Pelajaran']);
    }
     public function create(Request $request){
    
    // insert ke tabelmapel   
    //pada saat input mapel baru juga di input ke tabel user untuk login
   

    
    $mapel=	\App\model\Mapel::create($request->all());
    //	return $request->all();
    return redirect('/mapel')->with('sukses','Data Berhasil di input');
    }

    public function edit($id){
        $mapel = \App\model\Mapel::find($id);
       // dd($mapel);
       return view('mapel/edit',['mapel' => $mapel]);
    }

    public function do_edit(Request $request,$id){

       // dd($request->all());
        $mapel = \App\model\Mapel::find($id);
        $mapel->update($request->all());
      
        return redirect('/mapel')->with('sukses','data berhasil di update');
    }
}
