<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahSakit extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'rs';
    protected $primaryKey = 'id_rs';
    protected $fillable = [
        'img',
        'nama_rs',
        'alamat',
        'jadwal',
        'keterangan',
        'no_telephone'
    ];

    public function registrasi(){
        return $this->hasMany(Registrasi::class, 'id_rs');
    }
}
