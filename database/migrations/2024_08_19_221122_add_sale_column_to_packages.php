<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSaleColumnToPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->float('fifty_percent_sale')->nullable()->after('renew_direct_associate');
            $table->float('fourty_percent_sale')->nullable()->after('renew_direct_associate');
            $table->float('thirty_percent_sale')->nullable()->after('renew_direct_associate');
            $table->float('twenty_percent_sale')->nullable()->after('renew_direct_associate');
            $table->float('ten_percent_sale')->nullable()->after('renew_direct_associate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn('fifty_percent_sale');
            $table->dropColumn('fourty_percent_sale');
            $table->dropColumn('thirty_percent_sale');
            $table->dropColumn('twenty_percent_sale');
            $table->dropColumn('ten_percent_sale');
        });
    }
}
