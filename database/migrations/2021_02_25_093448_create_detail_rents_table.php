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
<<<<<<< HEAD:database/migrations/2021_02_25_093448_create_rent_details_table.php
            $table->unsignedSmallInteger('duration');
            $table->foreignId('rent_id')->constrained();
            $table->foreignId('room_id')->constrained();
=======
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
>>>>>>> rapol-v9:database/migrations/2021_02_25_093448_create_detail_rents_table.php
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
