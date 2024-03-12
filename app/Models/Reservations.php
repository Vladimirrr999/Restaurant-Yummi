<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    protected $table = 'reservations';
    protected $fillable = ['name', 'phone', 'date', 'time', 'peopleNumber', 'message', 'user_id'];
    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class);
    }
}
