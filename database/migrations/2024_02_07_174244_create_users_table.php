<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("national_code" , 11)->nullable(false)->unique();
            $table->string("fname" , 50)->nullable(false);
            $table->string("lname" , 50)->nullable(false);
            $table->string("father" , 50)->nullable(false);
            $table->string("birthday" , 15)->nullable(false);
            $table->string("case_status" , 100)->default("");
            $table->unsignedBigInteger('group_id');
            $table->foreign("group_id")->references('id')->on('groups');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
