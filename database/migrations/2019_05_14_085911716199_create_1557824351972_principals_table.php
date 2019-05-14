<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557824351972PrincipalsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('principals')) {
            Schema::create('principals', function (Blueprint $table) {
                $table->increments('id');
                $table->longText('message');
                $table->string('name');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('principals');
    }
}
