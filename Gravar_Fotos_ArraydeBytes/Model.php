<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $table = 'pictures';
    protected $fillable = ['description', 'type', 'file','extension','size'];
    protected $primaryKey = 'id';
    public $timestamps = false;
}