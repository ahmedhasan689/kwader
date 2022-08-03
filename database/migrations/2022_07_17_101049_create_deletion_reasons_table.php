<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeletionReasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deletion_reasons', function (Blueprint $table) {
            $table->id();
            // Foreign ID For User Table
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            $table->json('reasons');
            $table->text('explain')->nullable();
            $table->enum('contact', ['True', 'False'])->default('False');

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
        Schema::dropIfExists('deletion_reasons');
    }
}
