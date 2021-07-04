<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'status';
    protected $primaryKey='id_status';
    protected $fillable=['status'];

    public function registrasi(){
        return $this->hasMany(Registrasi::class, 'id_status');
    }

}
