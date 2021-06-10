<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table='Pembayaran';
    protected $primaryKey='id_pembayaran';
    protected $fillable=[
        'id_pendaftaran',
        'total_harga'
    ];
}
