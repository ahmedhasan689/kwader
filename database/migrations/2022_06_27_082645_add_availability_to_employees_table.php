<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvailabilityToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->foreignId('nationality_id')->constrained('nationalities')->after('field_id')->nullOnDelete();
            $table->enum('availability', ['Available', 'Unavailable'])->after('salary')->default('Available');
            $table->enum('job_type', ['دوام جزئي', 'دوام كامل'])->after('availability')->default('دوام كامل');
            $table->enum('marital_status', ['عزابي', 'متزوج'])->after('gender')->default('عزابي');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            //
        });
    }
}
