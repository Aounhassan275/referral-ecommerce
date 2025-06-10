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
            $table->string('health_limit')->nullable();
            $table->string('direct_health_limit')->nullable();
            $table->string('purchase_limit')->nullable();
            $table->string('direct_purchase_limit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn('health_limit');
            $table->dropColumn('direct_health_limit');
            $table->dropColumn('purchase_limit');
            $table->dropColumn('direct_purchase_limit');
        });
    }
};
