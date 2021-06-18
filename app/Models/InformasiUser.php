<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiUser extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'informasi_user';
    protected $fillable = [
        'id_user',
        'nik',
        'nama',
        'alamat',
    ];
}
