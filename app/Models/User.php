<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = ['fullName', 'email', 'password', 'address', 'city'];
    protected $hidden = ['password'];

    public function roles(){
        return $this->belongsTo(Role::class);
    }
    public function reservations(){
        return $this->hasMany(Reservations::class);
    }
}
