<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->enum('legal_status', ['registered', 'unregistered'])->default('registered');
            $table->string('visual_identity')->nullable();
            $table->string('registration_number');
            $table->string('postal', 255)->nullable();
            $table->string('address', 255)->nullable();


            // Foreign Key
            $table->foreignId('employer_id')->constrained('employers')->nullOnDelete();
            $table->foreignId('country_id')->constrained('countries')->nullOnDelete();
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
        Schema::dropIfExists('companies');
    }
}
