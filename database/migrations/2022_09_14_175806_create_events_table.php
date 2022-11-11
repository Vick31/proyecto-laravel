<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            
            $table->id();
            $table->string('title');
            $table->date('start');
            $table->date('end');
            $table->time('time');
            $table->string('color');
            $table->string('description');
            $table->foreignId('users_id')->constrained();
            // $table->foreignId('reports_id')->constrained();
            $table->foreignId('clients_id')->constrained();
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
        Schema::dropIfExists('events');
    }
}
