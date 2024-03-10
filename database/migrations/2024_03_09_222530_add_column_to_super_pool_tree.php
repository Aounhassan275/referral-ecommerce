<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToSuperPoolTree extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('super_pool_trees', function (Blueprint $table) {
            $table->float('rebirth')->default(0)->nullable()->after('super_pool_id');
            $table->float('next_pool_income')->default(0)->nullable()->after('super_pool_id');
            $table->float('direct_pool_income')->default(0)->nullable()->after('super_pool_id');
            $table->float('revenue')->default(0)->nullable()->after('super_pool_id');
            $table->float('downline_income')->default(0)->nullable()->after('super_pool_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('super_pool_trees', function (Blueprint $table) {
            $table->dropColumn('rebirth');
            $table->dropColumn('next_pool_income');
            $table->dropColumn('direct_pool_income');
            $table->dropColumn('revenue');
            $table->dropColumn('downline_income');
        });
    }
}
