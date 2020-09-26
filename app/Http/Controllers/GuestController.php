<?php

namespace App\Http\Controllers;

use App\Pemilih;
use App\Suara;
use App\Admin;
use App\Visimisi;
use App\Waktu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $databuka = Waktu::where('nama', 'Buka')->get();
        $datatutup = Waktu::where('nama', 'Tutup')->get();
        $now = strtotime(date('d-m-Y H:i:s'));;
        $dataadmin = Pemilih::where('token_id', $data->tokenid)->where('status', 0)->get();

        if ($now < $databuka[0]['inttanggal']) {
            return redirect('/')->with('pemberitahuan', 'Pemilihan Belum Dibuka')->with('warna', 'danger');
        } elseif ($now > $datatutup[0]['inttanggal']) {
            return redirect('/')->with('pemberitahuan', 'Pemilihan Sudah Ditutup')->with('warna', 'danger');
        } else {
            if (count($dataadmin) > 0) {
                Auth::guard('voter')->LoginUsingId($dataadmin[0]['id']);
                return redirect('voter/dashboard');
            } else {
                return redirect('/')->with('pemberitahuan', 'Token Telah Dipakai')->with('warna', 'danger');
            }
        }
    }

    public function loginadmin(Request $data)
    {
        if ($data->username == "" || $data->password == "") {
            return redirect('/adminlogin')->with('gagal', 'Data Login Tidak Lengkap');
        } else {
            $dataadmin = Admin::where('username', $data->username)->get();
            if (count($dataadmin) == 0) {
                return redirect('/adminlogin')->with('gagal', 'Status Admin Anda Tidak Aktif. Silahkan Hubungi Super Admin!');
            } else {
                $pass = trim($data->password);
                $hash = trim($dataadmin[0]->password);
                if (Hash::check($pass, $hash)) {
                    if ($dataadmin[0]->status == 1) {
                        Auth::guard('admin')->LoginUsingId($dataadmin[0]['id']);
                        return redirect('admin/dashboard');
                    } else {
                        return redirect('/adminlogin')->with('gagal', 'Status Admin Anda Tidak Aktif. Silahkan Hubungi Super Admin!');
                    }
                } else {
                    return redirect('/adminlogin')->with('gagal', 'Password Yang Anda Masukkan Salah. Silahkan Ulangi!');
                }
            }
        }
    }

    public function logout()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('voter')->check()) {
            Auth::guard('voter')->logout();
        }
        return redirect('/');
    }
}
