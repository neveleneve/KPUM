<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'nama',
        'username',
        'password',
        'level',
        'status'
    ];
}
