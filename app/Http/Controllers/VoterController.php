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
        $datacalon = Visimisi::all()->sortBy('no_urut');
        $jmlcalon = Visimisi::count();
        $data_visi_misi = Visimisi::orderBy('no_urut', 'asc')->get();
        return view('voter.dashboard', [
            'datacalon' => $datacalon,
            'jumlahcalon' => $jmlcalon,
            'data_visi_misi' => $data_visi_misi,
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
        return view('voter.vote', []);
    }
}
