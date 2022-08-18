<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa_Model extends Model
{
    //
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    protected $keyType = 'bigint';
    protected $fillable = ['nim','nama','telp','alamat'];

    public function peminjam()
    {
        return $this->hasMany('App\Peminjam_Model');
    }
}
