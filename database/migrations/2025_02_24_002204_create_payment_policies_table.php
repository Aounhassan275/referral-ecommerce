<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentPoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_policies', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('sender_twenty_team_level')->nullable();
            $table->string('receiver_twenty_team_level')->nullable();
            $table->string('company_trade_income')->nullable();
            $table->string('company_products')->nullable();
            $table->string('purchase_reward')->nullable();
            $table->string('draw_monthly')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_policies');
    }
}
