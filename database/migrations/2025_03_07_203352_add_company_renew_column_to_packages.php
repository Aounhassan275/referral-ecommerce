<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyRenewColumnToPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->string('renew_starter_package_income')->nullable()->before('created_at');
            $table->string('renew_seller_package_income')->nullable()->before('created_at');
            $table->string('renew_salary_package_income')->nullable()->before('created_at');
            $table->string('renew_brand_package_income')->nullable()->before('created_at');
            $table->string('renew_company_new_account_income')->nullable()->before('created_at');
            $table->string('renew_company_employee_account_income')->nullable()->before('created_at');
            $table->string('renew_company_renew_income')->nullable()->before('created_at');
            $table->string('renew_renew_all_accounts')->nullable()->before('created_at');
            $table->string('renew_all_assoicate')->nullable()->before('created_at');
            $table->string('renew_company_assoicate')->nullable()->before('created_at');
            $table->string('renew_for_medicine')->nullable()->before('created_at');
            $table->string('renew_for_purchase_all')->nullable()->before('created_at');
            $table->string('renew_monthly_draw')->nullable()->before('created_at');
            $table->string('renew_company_products')->nullable()->before('created_at');
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
            $table->dropColumn('renew_starter_package_income');
            $table->dropColumn('renew_seller_package_income');
            $table->dropColumn('renew_salary_package_income');
            $table->dropColumn('renew_brand_package_income');
            $table->dropColumn('renew_company_new_account_income');
            $table->dropColumn('renew_company_employee_account_income');
            $table->dropColumn('renew_company_renew_income');
            $table->dropColumn('renew_renew_all_accounts');
            $table->dropColumn('renew_all_assoicate');
            $table->dropColumn('renew_company_assoicate');
            $table->dropColumn('renew_for_medicine');
            $table->dropColumn('renew_for_purchase_all');
            $table->dropColumn('renew_monthly_draw');
            $table->dropColumn('renew_company_products');
        });
    }
}
