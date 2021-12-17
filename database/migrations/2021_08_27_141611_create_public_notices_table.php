<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_notices', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('agency_id')->nullable();
            $table->integer('area_one_id')->nullable();
            $table->integer('area_two_id')->nullable();
            $table->integer('area_three_id')->nullable();
            $table->string('property_number', 50)->nullable();
            $table->integer('size')->nullable();
            $table->string('size_type', 30)->nullable();
            $table->bigInteger('number')->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('public_notices');
    }
}
