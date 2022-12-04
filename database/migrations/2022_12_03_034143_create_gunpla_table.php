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
        Schema::create('gunpla', function (Blueprint $table) {
            $table->string('id_gunpla');
            $table->primary('id_gunpla');
            $table->unique('id_gunpla');
            $table->string('nama_gunpla');
            $table->string('grade');
            $table->string('harga');
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
        Schema::dropIfExists('gunpla');
    }
};
