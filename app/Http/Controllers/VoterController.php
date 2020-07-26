<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemilih;
use App\Suara;
use App\Visimisi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class VoterController extends Controller
{
    public function index()
    {
        //code
    }

    public function pilih(Request $req)
    {
        // dd($req->id);
        $data = Suara::find($req->id);
        $data->jml_suara += 1;
        $data->save();

        $pemilih = Pemilih::find($req->idpemilih);
        $pemilih->status = 1;
        $pemilih->save();

        Auth::guard('voter')->logout();

        return redirect('/');
    }

    public function datacalon()
    {
        $datacalon = Visimisi::all()->sortBy('no_urut');
        $jmlcalon = Visimisi::count();
        return view('voter.vote', [
            'datacalon' => $datacalon,
            'jumlahcalon' => $jmlcalon
        ]);
    }
}
