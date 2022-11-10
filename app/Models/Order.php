<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetails;
use App\Models\OrderPayment;
use App\Models\User;
class Order extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function details(){

        return $this->hasMany(OrderDetails::class);
    }

    public function payments(){

        return $this->hasMany(OrderPayment::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }
}
