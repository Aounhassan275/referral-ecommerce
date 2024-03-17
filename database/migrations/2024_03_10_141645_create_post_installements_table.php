<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostInstallementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_installements', function (Blueprint $table) {
            $table->id();
            $table->float('price')->default(0);
            $table->float('monthly_amount')->default(0);
            $table->string('duration')->default(12);
            $table->unsignedSmallInteger('post_id')->nullable();
            $table->unsignedSmallInteger('user_id')->nullable();
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
        Schema::dropIfExists('post_installements');
    }
}
