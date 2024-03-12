<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['blockId', 'src', 'title', 'price', 'ingredients', 'category_id'];
    use HasFactory;
    public function categories(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
