<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_produk');
            $table->string('nama_produk');
            $table->integer('satuan_besar_id');
            $table->integer('satuan_kecil_id');
            $table->integer('isi');
            $table->integer('stok')->nullable();
            $table->integer('stok_min')->nullable();
            $table->integer('stok_max')->nullable();
            $table->decimal('harga_beli')->nullable();
            $table->decimal('harga_jual')->nullable();
            $table->decimal('fee_dokter')->nullable();
            $table->decimal('fee_staff')->nullable();
            $table->enum('aktif', ['Y', 'N'])->default('Y');
            $table->enum('cencel', ['Y', 'N'])->default('N');
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
        Schema::dropIfExists('produk_item');
    }
}
