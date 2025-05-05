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
        Schema::table('users', function (Blueprint $table) {
            $table->float('company_reward')->default(0)->nullable();
            $table->float('star_rank_income')->default(0)->nullable();
            $table->float('direct_team_income')->default(0)->nullable();
            $table->float('purchase_reward')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('company_reward');
            $table->dropColumn('star_rank_income');
            $table->dropColumn('direct_team_income');
            $table->dropColumn('purchase_reward');
        });
    }
};
