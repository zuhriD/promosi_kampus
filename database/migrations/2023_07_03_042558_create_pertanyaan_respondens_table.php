<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaan_respondens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_responden');
            $table->unsignedBigInteger('id_list');
            $table->string('type_jawaban');
            $table->decimal('nilai_jawaban');

            $table->foreign('id_responden')->references('id')->on('respondens')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_list')->references('id')->on('list_pertanyaans')->cascadeOnUpdate()->cascadeOnDelete();

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
        Schema::dropIfExists('pertanyaan_respondens');
    }
};
