<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSocialMediaColumnToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('facebook')->nullable()->after('display_order');
            $table->string('instagram')->nullable()->after('display_order');
            $table->string('whatsapp')->nullable()->after('display_order');
            $table->string('youtube')->nullable()->after('display_order');
            $table->string('linkedin')->nullable()->after('display_order');
            $table->string('twitter')->nullable()->after('display_order');
            $table->string('snack_video')->nullable()->after('display_order');
            $table->string('tiktok')->nullable()->after('display_order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('facebook');
            $table->dropColumn('instagram');
            $table->dropColumn('whatsapp');
            $table->dropColumn('youtube');
            $table->dropColumn('linkedin');
            $table->dropColumn('twitter');
            $table->dropColumn('snack_video');
            $table->dropColumn('tiktok');
        });
    }
}
