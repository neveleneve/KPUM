<?php

namespace App\Http\Controllers;

use App\Pemilih;
use App\Suara;
use App\Admin;
use App\Visimisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function dashboard()
    {
        $jumlah_pemilih = Pemilih::count();
        $jumlah_pemilih_belum = Pemilih::where('status', 0)->count();
        $jumlah_pemilih_sudah = Pemilih::where('status', 1)->count();
        $jumlah_kandidat = Visimisi::count();
        $jumlah_suara = Suara::all();
        $jumlah_kandidat_suara = Suara::all();

        // if (count($jumlah_suara) != 0) {
        for ($i = 0; $i < $jumlah_kandidat_suara->count(); $i++) {
            $jumlah_suara[$i] = Suara::where('no_urut', $i + 1)->sum('jml_suara');
        }
        // }
        return view('welcome', [
            'jumlah_pemilih_belum' => $jumlah_pemilih_belum,
            'jumlah_pemilih_sudah' => $jumlah_pemilih_sudah,
            'jumlah_kandidat' => $jumlah_kandidat,
            'jumlah_pemilih' => $jumlah_pemilih,
            'jumlah_suara' => $jumlah_suara
        ]);
    }

    public function loginvoter(Request $data)
    {
        $dataadmin = Pemilih::where('token_id', $data->tokenid)->where('status', 0)->get();
        if (count($dataadmin) > 0) {
            Auth::guard('voter')->LoginUsingId($dataadmin[0]['id']);
            return redirect('voter/dashboard');
        } else {
            return redirect('/')->with('status', 'Token Telah Dipakai');
        }
    }

    public function loginadmin(Request $data)
    {
        $dataadmin = Admin::where('username', $data->username)->where('password', $data->password)->where('status', 1)->get();
        if (count($dataadmin) > 0) {
            Auth::guard('admin')->LoginUsingId($dataadmin[0]['id']);
            return redirect('admin/dashboard');
        } else {
            return redirect('/adminlogin')->with('gagal', 'Data Login Anda Tidak Sesuai');
        }
    }

    public function logout()
    {
        // dd(Auth::user());
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('voter')->check()) {
            Auth::guard('voter')->logout();
        }
        return redirect('/');
    }
}
