<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeekerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seeker_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('sex')->nullable();
            $table->string('contact_number')->nullable();
            $table->double('study_abroad_fee', 20, 2)->nullable();
            $table->string('passport_number')->nullable();
            
            $table->integer('type_of_room')->nullable();
            $table->timestamp('enrollment_date')->nullable();
            $table->timestamp('graduation_date')->nullable();
            $table->integer('status')->nullable();
            $table->integer('course_id')->nullable();
            $table->integer('study_period')->default(0);
            $table->integer('travel_ticket')->default(0);
            $table->integer('for_pickup')->default(0);

            $table->text('description')->nullable();
            $table->string('prefecture')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->string('city')->nullable();
            $table->string('country', 3)->nullable();
            $table->timestamp('birthday')->nullable();
            $table->text('portfolio')->nullable();
            $table->string('github')->nullable();
            
            $table->integer('pre_english_level')->default(0);
            $table->integer('pre_it_level')->default(0);
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
        Schema::dropIfExists('seeker_profiles');
    }
}
