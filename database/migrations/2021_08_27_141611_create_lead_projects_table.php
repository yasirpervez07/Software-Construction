<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_projects', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('lead_id')->nullable();
            $table->integer('project_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('lead_status')->nullable();
            $table->integer('call_status')->nullable();
            $table->integer('chat_status')->nullable();
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
        Schema::dropIfExists('lead_projects');
    }
}
