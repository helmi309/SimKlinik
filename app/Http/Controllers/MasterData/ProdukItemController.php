<?php

namespace App\Http\Controllers\MasterData;

    use  App\User;
    use App\model\MasterData\ProdukItem;
    use App\model\MasterData\SatuanBesar;
    use App\model\MasterData\SatuanKecil;
    use App\model\MasterData\ProdukKatagori;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\MasterData\ProdukItemRequest;
    use Illuminate\Http\Request;
    use Yajra\DataTables\DataTables;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Crypt;

class ProdukItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $produkitem;

    public function __construct(ProdukItem $produkitem)
    {
        $this->produkitem = $produkitem;
    }


    public function index()
    {
        //
        $satuanbesar = SatuanBesar::where('aktif','=','Y')->get();
        $satuankecil = SatuanKecil::where('aktif','=','Y')->get();
        $produkkatagori = ProdukKatagori::where('aktif','=','Y')->get();
        $row    = $this->produkitem->orderBy('id', 'desc')->paginate(200);

        //dd($produkkatagori);
            return view('masterData.produkitem.index')->with([
                'data'     => $row,
                'title'    => 'Data Produk Item',
                'subtitle' => 'List Produk Item',
                'no'       => '0',

            ]);
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
