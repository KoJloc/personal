<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTinAddressTypeAgeToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('tin')->nullable()->after('password');
            $table->string('address')->nullable()->after('tin');
            $table->string('type')->nullable()->after('address');
            $table->string('age')->nullable()->after('type');
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
            $table->dropColumn('tin');
            $table->dropColumn('address');
            $table->dropColumn('type');
            $table->dropColumn('age');
        });
    }
}
