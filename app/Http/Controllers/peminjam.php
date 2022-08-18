<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjam_Model;
use Illuminate\Support\Facades\Validator;
use DateTime;
use App\Mahasiswa_Model;
use Illuminate\Support\Facades\DB;

class peminjam extends Controller
{
    //
    public function index()
    {
        $peminjam = Peminjam_Model::all();
        $active = 'all';
        return view('peminjam', ['list_peminjam' => $peminjam, 'active' => $active]);
    }

    public function insert(Request $request)
    {
        # code...
        $pesan = [
            'required' => ':attribute wajib diisi cuy!!!',
            'max' => ':attribute harus diisi minimal :max karakter ya cuy!!!',
            'unique' => ':attribute sudah ada!!!',
        ];

        $validator = Validator::make($request->all(), [
            'nim' => 'required|max:255',
            'id_buku' => 'required',
            'tgl_pinjam' => 'required',
        ],$pesan);

        if ($validator->fails()) {
            return redirect('/peminjam')->withErrors($validator);
        }else {
            $peminjam = new Peminjam_Model;
            $peminjam->mahasiswa_nim = $request->nim;
            $peminjam->buku_id = $request->id_buku;
            $peminjam->tgl_pinjam = $request->tgl_pinjam;
            $peminjam->save();
            return redirect('/peminjam')->with('success','Data peminjam telah disimpan');
        }
    }

    public function edit($id)
    {
        # code...
        $edit_peminjam = Peminjam_Model::where('id',$id)->get();
        $peminjam = Peminjam_Model::all();
        $active = 'all';
        return view('edit-peminjam', ['edit_peminjam' => $edit_peminjam, 'list_peminjam' => $peminjam, 'active' => $active]);
    }

    public function update(Request $request, $id)
    {
        # code...
        $pesan = [
            'required' => ':attribute wajib diisi cuy!!!',
            'max' => ':attribute harus diisi minimal :max karakter ya cuy!!!',
        ];

        $validator = Validator::make($request->all(), [
            'nim' => 'required|max:255',
            'id_buku' => 'required',
        ],$pesan);

        if ($validator->fails()) {
            return redirect('/edit-peminjam/'.$id)->withErrors($validator);
        }else {
            $mhs = Mahasiswa_Model::where('nim',$request->nim)->first();
            $fdate = $mhs->tgl_pinjam;
            $tdate = $request->tgl_kembali;
            $datetime1 = new DateTime($fdate);
            $datetime2 = new DateTime($tdate);
            $interval = $datetime1->diff($datetime2);
            $hari = $interval->format('%a')+2;
            
            $peminjam = Peminjam_Model::where('id',$id)->first();
            $peminjam->mahasiswa_nim = $request->nim;
            $peminjam->buku_id = $request->id_buku;
            $peminjam->tgl_kembali = $request->tgl_kembali;

            $terlewat = $hari-7;
            ($terlewat > 0) ? $peminjam->denda = $terlewat * 1000 : $peminjam->denda = 0;

            $peminjam->save();
            return redirect('/peminjam')->with('success','Update data peminjam telah disimpan');
        }
    }

    public function delete($id)
    {
        # code...
        Peminjam_Model::where('id',$id)->delete();
        return redirect('/peminjam');
    }

    public function dipinjam()
    {
        $pinjam = Peminjam_Model::where('tgl_kembali',null)->get();
        $active = 'dipinjam';
        return view('peminjam', ['list_peminjam' => $pinjam, 'active' => $active]);
    }
}
