<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
    public $timestamps = true;

    protected $table = 'comments';
    protected $primaryKey = 'id';
}
