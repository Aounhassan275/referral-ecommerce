<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSuperPoolFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('super_pool_1')->default(0)->before('created_at');
            $table->boolean('super_pool_2')->default(0)->before('created_at');
            $table->boolean('super_pool_3')->default(0)->before('created_at');
            $table->boolean('super_pool_4')->default(0)->before('created_at');
            $table->boolean('super_pool_5')->default(0)->before('created_at');
            $table->boolean('super_pool_6')->default(0)->before('created_at');
            $table->boolean('super_pool_7')->default(0)->before('created_at');
            $table->boolean('super_pool_8')->default(0)->before('created_at');
            $table->boolean('super_pool_9')->default(0)->before('created_at');
            $table->boolean('super_pool_10')->default(0)->before('created_at');
            $table->boolean('super_pool_11')->default(0)->before('created_at');
            $table->boolean('super_pool_12')->default(0)->before('created_at');
            $table->boolean('super_pool_13')->default(0)->before('created_at');
            $table->boolean('super_pool_14')->default(0)->before('created_at');
            $table->boolean('super_pool_15')->default(0)->before('created_at');
            $table->boolean('super_pool_16')->default(0)->before('created_at');
            $table->boolean('super_pool_17')->default(0)->before('created_at');
            $table->boolean('super_pool_18')->default(0)->before('created_at');
            $table->boolean('super_pool_19')->default(0)->before('created_at');
            $table->boolean('super_pool_20')->default(0)->before('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->dropColumn('super_pool_1');
            $table->dropColumn('super_pool_2');
            $table->dropColumn('super_pool_3');
            $table->dropColumn('super_pool_4');
            $table->dropColumn('super_pool_5');
            $table->dropColumn('super_pool_6');
            $table->dropColumn('super_pool_7');
            $table->dropColumn('super_pool_8');
            $table->dropColumn('super_pool_9');
            $table->dropColumn('super_pool_10');
            $table->dropColumn('super_pool_11');
            $table->dropColumn('super_pool_12');
            $table->dropColumn('super_pool_13');
            $table->dropColumn('super_pool_14');
            $table->dropColumn('super_pool_15');
            $table->dropColumn('super_pool_16');
            $table->dropColumn('super_pool_17');
            $table->dropColumn('super_pool_18');
            $table->dropColumn('super_pool_19');
            $table->dropColumn('super_pool_20');
        });
    }
}
