<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseLine extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function sizes()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
}
