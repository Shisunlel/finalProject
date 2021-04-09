<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHouseNumberStreetCommuneDistrictProvinceCostTotalToDetailRentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_rent', function (Blueprint $table) {
            $table->string('housenumber')->nullable();
            $table->string('street')->nullable();
            $table->string('commune')->nullable();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->float('cost', 9, 2, true);
            $table->float('total', 9, 2, true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_rent', function (Blueprint $table) {
            $table->dropColumn('housenumber');
            $table->dropColumn('street');
            $table->dropColumn('commune');
            $table->dropColumn('district');
            $table->dropColumn('province');
            $table->dropColumn('cost');
            $table->dropColumn('total');
        });
    }
}
