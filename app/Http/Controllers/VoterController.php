<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemilih;
use App\Suara;
use App\Visimisi;
use Illuminate\Support\Facades\Auth;

class VoterController extends Controller
{
    public function index()
    {
        
        return view('voter.dashboard', [

        ]);
    }

    public function pilih(Request $req)
    {
        $data = Suara::find($req->id);
        $data->jml_suara += 1;
        $data->save();
        $pemilih = Pemilih::find($req->idpemilih);
        $pemilih->status = 1;
        $pemilih->save();
        Auth::guard('voter')->logout();
        return redirect('/')->with('pemberitahuan', 'Terima Kasih! Anda Berhasil Memilih.')->with('warna', 'success');
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
