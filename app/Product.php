<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Table Name
    protected $table = 'products';

    //Primary key
    public $primaryKey = 'id';
    
    // Timestamps
    public $timestamps = true;
}
