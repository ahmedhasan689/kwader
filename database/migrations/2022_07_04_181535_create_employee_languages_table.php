<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_languages', function (Blueprint $table) {
//            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->nullOnDelete();
            $table->foreignId('language_id')->constrained('languages')->nullOnDelete();
            $table->enum('level', ['مبتدئ', 'متوسط', 'أتحدثه بطلاقة'])->default('مبتدئ');
            $table->timestamps();

            $table->primary([
                'employee_id', 'language_id', 'level'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_languages');
    }
}
