<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pemilih extends Model
{
    protected $table = 'pemilih';
    protected $fillable = [
        'nama',
        'nim',
        'token_id',
        'status',
        'updated_at'
    ];

    public static function insertData($data)
    {
        $value = DB::table('pemilih')->where('nim', $data['nim'])->count();
        if ($value == 0) {
            DB::table('pemilih')->insert($data);
        }
    }
}
