<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnergiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('energias', function (Blueprint $table) {
            $table->id();
            $table->dateTime('startDate')->nullable();
            $table->dateTime('endDate')->nullable();
            $table->float('dayNight')->nullable();
            $table->float('day')->nullable();
            $table->float('night')->nullable();
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
        Schema::dropIfExists('energias');
    }
}
