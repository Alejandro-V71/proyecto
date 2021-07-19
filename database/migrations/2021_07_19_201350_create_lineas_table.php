<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineas', function (Blueprint $table) {
            $table->id();
            $table->string("nombreLinea",30);

            // relación uno a muchos con la tabla Marca

            $table->unsignedBigInteger("marca_id")->nullable();
            $table->foreign("marca_id")
                  ->references("id")
                  ->on("marcas")
                  ->onDelete("set null")
                  ->onUpdate("cascade");

            //----------------------------
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
        Schema::dropIfExists('lineas');
    }
}
