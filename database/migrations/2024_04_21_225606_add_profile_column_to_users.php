<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileColumnToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('business_name')->nullable()->after('rebirth_id');
            $table->string('business_detail')->nullable()->after('rebirth_id');
            $table->string('business_address')->nullable()->after('rebirth_id');
            $table->string('reservation_phone')->nullable()->after('rebirth_id');
            $table->string('reservation_email')->nullable()->after('rebirth_id');
            $table->string('opening_hour')->nullable()->after('rebirth_id');
            $table->string('video_link')->nullable()->after('rebirth_id');
            $table->string('about_us_detail')->nullable()->after('rebirth_id');
            $table->string('full_name')->nullable()->after('rebirth_id');
            $table->string('bank_name')->nullable()->after('rebirth_id');
            $table->string('iban')->nullable()->after('rebirth_id');
            $table->string('account_holder_name')->nullable()->after('rebirth_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('business_name');
            $table->dropColumn('business_detail');
            $table->dropColumn('business_address');
            $table->dropColumn('reservation_phone');
            $table->dropColumn('reservation_email');
            $table->dropColumn('opening_hour');
            $table->dropColumn('video_link');
            $table->dropColumn('about_us_detail');
            $table->dropColumn('full_name');
            $table->dropColumn('bank_name');
            $table->dropColumn('iban');
            $table->dropColumn('account_holder_name');
        });
    }
}
