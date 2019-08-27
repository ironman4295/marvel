<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    //
    protected $table = 'column';
    protected $primaryKey='cid';
    public $timestamps=false;
}
