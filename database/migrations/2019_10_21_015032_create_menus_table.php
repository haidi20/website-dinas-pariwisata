<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            // color = menentukan warna background menu 
            $table->string('color')->nullable();
            $table->integer('parent_id')->default(0)->unsigned();
            // position = menu / submenu
            $table->string('position');
            // order = urutan menu dari sebelah kiri
            $table->integer('order');
            // status = dynamic atau static
            $table->string('status');
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
        Schema::dropIfExists('Menus');
    }
}
