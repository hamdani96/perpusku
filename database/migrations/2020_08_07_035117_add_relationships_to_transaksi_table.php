<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->change();
            $table->foreign('user_id')->references('id')->on('users')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('buku_id')->unsigned()->change();
            $table->foreign('buku_id')->references('id')->on('buku')
                    ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropForeign('transaksi_user_id_foreign');
        });

        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropIndex('transaksi_user_id_foreign');
        });

        Schema::table('transaksi', function (Blueprint $table) {
            $table->integer('user_id')->change();
        });

        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropForeign('transaksi_buku_id_foreign');
        });

        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropIndex('transaksi_buku_id_foreign');
        });

        Schema::table('transaksi', function (Blueprint $table) {
            $table->integer('buku_id')->change();
        });
    }
}
