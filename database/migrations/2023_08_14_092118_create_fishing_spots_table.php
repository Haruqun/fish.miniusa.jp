<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFishingSpotsTable extends Migration
{
    public function up()
    {
        Schema::create('fishing_spots', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url')->nullable();
            $table->string('image_url', 2048)->nullable();
            $table->string('area')->nullable();
            $table->string('type')->nullable();
            $table->text('fishing_methods')->nullable();
            $table->text('fish_species')->nullable();
            $table->string('best_season')->nullable();
            $table->string('facilities')->nullable();
            $table->string('related_links')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fishing_spots');
    }
}
