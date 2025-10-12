<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMockTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mock_tests', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('exam_series')->nullable();
            $table->float('total_amount')->default(0);
            $table->text('exam_information')->nullable();
            $table->integer('is_deleted')->default(0);
            $table->integer('status')->default(1);
            $table->integer('is_completed')->default(0);
            $table->integer('is_canceled')->default(0);
            $table->integer('is_confirmation')->default(0);
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
        Schema::dropIfExists('mock_tests');
    }
}
