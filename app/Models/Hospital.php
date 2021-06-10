<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $table = 'rs';
    protected $primaryKey = 'id_rs';
    protected $fillable = [
        'img'.
        'nama_rs',
        'alamat',
        'provinsi',
        'keterangan',
        'no_telephone'
    ];
}
