<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_plans', function (Blueprint $table) {
            $table->id();
            $table->uuid('package_id');
            $table->string('package')->nullable();
            $table->string('value')->nullable();
            $table->string('ref_bonus')->nullable();
            $table->string('spons_bonus')->nullable();
            $table->string('min_withdraw')->nullable();
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
        Schema::dropIfExists('package_plans');
    }
}
