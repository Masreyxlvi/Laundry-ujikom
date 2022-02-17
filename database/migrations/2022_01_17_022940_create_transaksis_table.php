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
            $table->date('tgl_bayar')->nullable();
            $table->double('biaya_tambahan')->nullable();
            $table->double('diskon')->nullable();
            $table->double('pajak')->nullable();
            $table->double('total')->nullable();
            $table->enum('status', ['baru', 'proses','selesai', 'diambil'])->default('baru');
            $table->enum('dibayar', ['dibayar','belum_dibayar'])->default('belum_dibayar');
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
