<?php

namespace App\model\MasterData;

use Illuminate\Database\Eloquent\Model;

class SatuanBesar extends Model
{
    //
    protected $table = "satuan_besar";

    protected $fillable = ['id',
    'nama_satuan_besar',
    'keterangan',
    'aktif'];

    protected $with = ['produk_item'];

    public function produk_item()
    {
            return $this->belongsTo('App\model\MasterData\ProdukItem', 'satuan_besar_id');
    }

    

}
