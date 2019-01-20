<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'firstname', 'lastname', 'phone', 'country', 'region', 'city', 'address', 'sex'
    ];
}
