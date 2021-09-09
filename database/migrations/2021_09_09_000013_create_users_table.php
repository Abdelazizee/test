<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->boolean('active')->default(0)->nullable();
            $table->boolean('published')->default(0)->nullable();
            $table->string('country_phone_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('company_name')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('commercial_register_number')->nullable();
            $table->longText('addresse')->nullable();
            $table->string('location')->nullable();
            $table->string('lat')->nullable();
            $table->string('lang')->nullable();
            $table->string('company_phone')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
