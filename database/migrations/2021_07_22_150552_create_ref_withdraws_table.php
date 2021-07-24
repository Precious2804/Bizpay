<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_withdraws', function (Blueprint $table) {
            $table->id();
            $table->uuid('unique_id');
            $table->uuid('ref_id')->unique();
            $table->string('email');
            $table->string('phone');
            $table->string('bonus_amount');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('ref_withdraws');
    }
}
