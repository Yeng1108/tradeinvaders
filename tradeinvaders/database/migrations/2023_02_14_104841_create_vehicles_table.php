<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vehicle_id');
            $table->string('unit')->nullable();
            $table->string('plateno')->nullable();
            $table->string('brand')->nullable();
            $table->string('variant')->nullable();
            $table->string('yearmodel')->nullable();
            $table->string('tvalue')->nullable();
            $table->string('customerprice')->nullable();
            $table->string('mp')->nullable();
            $table->string('grm')->nullable();
            $table->string('carimage');
            $table->timestamps();

            $table->index('vehicle_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
