<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable= ['product_name','product_price','product_quantity','short_description','long_description','product_image','publication_status'];
}
