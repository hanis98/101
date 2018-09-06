<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class AddApproverColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->boolean('is_approved')->default(false);
            $table->unsignedInteger('approved_by')->nullable();
            $table->text('approved_remarks')->nullable();
            $table->datetime('approved_at')->nullable();
            $table->foreign('approved_by')
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
            $table->dropForeign(['approved_by']);
            $table->dropColumn('is_approved');
            $table->dropColumn('approved_by');
            $table->dropColumn('approved_remarks');
            $table->dropColumn('approved_at');
        });
    }
}