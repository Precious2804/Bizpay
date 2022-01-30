<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid('trans_id');
            $table->string('email');
            $table->string('trans_type');
            $table->string('amount');
            $table->string('profit');
            $table->string('status');
            $table->string('duration');
            $table->string('days_left');
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
        Schema::dropIfExists('all_transactions');
    }
}
