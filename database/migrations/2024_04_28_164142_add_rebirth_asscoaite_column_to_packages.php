<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRebirthAsscoaiteColumnToPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->float('renew_direct_income')->nullable()->after('company_income');
            $table->float('renew_direct_team_income')->nullable()->after('company_income');
            $table->float('renew_upline_income')->nullable()->after('company_income');
            $table->float('renew_down_line_income')->nullable()->after('company_income');
            $table->float('renew_upline_placement_income')->nullable()->after('company_income');
            $table->float('renew_down_line_placement_income')->nullable()->after('company_income');
            $table->float('renew_trade_income')->nullable()->after('company_income');
            $table->float('renew_company_income')->nullable()->after('company_income');
            $table->float('renew_direct_pool_income')->nullable()->after('company_income');
            $table->float('self_rebirth')->nullable()->after('company_income');
            $table->float('self_associate')->nullable()->after('company_income');
            $table->float('direct_rebirth')->nullable()->after('company_income');
            $table->float('direct_associate')->nullable()->after('company_income');
            $table->float('renew_self_rebirth')->nullable()->after('company_income');
            $table->float('renew_self_associate')->nullable()->after('company_income');
            $table->float('renew_direct_rebirth')->nullable()->after('company_income');
            $table->float('renew_direct_associate')->nullable()->after('company_income');
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
            
            $table->dropColumn('renew_direct_income');
            $table->dropColumn('renew_direct_team_income');
            $table->dropColumn('renew_upline_income');
            $table->dropColumn('renew_down_line_income');
            $table->dropColumn('renew_upline_placement_income');
            $table->dropColumn('renew_down_line_placement_income');
            $table->dropColumn('renew_trade_income');
            $table->dropColumn('renew_company_income');
            $table->dropColumn('renew_direct_pool_income');
            $table->dropColumn('self_rebirth');
            $table->dropColumn('self_associate');
            $table->dropColumn('direct_rebirth');
            $table->dropColumn('direct_associate');
            $table->dropColumn('renew_self_rebirth');
            $table->dropColumn('renew_self_associate');
            $table->dropColumn('renew_direct_rebirth');
            $table->dropColumn('renew_direct_associate');
        });
    }
}
