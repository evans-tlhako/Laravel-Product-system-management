<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderPlace extends Model
{
    //Table Name
    protected $table = 'orders';

    //Primary key
    public $primaryKey = 'id';
    
    // Timestamps
    public $timestamps = true;
}
