<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderUserMedia extends Model
{
    use HasFactory;

    protected $table = 'order_user_medias';

    protected $fillable = ['order_id','files','status','note'];

    public function order(){
        return $this->belongsToMany(Order::class,'order_id');
    }
}
