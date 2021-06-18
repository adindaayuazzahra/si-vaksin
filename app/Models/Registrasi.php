<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'pendaftaran';
    protected $primaryKey='id_pendaftaran';
    protected $fillable=[
        'id_user',
        'id_rs',
        'id_vaksin',
        'tanggal_vaksinasi',
        'jam_vaksinasi',
        'keterangan',
        'id_status',
    ];
}
