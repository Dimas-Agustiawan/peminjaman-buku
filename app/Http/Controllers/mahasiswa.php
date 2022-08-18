<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa_Model;
use App\Peminjam_Model;
use Illuminate\Support\Facades\Validator;

class mahasiswa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mhs = Mahasiswa_Model::all();
        return view('mahasiswa', ['mahasiswa' => $mhs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $pesan = [
            'required' => ':attribute wajib diisi cuy!!!',
            'max' => ':attribute harus diisi minimal :max karakter ya cuy!!!',
            'unique' => ':attribute sudah ada!!!',
        ];

        $validator = Validator::make($request->all(), [
            'nim' => 'required|unique:mahasiswa,nim|max:255',
            'nama' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
        ],$pesan);

        if ($validator->fails()) {
            return redirect('/mahasiswa')->withErrors($validator);
        }else {
            $mhs = new Mahasiswa_Model();
            $mhs->nim = $request->nim;
            $mhs->nama = $request->nama;
            $mhs->telp = $request->telp;
            $mhs->alamat = $request->alamat;
            $mhs->save();
            return redirect('/mahasiswa')->with('success','Data '.$request->nama.' telah disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $edit_mhs = Mahasiswa_Model::where('nim',$id)->get();
        $mhs = Mahasiswa_Model::all();
        return view('edit-mahasiswa', ['edit_mahasiswa' => $edit_mhs, 'mahasiswa' => $mhs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $pesan = [
            'required' => ':attribute wajib diisi cuy!!!',
            'max' => ':attribute harus diisi minimal :max karakter ya cuy!!!',
            'unique' => ':attribute sudah ada!!!',
        ];

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
        ],$pesan);

        if ($validator->fails()) {
            return redirect('/edit-mahasiswa/'.$id)->withErrors($validator);
        }else {
            $mhs = Mahasiswa_Model::where('nim',$id)->first();
            $mhs->nim = $request->nim;
            $mhs->nama = $request->nama;
            $mhs->telp = $request->telp;
            $mhs->alamat = $request->alamat;
            $mhs->save();
            return redirect('/mahasiswa')->with('success','Update Data '.$request->nama.' telah disimpan');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Mahasiswa_Model::where('nim',$id)->delete();
        return redirect('/mahasiswa');
    }
}
