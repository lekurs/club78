<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', '255')->unique()->nullable(false);
            $table->string('address', '255');
            $table->string('zip', '5');
            $table->string('city', '255');
            $table->string('instagram', '255');
            $table->string('facebook', '255');
            $table->string('website', '255');
            $table->text('description');
            $table->string('image', '255');
            $table->boolean('infrontof')->default(false);
            $table->timestamps();

//            DB::statement('ALTER TABLE shops CHANGE COLUMN zip zip INT(5) UNSIGNED ZEROFILL NULL ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
