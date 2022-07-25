<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNameOfficialName extends Migration
{

    public function up()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->string('name', 256)->change();
        });
        Schema::table('countries', function (Blueprint $table) {
            $table->string('officialName', 256)->change();
        });
        Schema::table('countries', function (Blueprint $table) {
            $table->string('nativeName', 256)->change();
        });
        Schema::table('countries', function (Blueprint $table) {
            $table->string('nativeOfficialName', 256)->change();
        });
    }

    public function down()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->string('name', 70)->change();
        });
        Schema::table('countries', function (Blueprint $table) {
            $table->string('officialName', 70)->change();
        });
        Schema::table('countries', function (Blueprint $table) {
            $table->string('nativeName', 70)->change();
        });
        Schema::table('countries', function (Blueprint $table) {
            $table->string('nativeOfficialName', 70)->change();
        });
    }
}
