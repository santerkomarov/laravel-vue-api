<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id('id');
            $table->string('type_equipment');
            $table->string('serial_number')->unique('serial_number','type_equipment');
            $table->text('comment');
            $table->timestamps();
            $table->foreign('type_equipment')
                    ->references('equipment')
                    ->on('type_equipments')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment');
    }
}
