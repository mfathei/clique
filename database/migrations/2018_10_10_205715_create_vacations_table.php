<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('type');
            $table->string('reason')->nullable();
            $table->timestamp('approved_at');
            $table->unsignedInteger('approved_by');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('notes')->nullable();
            $table->timestamps();
            
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('approved_by')->references('id')->on('employees');
            $table->foreign('type')->references('id')->on('vacation_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacations');
    }
}
