<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku_Model extends Model
{
    //
    protected $table = 'buku';
    protected $primaryKey = 'id';
    protected $fillable = ['id','kategori_buku','judul_buku','pengarang'];

    public function peminjam()
    {
        return $this->hasMany('App\Peminjam_Model');
    }
}
