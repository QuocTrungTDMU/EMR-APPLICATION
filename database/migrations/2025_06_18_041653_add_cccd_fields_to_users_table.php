<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCccdFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('cccd_number')->nullable();
            $table->string('cccd_issue_date')->nullable();
            $table->string('cccd_issue_place')->nullable();
            $table->string('cccd_image')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['cccd_number', 'cccd_issue_date', 'cccd_issue_place', 'cccd_image']);
        });
    }
}