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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('mayor_name');
            $table->string('city_hall_address');
            $table->string('phone')->default('');
            $table->string('mobile_phone')->default('');
            $table->string('email')->default('');
            $table->string('fax')->default('');
            $table->string('website')->default('');
            $table->string('ico');
            $table->string('boss');
            $table->string('people');
            $table->string('region');
            $table->string('area');
            $table->string('district');
            $table->string('appeared_at');
            $table->string('autonomous_region');
            $table->string('latitude')->default('');
            $table->string('longitude')->default('');
            $table->string('img_path');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dstricts');
    }
};
