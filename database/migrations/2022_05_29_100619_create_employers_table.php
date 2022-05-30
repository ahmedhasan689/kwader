<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            // Foreign Key For User Model
            $table->foreignId('user_id')->constrained('users')->nullOnDelete();

            $table->string('avatar');
            $table->date('date_of_birth');
            $table->text('bio');
            $table->enum('gender', ['Male', 'Female'])->default('Male');
            $table->rememberToken();

            // Foreign Keys
            $table->foreignId('company_id')->nullable()->constrained('companies')->nullOnDelete();
            $table->foreignId('country_id')->constrained('countries')->nullOnDelete();
            $table->foreignId('language_id')->constrained('languages')->nullOnDelete();

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
        Schema::dropIfExists('employers');
    }
}
