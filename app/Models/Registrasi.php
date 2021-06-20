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
        'id_pendaftaran',
        'id_user',
        'id_rs',
        'id_vaksin',
        'tanggal_vaksinasi',
        'jam_vaksinasi',
        'keterangan',
        'id_status',
    ];

    public function pembayaran(){
        return $this->hasOne(Pembayaran::class, 'id_pendaftaran');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user','id_user');
    }

    public function vaksin(){
        return $this->belongsTo(Vaksin::class, 'id_vaksin','id_vaksin');
    }

    public function rs(){
        return $this->belongsTo(RumahSakit::class, 'id_rs','id_rs');
    }

    public function status(){
        return $this->belongsTo(Status::class, 'id_status','id_status');
    }
}
