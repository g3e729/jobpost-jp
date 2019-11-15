<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name')->nullable();
            $table->string('role')->nullable();
            $table->text('content')->nullable();
            $table->integer('historiable_id');
            $table->string('historiable_type');
            $table->boolean('is_present')->default(1);
            $table->timestamp('started_at')->nullable();
            $table->timestamp('ended_at')->nullable();
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
        Schema::dropIfExists('work_histories');
    }
}
