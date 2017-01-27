<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class POSTS extends Model
{
    //
    public $timestamps = true;

    protected $table = 'posts';
    protected $primaryKey = 'id';
}
