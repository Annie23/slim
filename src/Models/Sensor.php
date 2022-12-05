<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    public $timestamps = false;
    protected $table = 'sensors';
    protected $fillable = ['id', 'face', 'temperature', 'timestamp'];
}