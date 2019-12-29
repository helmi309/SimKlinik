<?php

namespace App\model\MasterData;

use Illuminate\Database\Eloquent\Model;

class Jasakatagori extends Model
{
    //
    protected $table = 'jasakatagori';

    protected $fillable = [
        'id',
        'nama_jasakatagori',
        'keterangan',
        'aktif'

    ];
}
