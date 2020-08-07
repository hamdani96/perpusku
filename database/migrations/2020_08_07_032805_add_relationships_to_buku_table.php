<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buku', function (Blueprint $table) {
            $table->integer('rak_id')->unsigned()->change();
            $table->foreign('rak_id')->references('id')->on('rak')
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
        Schema::table('buku', function (Blueprint $table) {
            $table->dropForeign('buku_rak_id_foreign');
        });

        Schema::table('buku', function (Blueprint $table) {
            $table->dropIndex('buku_rak_id_foreign');
        });

        Schema::table('buku', function (Blueprint $table) {
            $table->integer('rak_id')->change();
        });
    }
}
