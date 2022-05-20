<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGithubColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('github_id')->nullable();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->string('github_avatar')->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('github_nickname')->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('github_token')->nullable();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->string('github_refresh_token')->nullable();
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
            $table->dropColumn('github_id');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('github_nickname');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('github_avatar');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('github_token');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('github_refresh_token');
        });
    }
}
