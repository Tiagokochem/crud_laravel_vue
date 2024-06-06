<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevelopersTable extends Migration
{
    public function up()
    {
        Schema::create('developers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('level_id')->constrained('levels');
            $table->string('name');
            $table->char('gender', 1);
            $table->date('date_of_birth');
            $table->integer('age');
            $table->string('hobby');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('developers');
    }
}
