<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('outlet_id');
            $table->foreignId('user_id');
            $table->foreignId('member_id');
            // $table->foreignId('paket_id');
            $table->string('kode_invoice');
            $table->date('tgl');
            $table->date('batas_waktu');
            $table->date('tgl_bayar');
            $table->double('biaya_tambahan');
            $table->double('diskon');
            $table->double('pajak');
            $table->enum('status', ['baru', 'proses','selesai', 'diambil']);
            $table->enum('dibayar', ['dibayar','belum_dibayar']);
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
        Schema::dropIfExists('transaksis');
    }
}
