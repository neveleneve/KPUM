<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Pemilih;
use App\Suara;
use App\Visimisi;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function generateVoterToken()
    {
        $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 15);
        $request = new Request([
            'token_id' => $randomString,
            'status' => 0,
            'updated_at' => null
        ]);
        Pemilih::create($request->all());
        return redirect('/admin/datapemilih');
    }

    public function dashboard()
    {
        $suaramasuk = Suara::sum('jml_suara');
        $jumlahpemilih = Pemilih::count();
        $jumlahcalon = Visimisi::count();
        $datacalon = Visimisi::all()->sortBy('no_urut');
        return view('administrator.dashboard', [
            'suaramasuk' => $suaramasuk,
            'jumlahpemilih' => $jumlahpemilih,
            'jumlahcalon' => $jumlahcalon,
            'datacalon' => $datacalon
        ]);
    }

    public function index()
    {
        $data_pemilih = Pemilih::paginate(10);
        return view('administrator.datapemilih', compact('data_pemilih'));
    }

    public function calon()
    {
        $data_visi_misi = Visimisi::all()->sortBy('no_urut');
        return view('administrator.datacalon', [
            'data_visi_misi' => $data_visi_misi
        ]);
    }

    public function hapuscalon($id)
    {
        $data = Visimisi::find($id);
        $suara = Suara::find($id);
        $namagambar = $data->gambar;
        $data->delete();
        $suara->delete();
        File::delete('admin/dist/img/' . $namagambar);
        return redirect('/admin/datacalon');
    }

    public function tambahcalon(Request $request)
    {
        Visimisi::create([
            'gambar' => $request->gambar->getClientOriginalName(),
            'no_urut' => $request->no_urut,
            'ketua' => $request->ketua,
            'nimketua' => $request->nimketua,
            'jurusanketua' => $request->jurusanketua,
            'angkatanketua' => $request->angkatanketua,
            'wakil' => $request->wakil,
            'nimwakil' => $request->nimwakil,
            'jurusanwakil' => $request->jurusanwakil,
            'angkatanwakil' => $request->angkatanwakil,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'remember_token' => $request->_token
        ]);
        $namafile = $request->gambar;
        $img = $request->file('gambar');
        $input['imagename'] =  $namafile->getClientOriginalName();
        $destination = public_path('/admin/dist/img');
        $img->move($destination, $input['imagename']);
        Suara::create([
            'no_urut' =>  $request->no_urut,
            'jml_suara' => 0,
            'remember_token' => $request->_token
        ]);
        return redirect('/admin/datacalon');
    }

    public function adminshow()
    {
        $data = Admin::paginate(10);
        return view('administrator.administrator', [
            'dataadmin' => $data
        ]);
    }

    public function adminadd(Request $req)
    {
        Admin::create($req->all());
        return redirect('/admin/administrator');
    }

    public function ubahpass(Request $req)
    {
        $dataadmin = Admin::where('username', $req->username)->get();
        $password = $dataadmin[0]['password'];
        if ($req->passwordlama == $password) {
            if ($req->passwordbaru == $req->passwordbarukonfirm) {
                Admin::where('username', $req->username)->update([
                    'password' => $req->passwordbaru
                ]);
                return redirect('/admin/setting/ubahpassword')->with('info', 'Password Berhasil Diganti')->with('warna', 'success');
            } else {
                return redirect('/admin/setting/ubahpassword')->with('info', 'Konfirmasi Password Baru Yang Anda Masukkan Tidak Sama, Silahkan Ulangi!')->with('warna', 'danger');
            }
        } else {
            return redirect('/admin/setting/ubahpassword')->with('info', 'Password Lama Yang Dimasukkan Salah, Silahkan Ulangi!')->with('warna', 'danger');
        }
    }

    public function ubahdata(Request $req)
    {
        $dataadmin = Admin::where('id', $req->iduser)->get();
        $password = $dataadmin[0]['password'];
        if ($req->password == $password) {
            Admin::where('id', $req->iduser)->update([
                'username' => $req->usernamebaru,
                'nama' => $req->namalengkap
            ]);
            return redirect('/admin/setting/ubahdata')->with('info', 'Data Berhasil Diubah!')->with('warna', 'success');
        } else {
            return redirect('/admin/setting/ubahdata')->with('info', 'Password Konfirmasi Salah, Silahkan Ulangi!')->with('warna', 'danger');
        }
    }
}
