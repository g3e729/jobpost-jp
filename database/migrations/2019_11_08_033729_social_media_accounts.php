<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SocialMediaAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_media_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url')->nullable();
            $table->string('social_media')->nullable();
            $table->integer('accountable_id');
            $table->string('accountable_type');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_media_accounts');
    }
}
