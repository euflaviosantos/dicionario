<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Palavra extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];
}
