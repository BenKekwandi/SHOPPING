<?php

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $fillable=['user_id','order_no','order_status_id'];
}