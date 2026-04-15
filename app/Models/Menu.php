<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'ms_menu';

    protected $primaryKey = 'id_menu';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'id_user',
        'nama_menu',
        'jenis',
        'harga',
        'gambar',
        'deskripsi',
        'status',
        'is_featured',
    ];
}
