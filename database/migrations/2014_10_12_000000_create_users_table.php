<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('unique_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->date('date');
            $table->string('image')->nullable();
            $table->string('coupone_code');
            $table->string('package');
            $table->string('referral')->nullable();
            $table->string('ref_bonus')->nullable();
            $table->string('bank')->nullable();
            $table->string('acct_name')->nullable();
            $table->string('acct_number')->nullable()->unique();
            $table->string('isAdmin')->nullable()->default(0);
            $table->string('isVerified')->nullable()->default(0);
            $table->string('password');
            $table->string('remember_token')->nullable();
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
        Schema::dropIfExists('users');
    }
}
