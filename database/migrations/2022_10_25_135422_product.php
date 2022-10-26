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
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('productno');
            $table->longText('title');
            $table->longText('affiliateurl');
            $table->longText('packageimage');
            $table->longText('samplevideo');
            $table->longText('tag');
            $table->longText('sampleimages');
            $table->longText('author');
            $table->longText('manufacturer');
            $table->longText('series');
            $table->longText('actress');
            $table->longText('releasedate');
            $table->longText('numberofreviews');
            $table->longText('averagereviewscore');
            $table->longText('numberofsales');
            $table->longText('numberoffavorites');
            $table->longText('hdprice');
            $table->longText('normalprice');
            $table->longText('scrapingimpressions');
            $table->longText('fulltext');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('flights');
    }
};
