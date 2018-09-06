<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('purpose');
            $table->boolean('usage')->default(true)->comment('true for Luaran, false for Dalaman');
            $table->string('location');
            $table->unsignedInteger('total_participants');
            $table->tinyInteger('status')->default(1)->comment('1 - in progress, 2 - success, 3 - rejected');
            $table->datetime('started_at');
            $table->datetime('ended_at');
            $table->timestamps();
        });
        Schema::create('application_peralatan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('application_id');
            $table->unsignedInteger('peralatan_id');
            $table->unsignedInteger('quantity');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_peralatan');
        Schema::dropIfExists('applications');
    }
}