<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_rent', function (Blueprint $table) {
            $table->primary('rent_id');
            $table->foreignId('rent_id')->constrained();
            $table->foreignId('room_id')->constrained();
            $table->unsignedSmallInteger('duration');
            $table->string('housenumber')->nullable();
            $table->string('street')->nullable();
            $table->string('commune')->nullable();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->float('cost', 9, 2, true);
            $table->float('total', 9, 2, true);
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
        Schema::dropIfExists('detail_rent');
    }
}
