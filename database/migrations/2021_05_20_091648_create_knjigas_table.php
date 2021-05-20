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
        Schema::create('knjiga', function (Blueprint $table) {
            $table->id();
            $table->string('Naslov');
            $table->integer('BrojStrana');
            $table->integer('PismoId');
            $table->integer('JezikId');
            $table->integer('PovezId');
            $table->integer('FormatId');
            $table->integer('IzdavacId');
            $table->date('DatumIzdavanja');
            $table->string('ISBN');
            $table->integer('UkupnoPrimjeraka');
            $table->integer('IzdatoPrimjeraka');
            $table->integer('RezervisanoPrimjeraka');
            $table->text('Sadrzaj');
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
