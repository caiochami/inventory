<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();

            $table->string('postal_code', 30)->nullable();

            $table->string('address_line_1')->nullable();

            $table->string('address_line_2')->nullable();

            $table->string('city');

            $table->string('state');

            $table->string('state_abbr', 2)->nullable();

            $table->string('country', 150);

            $table->string('country_abbr', 5)->nullable();

            $table->string('latitude')->nullable();

            $table->string('longitude')->nullable();

            $table->text('comment')->nullable();

            $table->morphs('addressable', 'addressable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
