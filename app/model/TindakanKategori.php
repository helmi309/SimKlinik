<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class TindakanKategori extends Model
{
    //
    protected $table = 'tindakan_katagori';
    protected $fillable = ['nama_tindakan_katagori','keterangan','aktif','create_at', 'update_at'];
}
