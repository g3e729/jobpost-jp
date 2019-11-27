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
            $table->integer('occupation_id')->default(0);
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
            $table->string('github')->nullable();
            
            $table->integer('course_id')->default(0);
            $table->json('taken_id')->nullable();
            $table->integer('it_level')->default(0);
            $table->integer('reading')->default(0);
            $table->integer('listening')->default(0);
            $table->integer('speaking')->default(0);
            $table->integer('writing')->default(0);
            $table->string('english_level_id')->default(0);
            $table->integer('toiec_score')->default(0);

            $table->text('what_text')->nullable();
            $table->text('intro_text')->nullable();
            $table->text('movie_url')->nullable();

            $table->softDeletes();
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
