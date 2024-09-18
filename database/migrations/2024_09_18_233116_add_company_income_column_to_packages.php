<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyIncomeColumnToPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->float('starter_package_income')->nullable()->after('fifty_percent_sale');
            $table->float('salary_package_income')->nullable()->after('fifty_percent_sale');
            $table->float('brand_package_income')->nullable()->after('fifty_percent_sale');
            $table->float('company_new_account_income')->nullable()->after('fifty_percent_sale');
            $table->float('company_employee_account_income')->nullable()->after('fifty_percent_sale');
            $table->float('company_renew_income')->nullable()->after('fifty_percent_sale');
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
            $table->dropColumn('starter_package_income');
            $table->dropColumn('salary_package_income');
            $table->dropColumn('brand_package_income');
            $table->dropColumn('company_new_account_income');
            $table->dropColumn('company_employee_account_income');
            $table->dropColumn('company_renew_income');
        });
    }
}
