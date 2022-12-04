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
            $table->integer('id_gudang');
            $table->string('id_gunpla');
            $table->foreign('id_gunpla')->references('id_gunpla')->on('gunpla')->onDelete('restrict');
            $table->integer('id_pembeli');
            $table->foreign('id_pembeli')->references('id_pembeli')->on('pembeli')->onDelete('restrict');
            $table->string('kota_gudang');
            $table->timestamps();
            $table->dateTime('deleted_at');
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
