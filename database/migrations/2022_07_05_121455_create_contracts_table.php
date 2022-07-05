<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('contract_number')->unique();
            $table->enum('status', ['قيد التنفيذ', 'ملغاة', 'مكتملة'])->default('قيد التنفيذ');
            $table->string('total');
            $table->enum('type', ['دوام كامل', 'دوام جزئي'])->default('دوام جزئي');
            $table->enum('duration', ['شهر', 'شهرين', 'ثلاث أشهر'])->default('شهر');

            // Foreign Keys
            $table->foreignId('employer_id')->constrained('employers')->nullOnDelete();
            $table->foreignId('company_id')->constrained('companies')->nullOnDelete();
            $table->foreignId('employee_id')->constrained('employees')->nullOnDelete();
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
        Schema::dropIfExists('contracts');
    }
}
