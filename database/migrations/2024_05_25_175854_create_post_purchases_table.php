<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_purchases', function (Blueprint $table) {
            $table->id();
            $table->float('amount');
            $table->string('type');
            $table->unsignedSmallInteger('post_id')->nullable();
            $table->unsignedSmallInteger('user_id')->nullable();
            $table->unsignedSmallInteger('post_installement_id')->nullable();
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
        Schema::dropIfExists('post_purchases');
    }
}
