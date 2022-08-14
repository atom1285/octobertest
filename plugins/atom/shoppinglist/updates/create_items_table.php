<?php namespace Atom\ShoppingList\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('atom_shoppinglist_items', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->integer('quantity');
            $table->string('unit');
            $table->boolean('done')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('atom_shoppinglist_items');
    }
}
