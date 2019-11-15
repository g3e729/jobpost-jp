<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('school_name')->nullable();
            $table->string('faculty')->nullable();
            $table->string('major')->nullable();
            $table->string('department')->nullable();
            $table->text('content')->nullable();
            $table->integer('historiable_id');
            $table->string('historiable_type');
            $table->timestamp('graduated_at')->nullable();
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
        Schema::dropIfExists('education_histories');
    }
}
