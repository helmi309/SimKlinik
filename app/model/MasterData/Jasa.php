<?php

namespace App\model\MasterData;

use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    //
    protected $table = 'jasa';

    protected $fillable = [
        'id',
        'kode',
        'nama_jasa',
        'jasakatagori_id',
        'harga_jual',
        'fee_dokter',
        'fee_asisten',
        'fee_staff',
        'keterangan',
        'aktif'
    ];
}
