<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotocicletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motocicletas', function (Blueprint $table) {
            $table->id();
            $table->string("placaMotocicleta", 6);
            $table->string("colorMotocicleta", 20);
            $table->string("cilindraje", 20);
            $table->string("kilometraje", 20);

            // relacion uno a muchos con la tabla User

            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users")
                ->onDelete("set null")
                ->onUpdate("cascade");


            //relacion uno a muchos con la tabla categoria

            $table->unsignedBigInteger("categoria_id")->nullable();
            $table->foreign("categoria_id")->references("id")->on("categorias")
                ->onDelete("set null")
                ->onUpdate("cascade");


            //relacion uno a mucho con la tabla marca

            $table->unsignedBigInteger("marca_id")->nullable();
            $table->foreign("marca_id")->references("id")->on("marcas")
                ->onDelete("set null")
                ->onUpdate("cascade");

            $table->foreignId('linea_id')->nullable()->constrained("lineas")->cascadeOnUpdate()->cascadeOnDelete();


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
        Schema::dropIfExists('motocicletas');
    }
}
