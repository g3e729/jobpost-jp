<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('uploader_id')->nullable();
            $table->string('url')->nullable();
            $table->string('file_name')->nullable();
            $table->string('type')->nullable();
            $table->string('mime_type')->nullable();
            $table->string('size')->default(0);
            $table->integer('sort')->default(0);
            $table->integer('fileable_id');
            $table->string('fileable_type');
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
        Schema::dropIfExists('files');
    }
}
