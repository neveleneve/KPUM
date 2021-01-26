<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Pemilih;
use App\Suara;
use App\Visimisi;
use App\Admin;
use App\Waktu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function randomstringlah()
    {
        $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 15);
        return $randomString;
    }

    public function generateVoterToken(Request $req)
    {
        $nama = $req->nama;
        $nim = $req->nim;
        $randomString = $this->randomstringlah();
        $datatoken = Pemilih::where('token_id', $randomString)->count();
        if ($datatoken == 0) {
            $request = new Request([
                'nama' => $nama,
                'nim' => $nim,
                'token_id' => $randomString,
                'status' => 0,
                'updated_at' => null
            ]);
            Pemilih::create($request->all());
            return redirect('/admin/datapemilih')->with('pemberitahuan', 'Data Pemilih Berhasil Dibuat!')->with('warna', 'success');
        } else {
            return redirect('/admin/datapemilih')->with('pemberitahuan', 'Data Pemilih Gagal Dibuat! Silahkan Ulangi!')->with('warna', 'danger');
        }
    }

    public function dashboard()
    {
        $suaramasuk = Suara::sum('jml_suara');
        $jumlahpemilih = Pemilih::count();
        $jumlahcalon = Visimisi::count();
        $datacalon = Visimisi::all()->sortBy('no_urut');
        $datasuarapersonal = null;
        $sumdata = Suara::sum('jml_suara');
        for ($i = 1; $i <= $jumlahcalon; $i++) {
            $suara = Suara::where('no_urut', $i)->get();
            $datasuarapersonal[$i] = $suara[0]->jml_suara;
        }

        return view('administrator.dashboard', [
            'suaramasuk' => $suaramasuk,
            'jumlahpemilih' => $jumlahpemilih,
            'jumlahcalon' => $jumlahcalon,
            'datacalon' => $datacalon,
            'datasuarapersonal' => $datasuarapersonal,
            'jumlahsuara' => $sumdata,
        ]);
    }

    public function adminupdate(Request $req)
    {
        if (trim($req->password) == "") {
            Admin::where('id', $req->id)->update([
                'nama' => $req->nama,
                'username' => $req->username,
                'level' => $req->level,
                'status' => $req->status
            ]);
        } else {
            $password = Hash::make(trim($req->password), [
                'rounds' => 10
            ]);
            Admin::where('id', $req->id)->update([
                'nama' => $req->nama,
                'password' => $password,
                'username' => $req->username,
                'level' => $req->level,
                'status' => $req->status
            ]);
        }
        return redirect('admin/administrator');
    }

    public function admindelete($id)
    {
        Admin::find($id)->delete();
        return redirect('/admin/administrator');
    }

    public function adminview($id)
    {
        $data = Admin::where('username', $id)->get();
        return view('administrator.administratorview', [
            'dataadmin' => $data
        ]);
    }

    public function index()
    {
        $data_pemilih = Pemilih::orderBy('status', 'desc')->paginate(10);
        return view('administrator.datapemilih', [
            'data_pemilih' => $data_pemilih
        ]);
    }

    public function calon()
    {
        $data_visi_misi = Visimisi::orderBy('no_urut', 'asc')->get();
        $sumdata = Suara::sum('jml_suara'); 
        return view('administrator.datacalon', [
            'data_visi_misi' => $data_visi_misi,
            'jumlahsuara' => $sumdata,
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
            'misi' => $request->misi
        ]);
        $namafile = $request->gambar;
        $img = $request->file('gambar');
        $input['imagename'] =  $namafile->getClientOriginalName();
        $destination = public_path('/admin/dist/img');
        $img->move($destination, $input['imagename']);
        Suara::create([
            'no_urut' =>  $request->no_urut,
            'jml_suara' => 0
        ]);
        return redirect('/admin/datacalon');
    }

    public function adminshow()
    {
        $data = Admin::orderBy('level')->paginate(10);
        return view('administrator.administrator', [
            'dataadmin' => $data
        ]);
    }

    public function adminadd(Request $req)
    {
        $password = Hash::make('admin123', [
            'rounds' => 10
        ]);
        $dataadmin = new Request([
            'nama' => $req->nama,
            'username' => $req->username,
            'password' => $password,
            'level' => '1',
            'status' => '1'
        ]);
        Admin::create($dataadmin->all());
        return redirect('/admin/administrator');
    }

    public function ubahpass(Request $req)
    {
        $dataadmin = Admin::where('username', $req->username)->get();
        $passbaru = trim($req->passwordbaru);
        $passbarukonfirm = trim($req->passwordbarukonfirm);
        $passwordlamadb = trim($dataadmin[0]['password']);
        $passwordlama = trim($req->passwordlama);
        if (Hash::check($passwordlama, $passwordlamadb)) {
            if ($passbarukonfirm == $passbaru) {
                $passbaruhash = Hash::make($passbarukonfirm, [
                    'rounds' => 10
                ]);
                Admin::where('username', $req->username)->update([
                    'password' => $passbaruhash
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
        $password = trim($dataadmin[0]['password']);
        $passwordkonfirm = trim($req->password);
        if (Hash::check($passwordkonfirm, $password)) {
            Admin::where('id', $req->iduser)->update([
                'username' => $req->usernamebaru,
                'nama' => $req->namalengkap
            ]);
            return redirect('/admin/setting/ubahdata')->with('info', 'Data Berhasil Diubah!')->with('warna', 'success');
        } else {
            return redirect('/admin/setting/ubahdata')->with('info', 'Password Konfirmasi Salah, Silahkan Ulangi!')->with('warna', 'danger');
        }
    }

    public function adminsettingview()
    {
        $databuka = Waktu::where('nama', 'Buka')->get();
        $datatutup = Waktu::where('nama', 'Tutup')->get();

        return view('administrator.setting', [
            'databuka' => $databuka,
            'datatutup' => $datatutup
        ]);
    }

    public function settime(Request $req)
    {
        // echo strtotime(str_replace('T', ' ', $req->waktubuka))  . '<br>';
        // echo strtotime(str_replace('T', ' ', $req->waktututup))  . '<br>';
        $buka = strtotime(str_replace('T', ' ', $req->waktubuka));
        $tutup = strtotime(str_replace('T', ' ', $req->waktututup));
        Waktu::where('nama', 'Buka')->update([
            'inttanggal' => $buka
        ]);
        Waktu::where('nama', 'Tutup')->update([
            'inttanggal' => $tutup
        ]);
        return redirect('/admin/setting');
    }
}
