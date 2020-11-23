<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHirtoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hirtories', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('mr');
            $table->string('pa');
            $table->string('da');
            $table->date('status_update')->nullable();
            $table->unsignedBigInteger('api_data_id');
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
        Schema::dropIfExists('hirtories');
    }
}
