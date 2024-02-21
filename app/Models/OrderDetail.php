<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use  HasFactory;
    
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // lư dũ liệu vào database
    protected $fillable = [
        'order_id', 'product_id', 'price', 'quantity',
    ];
    public function prod(){
        return $this->hasOne(Product::class,'id','product_id');
    }
  
}