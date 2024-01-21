<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSocialLinkToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('facebook')->nullable()->after('country_id');
            $table->string('instagram')->nullable()->after('country_id');
            $table->string('whatsapp')->nullable()->after('country_id');
            $table->string('youtube')->nullable()->after('country_id');
            $table->string('linkedin')->nullable()->after('country_id');
            $table->string('twitter')->nullable()->after('country_id');
            $table->string('snack_video')->nullable()->after('country_id');
            $table->string('tiktok')->nullable()->after('country_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
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
