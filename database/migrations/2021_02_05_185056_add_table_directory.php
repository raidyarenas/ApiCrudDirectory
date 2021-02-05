<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableDirectory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directories', function (Blueprint $table) {
            $table->id();
            $table->string("code")->nullable(true);
            $table->string("name")->nullable(true);
            $table->string("address")->nullable(true);
            $table->string("town")->nullable(true);
            $table->string("postal_code")->nullable(true);
            $table->string("city")->nullable(true);
            $table->string("phone")->nullable(true);
            $table->string("email")->nullable(true);
            $table->timestamps(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("directories");
    }
}
