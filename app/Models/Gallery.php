<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'ms_galeri'; 

    protected $primaryKey = 'id_galeri';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'id_user',
        'nama_gambar',
        'kategori',
        'image_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}