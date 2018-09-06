<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class AddIcJabatanJawatanColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // ic, jabatan, jawatan
            $table->string('ic')->after('id');
            $table->string('jabatan')->after('password');
            $table->string('jawatan')->after('password');
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
            $table->dropColumn('ic');
            $table->dropColumn('jabatan');
            $table->dropColumn('jawatan');
        });
    }
}