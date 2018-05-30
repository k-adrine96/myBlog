<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'lastname')) {
                $table->string('lastname')->after('name');
            }
            if (!Schema::hasColumn('users', 'phone')) {
               $table->string('phone')->after('email');
            }
            if (!Schema::hasColumn('users', 'is_admin')) {
               $table->integer('is_admin')->after('phone')->default(0);
            }
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
            $table->dropColumn(['lastname', 'phone', 'is_admin']);
        });
    }
}
