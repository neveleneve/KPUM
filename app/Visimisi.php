<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visimisi extends Model
{
    protected $table = 'visimisi';
    protected $fillable = [
        'gambar',
        'no_urut',
        'visi',
        'misi',
        'ketua',
        'nimketua',
        'jurusanketua',
        'angkatanketua',
        'wakil',
        'nimwakil',
        'jurusanwakil',
        'angkatanwakil'
    ];
}
