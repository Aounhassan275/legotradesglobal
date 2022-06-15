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
            $table->string('name')->unique();
            $table->string('phone')->nullable();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('package_id')->nullable();
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            $table->string('address')->nullable();
            $table->float('cash_wallet')->default(0);
            $table->float('roi_account')->default(0);
            $table->date('a_date')->nullable();
            $table->string('code')->nullable();
            $table->string('type')->default('Member');
            $table->unsignedSmallInteger('refer_by')->nullable();
            $table->unsignedSmallInteger('referral')->nullable();
            $table->unsignedSmallInteger('associated_with')->nullable();
            $table->rememberToken();
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
