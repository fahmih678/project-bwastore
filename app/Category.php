<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    // Model untuk menyimpan data mempermudah memasukkan 
    use SoftDeletes;

    protected $fillable = [
        'name', 'photos', 'slug'
    ];

    protected $hidden = [];
}
