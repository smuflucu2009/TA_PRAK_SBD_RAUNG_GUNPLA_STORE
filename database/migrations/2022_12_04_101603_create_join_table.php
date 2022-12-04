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
        Schema::create('join', function (Blueprint $table) {
            $table->string('id_gunpla');
            $table->foreign('id_gunpla')->references('id_gunpla')->on('gunpla')->onDelete('restrict');
            $table->integer('id_pembeli');
            $table->foreign('id_pembeli')->references('id_pembeli')->on('pembeli')->onDelete('restrict');
            $table->string('id_gudang');
            $table->foreign('id_gudang')->references('id_gudang')->on('gudang')->onDelete('restrict');
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
        Schema::dropIfExists('join');
    }
};
