<?php namespace Atom\FaceRecognition\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateFacesTable extends Migration
{
    public function up()
    {
        Schema::create('atom_facerecognition_faces', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('atom_facerecognition_faces');
    }
}
