<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use  HasFactory;
    
    protected $appends = ['totalPrice'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // lư dũ liệu vào database
    protected $fillable = [
        'name', 'phone', 'address', 'customer_id','status'
    ];

    public function details(){
        return $this-> hasMany(OrderDetail::class,'order_id','id');
    }

    public function getTotalPriceAttribute(){
        $t=0;
        foreach($this->details as $item){
            $t += $item-> price * $item-> quantity;
        }

        return $t;
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}