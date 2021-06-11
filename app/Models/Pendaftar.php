<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
    ];
}
