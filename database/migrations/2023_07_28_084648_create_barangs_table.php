<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('tipe_barang');
            $table->double('harga_barang');
            $table->longText('spesifikasi');
            $table->text('image');
            $table->unsignedBigInteger('merk_id');
            $table->unsignedBigInteger('kategori_id');
            $table->timestamps();

            $table->foreign('merk_id')->references('id')->on('merks');
            $table->foreign('kategori_id')->references('id')->on('kategoris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
};
