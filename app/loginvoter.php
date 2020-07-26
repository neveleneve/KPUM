<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class loginvoter extends Authenticatable
{
    protected $table = 'pemilih';
}
