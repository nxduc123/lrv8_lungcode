<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'product';
   // join 1 -1
   public function cat()
   {
       return $this -> hasOne(CategoryModel::class, 'id', 'category_id');
   }
}
