<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();

            $table->integer('listing_id')->unsigned(false);
            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade');

            $table->string('name');
            $table->string('unit_number')->nullable();
            $table->integer('floor')->nullable();
            $table->decimal('area_m2', 8, 2)->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->decimal('price', 12, 2)->nullable();
            $table->decimal('min_price', 12, 2)->nullable();
            $table->enum('status', ['available', 'reserved', 'sold'])->default('available')->index();
            $table->text('description')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
