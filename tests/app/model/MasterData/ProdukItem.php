<?php

namespace App\model\MasterData;

use Illuminate\Database\Eloquent\Model;

class ProdukItem extends Model
{
    //

    protected $table="produk_item";

    protected $fillable=['id',
    'kode',
    'nama_tindakan',
    'katagori_item_id',
    'satuan_besar_id',
    'satuan_kecil_id',
    'isi_satuan',
    'harga_beli',
    'harga_jual',
    'fee_dokter',
    'fee_asisten',
    'fee_staff',
    'keterangan',
    'stok',
    'stok_max',
    'stok_min',
    'aktif'];

}
