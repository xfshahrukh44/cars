<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location')->nullable();
            $table->string('condition')->nullable();
            $table->integer('make_id')->nullable();
            $table->integer('model_id')->nullable();
            $table->string('mileage')->nullable();
            $table->string('year')->nullable();
            $table->string('exterior_color')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('transmission')->nullable();
            $table->string('steering')->nullable();
            $table->string('drive')->nullable();
            $table->string('engine')->nullable();
            $table->decimal('sales_price', 8, 2);
            $table->text('seller_notes')->nullable();
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
        Schema::dropIfExists('cars');
    }
}
