<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoty extends Model
{
    use HasFactory;
    protected $table ='categories';
    protected $fillable=[
        'id',
        'name',
        'image',
        'catalog',
    ];

    function CategoryProduct(){
        return $this->hasMany(Product::class,'category_id');
    }
    public $timestamps = false;
}
