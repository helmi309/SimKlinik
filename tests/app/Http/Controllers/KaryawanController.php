<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Karyawan;
use App\model\Grade;
use App\model\Departemen;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Karyawan::orderby('id', 'DESC')->paginate(10);
        $grade = Grade::all();
        $departemen = Departemen::all();
        //dd($departemen);
         return view('karyawan.index', ['data' => $data,
         'grade' => $grade,
         'departemen' => $departemen, 
          'no' => '0', 
         'title' =>   'Data Karyawan', 
         'subtitle' => 'List Karyawan']);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        try{
        Karyawan::create($request->All());
        return redirect('/karyawan')->with('sukses','Data Berhasil di simpan');
        } catch (\Exception $e) {
            // catch code
            return redirect('/karyawan')->with('gagal', 'Terjadi kesalahan.. ' . $e);
        }
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
