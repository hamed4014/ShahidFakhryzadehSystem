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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_id');
            $table->foreign("group_id")->references('id')->on('groups')
                -> onDelete('cascade')->nullable(false);
            $table->unsignedBigInteger('session_id');
            $table->foreign("session_id")->references('id')->on('sessions')
                -> onDelete('cascade')->nullable(false);
            $table->string("subject" , 150)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
