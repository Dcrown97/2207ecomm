<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sold', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sales_id');
            $table->index('sales_id');
            $table->foreign('sales_id')->references('id')->on('sales');
            $table->string("product");
            $table->integer("quantity");
            $table->double("price");
            $table->unsignedBigInteger('size_id');
            $table->index('size_id');
            $table->foreign('size_id')->references('id')->on('sizes');
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
        Schema::dropIfExists('sold');
    }
}
