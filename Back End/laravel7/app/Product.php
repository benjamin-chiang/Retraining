<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    protected $fillable = ['type_id', 'name', 'description', 'img', 'price'];

    public function productType()
    {
        return $this->hasOne(ProductType::class,'id','type_id');
    }

    public function productImgs()
    {
        return $this->hasMany(ProductImg::class, 'product_id', 'id');
    }
}
