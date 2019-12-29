<?php

namespace App\Http\Controllers\Pembayaran;

    use  App\User;
    use App\model\Pembayaran\Kas;
     use App\model\Pembayaran\Pembayaran;
    use \App\model\Registrasi1;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\Pembayaran\KasRequest;
    use App\model\MasterData\Dokter;
     use App\model\MasterData\Poli;
    use Illuminate\Http\Request;
    use Yajra\DataTables\DataTables;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Crypt;

class PembayaranDetilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Pembayaran::where('aktif','=','Y')->get();
       // dd($data);

         return view('pembayaran.pembayaran_detil.index',['data' => $data,'no' => 0,
            'subtitle'=>'Data Pembayaran',
            'title'=>'List Pembayaran Pasien']);
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
        $idx = Crypt::decrypt($id);
        $data = Pembayaran::find($idx);
        $dokter = Dokter::where('aktif','=','Y')->get();
        $poli = Poli::where('aktif','=','Y')->get();

         return view('pembayaran.pembayaran_detil.edit', ['data' => $data,
            'd'=> $dokter,
            'pol'=> $poli,
         'title' => 'Add Item Detil Pembayaran', 
         'subtitle' => 'List Item Detil Pembayaran']);
        //dd($data);
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
