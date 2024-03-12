<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCounter extends Model
{
    protected $table = 'customersCounters';
    protected $fillable= ['statCounter', 'title'];
    use HasFactory;
}
