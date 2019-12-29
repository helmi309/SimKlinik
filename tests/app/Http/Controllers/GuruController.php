<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_guru = \App\model\Guru::paginate(10);
        return view('guru.index', ['data_guru'=>$data_guru,'no'=>'0','title'=>'Data guru','subtitle'=>'List guru']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $user = new \App\User;
        $user->role = 'guru';
        $user->name = $request->nama_guru;
        $user->email = $request->email;
        $user->password = bcrypt('12345678');
        $user->remember_token = str_random(60);
        $user->save();
        
        $request->request->add(['user_id'=>$user->id]); 
        $request->request->add(['avatar'=>'user.png']);      
        $guru= \App\model\Guru::create($request->all());
    //  return $request->all();
    return redirect('/guru')->with('sukses','Data Berhasil di input');
    
    }
    public function profile($id){
        $guru = \App\model\Guru::find($id);
       //dd($guru);
       return view('guru/profile',['guru' => $guru,'title'=> 'Guru Profile']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
