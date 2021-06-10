<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;
    protected $table = 'informasi_user';
    protected $fillable = [
        'img',
        'nik',
        'nama',
        'alamat',
        'provinsi',
    ];
}
