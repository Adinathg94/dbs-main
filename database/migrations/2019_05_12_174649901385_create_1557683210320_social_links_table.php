<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557683210320SocialLinksTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('social_links')) {
            Schema::create('social_links', function (Blueprint $table) {
                $table->increments('id');
                $table->date('date');
                $table->string('title')->nullable();
                $table->string('platform');
                $table->string('url')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('social_links');
    }
}
