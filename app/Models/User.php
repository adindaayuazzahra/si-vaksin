<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // public $timestamps=false;
    protected $table = 'user';
    protected $primaryKey='id_user';
    protected $fillable=[
        'id_user',
        'username',
        'email',
        'nama',
        'password',
        'level',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
    public function informasiuser(){
        return $this->hasOne(informasiUser::class, 'id_user');
    }

    public function registrasi(){
        return $this->hasMany(Registrasi::class, 'id_user');
    }
}
