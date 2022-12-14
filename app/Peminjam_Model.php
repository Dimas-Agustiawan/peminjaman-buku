<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjam_Model extends Model
{
    //
    protected $table = 'peminjam';
    protected $primaryKey = 'id';
    protected $fillable = ['id','mahasiswa_nim','buku_id','tgl_pinjam','tgl_kembali'];
    public $timestamps = false;

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa_Model')->withDefault([
            'nama' => 'Nama tidak ada',
        ]);
    }

    public function buku()
    {
        return $this->belongsTo('App\Buku_Model')->withDefault([
            'judul_buku' => 'Data buku tidak ada',
        ]);
    }
}
