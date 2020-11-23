<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_data', function (Blueprint $table) {
            $table->increments('api_data_id');
            $table->string('domain_name');
            $table->string('extention');
            $table->date('registration_date');
            $table->string('status');
            $table->string('mr');
            $table->string('pa');
            $table->string('da');
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
        Schema::dropIfExists('api_data');
    }
}
