<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('userid')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->date('birth');
            $table->string('password');
            $table->boolean('agree1');
            $table->boolean('agree2');
            $table->string('remember_token')->nullable();
            $table->timestamp('register_date')->nullable(); 
            $table->timestamp('created_at')->nullable(); 
            $table->timestamp('updated_at')->nullable(); 
            $table->timestamp('deleted_at')->nullable(); 
            $table->string('register_status');
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
};
