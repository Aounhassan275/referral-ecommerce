<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->string('self_salary')->nullable()->default(0)->after('direct_purchase_limit');
            $table->string('direct_salary')->nullable()->default(0)->after('direct_purchase_limit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn('self_salary');
            $table->dropColumn('direct_salary');
        });
    }
};
