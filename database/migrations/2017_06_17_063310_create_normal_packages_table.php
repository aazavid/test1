<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNormalPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('normal_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nomberOrder');
            $table->unsignedInteger('id_client');
            $table->string('typePackages');
            $table->string('nomber_partners');
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
        Schema::dropIfExists('normal_packages');
    }
}
