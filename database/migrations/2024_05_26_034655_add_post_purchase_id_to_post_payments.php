<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPostPurchaseIdToPostPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_payments', function (Blueprint $table) {
            $table->unsignedSmallInteger('post_purchase_id')->nullable()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_payments', function (Blueprint $table) {
            $table->dropColumn('post_purchase_id');
        });
    }
}
