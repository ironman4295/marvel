<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{
    //
    protected $table = 'navbar';
    protected $primaryKey='nid';
    public $timestamps=false;
}
