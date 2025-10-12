<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalSeatPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_seat_plans', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            
            $table->integer('is_b1_room_own')->default(0);
            $table->integer('is_b1_room_is_active')->default(1);
            $table->string('b1_room_a1')->nullable();
            $table->string('b1_room_a2')->nullable();
            $table->string('b1_room_b1')->nullable();
            $table->string('b1_room_b2')->nullable();
            $table->string('b1_room_c1')->nullable();
            $table->string('b1_room_c2')->nullable();
            
            $table->integer('is_b2_lab_own')->default(0);
            $table->integer('is_b2_lab_is_active')->default(1);
            $table->string('b2_lab_desk_1')->nullable();
            $table->string('b2_lab_desk_2')->nullable();
            $table->string('b2_lab_desk_3')->nullable();
            $table->string('b2_lab_desk_4')->nullable();
            $table->string('b2_lab_desk_5')->nullable();
            $table->string('b2_lab_desk_6')->nullable();
            
            
            $table->integer('is_hall_room_own')->default(1);
            $table->integer('is_hall_room_is_active')->default(1);
            $table->string('hall_room_a1')->nullable();
            $table->string('hall_room_a2')->nullable();
            $table->string('hall_room_a3')->nullable();
            $table->string('hall_room_a4')->nullable();
            $table->string('hall_room_a5')->nullable();
            $table->string('hall_room_a6')->nullable();
            $table->string('hall_room_a7')->nullable();
            $table->string('hall_room_a8')->nullable();
            $table->string('hall_room_a9')->nullable();
            $table->string('hall_room_a10')->nullable();
            
            $table->string('hall_room_b1')->nullable();
            $table->string('hall_room_b2')->nullable();
            $table->string('hall_room_b3')->nullable();
            $table->string('hall_room_b4')->nullable();
            $table->string('hall_room_b5')->nullable();
            $table->string('hall_room_b6')->nullable();
            $table->string('hall_room_b7')->nullable();
            $table->string('hall_room_b8')->nullable();
            $table->string('hall_room_b9')->nullable();
            
            $table->string('hall_room_c1')->nullable();
            $table->string('hall_room_c2')->nullable();
            
            
            $table->integer('ilford_01')->default(0);
            $table->integer('ilford_01_is_active')->default(1);
            $table->string('ilford_01_a1')->nullable();
            $table->string('ilford_01_a2')->nullable();
            $table->string('ilford_01_a3')->nullable();
            $table->string('ilford_01_b1')->nullable();
            $table->string('ilford_01_b2')->nullable();
            $table->string('ilford_01_b3')->nullable();
            
            
            $table->integer('ilford_02')->default(0);
            $table->integer('ilford_02_is_active')->default(1);
            $table->string('ilford_02_a1')->nullable();
            $table->string('ilford_02_a2')->nullable();
            $table->string('ilford_02_a3')->nullable();
            $table->string('ilford_02_a4')->nullable();
            $table->string('ilford_02_b1')->nullable();
            $table->string('ilford_02_b2')->nullable();
            $table->string('ilford_02_b3')->nullable();
     
            
            
            $table->longText('candidate_details')->nullable();
           
        
 
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
        Schema::dropIfExists('global_seat_plans');
    }
}
