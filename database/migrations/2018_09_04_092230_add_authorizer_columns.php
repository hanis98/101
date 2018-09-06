<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class AddAuthorizerColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->boolean('is_authorized')->default(false);
            $table->unsignedInteger('authorized_by')->nullable();
            $table->text('authorized_remarks')->nullable();
            $table->datetime('authorized_at')->nullable();
            $table->foreign('authorized_by')
                ->references('id')->on('users');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropForeign(['authorized_by']);
            $table->dropColumn('is_authorized');
            $table->dropColumn('authorized_by');
            $table->dropColumn('authorized_remarks');
            $table->dropColumn('authorized_at');
        });
    }
}