<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourdetails', function (Blueprint $table){
            $table->id();
            $table->string('title');
            $table->string('price');
            $table->string('tourcategory_id');
            $table->string('activitylevel');
            $table->string('groupsize');
            $table->string('image');
            $table->string('location');
            $table->longText('overview');
            $table->longText('included');
            $table->longText('notincluded');
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
        Schema::dropIfExists('tourdetails');
    }
}
