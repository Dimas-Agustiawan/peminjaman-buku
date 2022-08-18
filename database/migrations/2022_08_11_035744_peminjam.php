<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Peminjam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Peminjam', function (Blueprint $table) {
            $table->id();
            $table->string('mahasiswa_nim');
            $table->integer('buku_id');
            $table->date('tgl_pinjam')->nullable($value = true);
            $table->date('tgl_kembali')->nullable($value = true);
            $table->string('denda')->nullable($value = true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('Peminjam');
    }
}
