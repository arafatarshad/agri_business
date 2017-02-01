<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    //
    public $timestamps = false;

    protected $table = 'user_details';
    protected $primaryKey = 'id';
}
