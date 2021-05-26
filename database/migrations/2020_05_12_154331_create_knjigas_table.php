<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnjigasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knjigas', function (Blueprint $table) {
            $table->id('Id');
            $table->string('Naslov');
            $table->integer('BrojStrana');
            $table->unsignedBigInteger('pismo_id');
            $table->unsignedBigInteger('jezik_id');
            $table->unsignedBigInteger('povez_id');
            $table->unsignedBigInteger('format_id');
            $table->unsignedBigInteger('izdavac_id');
            $table->date('DatumIzdavanja');
            $table->string('ISBN');
            $table->integer('UkupnoPrimjeraka');
            $table->integer('IzdatoPrimjeraka');
            $table->integer('RezervisanoPrimjeraka');
            $table->string('Sadrzaj',2048);
            $table->index('pismo_id');
            $table->index('jezik_id');
            $table->index('povez_id');
            $table->index('format_id');
            $table->index('izdavac_id');
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
        Schema::dropIfExists('knjigas');
    }
}
