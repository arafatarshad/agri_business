<?php namespace App;

use Zizaco\Entrust\EntrustPermission;

class Categories extends EntrustPermission
{
	public $timestamps = false;

    protected $table = 'categories';
    protected $primaryKey = 'id';
}