<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    protected $fillable = ['name', 'id', 'prioty'];
    use HasFactory;
    public function Products()
    {
        return $this-> hasMany(ProductModel::class, 'category_id', 'id');
    }
    public function scopeSearch($query)
    {
        if($key = request() -> key){
            $query = $query -> where('name','like', '%'.$key.'%');
        }
        return $query;
    }
}  
