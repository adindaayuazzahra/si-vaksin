<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table='pembayaran';
    public $timestamps=false;
    protected $primaryKey='id_pembayaran';
    protected $fillable=[
        'id_pembayaran',
        'id_pendaftaran',
        'tgl_pembayaran',
        'total_harga',
    ];

    public function registrasi(){
        return $this->belongsTo(Registrasi::class, 'id_pendaftaran','id_pendaftaran');
    }
}
