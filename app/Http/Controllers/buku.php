<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku_Model;
use App\Http\Requests\Buku_Request;
use Illuminate\Support\Facades\Validator;

class buku extends Controller
{
    //
    public function index()
    {
        $buku = Buku_Model::all();
        return view("list-buku", ['list_buku' => $buku]);
    }

    public function save(Buku_Request $request)
    {
        $buku = new Buku_Model;
        $buku->id = $request->id_buku;
        $buku->kategori_buku = $request->kategori;
        $buku->judul_buku = $request->judul_buku;
        $buku->pengarang = $request->pengarang;
        $buku->save();
        return redirect('/buku')->with('success','Data buku '.$request->judul_buku.' telah disimpan');
    }

    public function delete($id)
    {
        Buku_Model::where('id',$id)->delete();
        return redirect('/buku');
    }

    public function edit($id)
    {
        $edit_buku = Buku_Model::where('id',$id)->get();
        $buku = Buku_Model::all();
        return view('edit-buku', ['edit_buku' => $edit_buku, 'list_buku' => $buku]);
    }

    public function update(Request $request, $id)
    {
        $pesan = [
            'required' => ':attribute wajib diisi cuy!!!',
            'max' => ':attribute harus diisi minimal :max karakter ya cuy!!!',
        ];

        $validator = Validator::make($request->all(), [
            'id_buku' => 'required|max:255',
            'kategori' => 'required',
            'judul_buku' => 'required',
            'pengarang' => 'required',
        ],$pesan);

        if ($validator->fails()) {
            return redirect('/edit/'.$id)->withErrors($validator);
        }else {
            $buku = Buku_Model::where('id',$request->id_buku)->first();
            $buku->id = $request->id_buku;
            $buku->kategori_buku = $request->kategori;
            $buku->judul_buku = $request->judul_buku;
            $buku->pengarang = $request->pengarang;
            $buku->save();
            return redirect('/buku')->with('success','Update buku '.$request->judul_buku.' telah disimpan');
        }
    }
}
