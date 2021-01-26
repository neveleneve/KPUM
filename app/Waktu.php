<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waktu extends Model
{
    protected $table = 'waktu';
    protected $fillable = [
        'nama',
        'inttanggal'
    ];
}
