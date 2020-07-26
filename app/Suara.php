<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suara extends Model
{
    protected $table = 'suara';
    protected $fillable = [
        'Id',
        'no_urut',
        'jml_suara',
        'remember_token'
    ];
}
