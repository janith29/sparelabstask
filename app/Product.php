<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    protected $table='product';
    protected $primarykey='id';
    protected $fillable=[
        'id','name', 'discription','image','price','created_at','updated_at'

];
}
