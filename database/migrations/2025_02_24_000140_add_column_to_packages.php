<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->string('distribution')->nullable()->before('created_at');
            $table->string('flush_income')->nullable()->before('created_at');
            $table->string('five_percent_sale')->nullable()->before('created_at');
            $table->string('five_percent_sale_limit')->nullable()->before('created_at');
            $table->string('ten_percent_sale_limit')->nullable()->before('created_at');
            $table->string('fifteen_percent_sale')->nullable()->before('created_at');
            $table->string('fifteen_percent_sale_limit')->nullable()->before('created_at');
            $table->string('twenty_percent_sale_limit')->nullable()->before('created_at');
            $table->string('twenty_five_percent_sale')->nullable()->before('created_at');
            $table->string('twenty_five_percent_sale_limit')->nullable()->before('created_at');
            $table->string('direct_income_2')->nullable()->before('created_at');
            $table->string('direct_income_3')->nullable()->before('created_at');
            $table->string('direct_income_4')->nullable()->before('created_at');
            $table->string('direct_income_5')->nullable()->before('created_at');
            $table->string('self_loan_limit')->nullable()->before('created_at');
            $table->string('renew_direct_income_2')->nullable()->before('created_at');
            $table->string('renew_direct_income_3')->nullable()->before('created_at');
            $table->string('renew_direct_income_4')->nullable()->before('created_at');
            $table->string('renew_direct_income_5')->nullable()->before('created_at');
            $table->string('renew_self_loan_limit')->nullable()->before('created_at');
            $table->string('renew_all_accounts')->nullable()->before('created_at');
            $table->string('all_assoicate')->nullable()->before('created_at');
            $table->string('company_assoicate')->nullable()->before('created_at');
            $table->string('for_medicine')->nullable()->before('created_at');
            $table->string('for_purchase_all')->nullable()->before('created_at');
            $table->string('monthly_draw')->nullable()->before('created_at');
            $table->string('company_products')->nullable()->before('created_at');
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
            $table->dropColumn('distribution');
            $table->dropColumn('flush_income');
            $table->dropColumn('five_percent_sale');
            $table->dropColumn('five_percent_sale_limit');
            $table->dropColumn('ten_percent_sale_limit');
            $table->dropColumn('fifteen_percent_sale');
            $table->dropColumn('fifteen_percent_sale_limit');
            $table->dropColumn('twenty_percent_sale_limit');
            $table->dropColumn('twenty_five_percent_sale');
            $table->dropColumn('twenty_five_percent_sale_limit');
            $table->dropColumn('direct_income_2');
            $table->dropColumn('direct_income_3');
            $table->dropColumn('direct_income_4');
            $table->dropColumn('direct_income_5');
            $table->dropColumn('self_loan_limit');
            $table->dropColumn('renew_direct_income_2');
            $table->dropColumn('renew_direct_income_3');
            $table->dropColumn('renew_direct_income_4');
            $table->dropColumn('renew_direct_income_5');
            $table->dropColumn('renew_self_loan_limit');
            $table->dropColumn('renew_all_accounts');
            $table->dropColumn('all_assoicate');
            $table->dropColumn('company_assoicate');
            $table->dropColumn('for_medicine');
            $table->dropColumn('for_purchase_all');
            $table->dropColumn('monthly_draw');
            $table->dropColumn('company_products');
        });
    }
}
