<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChooseUs extends Model
{
    protected $table = 'chooseUsBlocks';
    protected $fillable = ['icon', 'title', 'text', 'delayTime'];
    use HasFactory;
}
