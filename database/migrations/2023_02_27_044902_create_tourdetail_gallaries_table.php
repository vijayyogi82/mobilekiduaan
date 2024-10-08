<?php



use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;



class CreateTourdetailGallariesTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('tourdetail_gallaries', function (Blueprint $table) {

            $table->id();

            $table->string('tourdetails_id')->nullable();

            $table->string('images');

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

        Schema::dropIfExists('tourdetail_gallaries');

    }

}

