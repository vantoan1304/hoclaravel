<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddThenewToCategoiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categoies', function (Blueprint $table) {
            $table->string('name', 5000)->nullable()->default(null);
            $table->string('slug', 5000)->nullable()->default(null);
            $table->tinyInteger('status')->nullable()->default(0);
            $table->integer('weight')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categoies', function (Blueprint $table) {
            //
        });
    }
}
