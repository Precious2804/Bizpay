<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupones', function (Blueprint $table) {
            $table->id();
            $table->uuid('unique_id');
            $table->uuid('coupone_code');
            $table->string('user_email')->nullable();
            $table->string('package');
            $table->string('amount');
            $table->string('profit');
            $table->date('expire_at')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('coupones');
    }
}
