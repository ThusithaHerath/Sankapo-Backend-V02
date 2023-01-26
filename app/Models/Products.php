<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
      'category'
      ];

    public function p_category(){

        return $this->belongsTo(Category::class, 'category');
         
      }
}
