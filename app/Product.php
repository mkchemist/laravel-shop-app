<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "name",
        "price",
        "brand",
        "category_id",
        "sale",
        "tags",
        "desc",
        "thumb_link"
    ];

    public function category() {
        return $this->belongsTo("App\Category","category_id", "id");
    }
}
