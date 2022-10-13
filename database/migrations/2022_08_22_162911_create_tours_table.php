<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable();// Id de tabla categoria
            $table->foreignId('tipo_cambios_id')->nullable(); // Id de tipo de cambio
            $table->string('nombre'); // nombre de tour
            $table->string('name')->nullable(); //nombre en ingles
            $table->mediumText('desc')->nullable(); // Descripcion del tours
            $table->mediumText('desc_eng')->nullable(); //Descripcion del tour en ingles
            $table->mediumText('incluye')->nullable(); // incluye el tour
            $table->mediumText('incluye_eng')->nullable(); // incluye el tour en ingles
            $table->mediumText('pickup')->nullable(); // Punto de recogida
            $table->mediumText('pickup_eng')->nullable(); // Punto de recogida ingles
            $table->mediumText('recomendacion')->nullable(); // recomendaciones para el tour
            $table->mediumText('recomendacion_eng')->nullable(); // recomendaciones para el tour en ingles
            $table->mediumText('extra')->nullable(); // extras del tour
            $table->mediumText('extra_eng')->nullable(); // extras del tour en ingles
            $table->integer('PRAD')->nullable(); // Precio Regular Adulto Dolar
            $table->integer('POAD')->nullable(); // Precio Oferta Adulto Dolar
            $table->integer('PRMD')->nullable(); // Precio Regular Menor Dolar
            $table->integer('POMD')->nullable(); // Precio Oferta Menor Dolar
            $table->integer('descuento')->nullable(); // Porcentaje de descuento
            $table->mediumText('paquete')->nullable(); // Modalidad Individual/Pareja
            $table->mediumText('status')->nullable(); // Activado/desactivado
            $table->mediumText('youtube')->nullable(); // Link de youtube
            $table->mediumText('thumb')->nullable(); // Miniatura img
            $table->mediumText('galeria')->nullable(); //array Galeria
            $table->mediumText('visitas')->nullable(); // Numero de visitas a la actividad
            $table->foreignId('user_id')->nullable()->constrained('users'); // usuario que modificó
            $table->mediumText('url'); // link generado a partir del nombre
            $table->mediumText('usuario_modifico')->nullable(); // usuario que modificó
            $table->mediumText('fecha_modificacion')->nullable(); // fecha de modificacion
            $table->timestamp('fecha_publicacion')->nullable(); // fecha que se hizo la publicacion del tour
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
        Schema::dropIfExists('tours');
    }
}
