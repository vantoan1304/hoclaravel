<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentIdToCategoies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categoies', function (Blueprint $table) {
            if(!schema::hasColumn('categoies', 'parent_id')){
                $table->unsignedBigInteger('parent_id')->nullable();
                $table->foreign('parent_id')->references('id')->on('categoies');
            }

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
            if(schema::hasColumn('categoies', 'parent_id')){
                $table->dropColumn('parent_id');
            }

        });
    }
}
