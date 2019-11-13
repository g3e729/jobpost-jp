<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('company_name')->nullable();
            $table->text('description')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('prefecture')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->string('city')->nullable();
            $table->string('country', 3)->nullable();
            $table->string('industry_id')->nullable();
            $table->string('cover_photo')->nullable();
            $table->string('homepage')->nullable();
            $table->string('ceo')->nullable();
            $table->integer('number_of_employees')->nullable();
            $table->timestamp('established_date')->nullable();

            $table->text('what_text')->nullable();
            $table->text('why_text')->nullable();
            $table->text('how_text')->nullable();

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
        Schema::dropIfExists('company_profiles');
    }
}
