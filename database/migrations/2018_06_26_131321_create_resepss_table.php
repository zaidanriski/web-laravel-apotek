<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResepssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resepss', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tgl_resep');
            $table->integer('pasien')->index('resepss_pasien')->nullable()->unsigned();
            $table->integer('total_harga');
            $table->timestamps();
        });

        Schema::table('resepss', function ($table) {
            $table->foreign('pasien')->references('id')->on('pasiens')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resepss', function(Blueprint $table)
          {
           $table->dropForeign('resepss_pasien_foreign');
          });

        Schema::dropIfExists('resepss');
    }
}
