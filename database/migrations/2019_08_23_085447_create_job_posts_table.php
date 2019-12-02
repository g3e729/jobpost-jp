<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_profile_id')->nullable();
            $table->foreign('company_profile_id')
                ->references('id')
                ->on('company_profiles')
                ->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();

            $table->string('position');
            $table->string('programming_language');
            $table->string('framework');
            $table->string('environment');
            $table->string('database');
            $table->string('requirements');
            $table->string('status_id');
            $table->string('number_of_applicants');
            $table->string('work_time');
            $table->string('holidays');
            $table->string('allowance');
            $table->string('incentive');
            $table->string('salary_increase');
            $table->string('insurance');
            $table->string('contract_period');
            $table->string('screening_flow');

            $table->string('prefecture')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->string('city')->nullable();
            $table->string('country', 3)->nullable();
            
            $table->string('station')->nullable();

            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('job_posts');
    }
}
