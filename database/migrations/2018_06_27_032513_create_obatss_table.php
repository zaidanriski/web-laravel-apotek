<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObatssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_obat',50);
            $table->integer('jenis_obat')->index('obats_jenis_obat')->nullable()->unsigned();
            $table->integer('kategori')->index('obats_kategori')->nullable()->unsigned();
            $table->integer('harga_obat');
            $table->integer('jumlah_obat');
            $table->timestamps();
        });

        Schema::table('obats', function ($table) {
            $table->foreign('jenis_obat')->references('id')->on('jenisobats')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('kategori')->references('id')->on('kategoriobats')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('obats', function(Blueprint $table)
          {
           $table->dropForeign('obats_jenis_obat_foreign');
           $table->dropForeign('obats_kategori_foreign');
          });

        Schema::dropIfExists('obats');
    }
}
