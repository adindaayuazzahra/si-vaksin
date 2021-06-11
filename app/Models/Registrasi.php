<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran';
    protected $primaryKey='id_pendaftaran';
    protected $fillable=[
        'id_user',
        'id_rs',
        'id_vaksin',
        'keterangan',
        'id_status'
    ];
}
