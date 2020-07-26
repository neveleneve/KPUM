<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class loginadmin extends Authenticatable
{
    protected $table = 'users';
}
