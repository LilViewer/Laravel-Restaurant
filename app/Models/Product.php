<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        'id',
        'name',
        'price',
        'count',
        'description',
        'image',
        'category_id ',
        'created_at',
        'updated_at',
    ];

    function ProductCategories(){
        return $this->belongsTo(Categoty::class,'category_id');
    }
}
