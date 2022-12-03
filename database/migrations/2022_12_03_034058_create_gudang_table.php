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
        Schema::create('gudang', function (Blueprint $table) {
            $table->string('id_gudang');
            $table->unique('id_gudang');
            $table->string('id_gunpla');
            $table->unique('id_gunpla');
            $table->string('id_pembeli');
            $table->unique('id_pembeli');
            $table->string('alamat_gudang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gudang');
    }
};
