<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;
    protected $table = 'vaksin';

    protected $primaryKey = 'id_vaksin';
    public $timestamps=false;
    protected $fillable = [
        'img',
        'nama_vaksin',
        'deskripsi',
        'harga'
    ];
}
