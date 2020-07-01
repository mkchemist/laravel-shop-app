<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        "name",
        "price",
        "brand",
        "category_id",
        "sale",
        "tag",
        "desc",
        "thumb_link"
    ];
}
