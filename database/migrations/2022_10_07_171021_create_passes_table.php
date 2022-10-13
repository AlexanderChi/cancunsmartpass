<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passes', function (Blueprint $table) {
            $table->id('PassId');
            $table->string('Pass_contador')->nullable();
            $table->string('PassFolio')->nullable();
            $table->foreignId('UserId')->nullable()->constrained('users');
            $table->string('PassName')->nullable();
            $table->string('PassLastName')->nullable();
            $table->string('PassEmail')->nullable();
            $table->string('PassPhone')->nullable();
            $table->string('PassCountry')->nullable();
            $table->string('PassCity')->nullable();
            $table->string('PassExtraPerson')->nullable();
            $table->string('PassTotalEP')->nullable();
            $table->string('PassTotal')->nullable();
            $table->tinyInteger('PassStatus')->default('0');
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
        Schema::dropIfExists('passes');
    }
}
