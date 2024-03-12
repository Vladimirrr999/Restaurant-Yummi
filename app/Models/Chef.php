<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    protected $table = 'chefs';
    protected $fillable = ['delay', 'img', 'name', 'jobDesc', 'about'];
    use HasFactory;
}
