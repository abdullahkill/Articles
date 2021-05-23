<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplidTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applid_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('projectdetail_id')->nullable();
            $table->foreign('projectdetail_id')->references('id')->on('project_details')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('register_id')->nullable();
            $table->foreign('register_id')->references('id')->on('registers')->onDelete('cascade')->onUpdate('cascade');
            $table->string('description');
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
        Schema::dropIfExists('applid_tasks');
    }
}
