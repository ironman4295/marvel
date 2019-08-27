<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $table = 'report';
    protected $primaryKey='rid';
    public $timestamps=false;
}
