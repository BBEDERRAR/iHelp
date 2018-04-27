<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = ['longtitude', 'latitude', 'user_id', 'provider_id'];
}
