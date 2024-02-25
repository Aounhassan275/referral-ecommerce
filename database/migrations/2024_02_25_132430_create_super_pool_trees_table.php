<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuperPoolTreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('super_pool_trees', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('left_refferral')->nullable();
            $table->unsignedSmallInteger('right_refferral')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('super_pool_id');
            $table->foreign('super_pool_id')->references('id')->on('super_pools')->onDelete('cascade');
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
        Schema::dropIfExists('super_pool_trees');
    }
}
