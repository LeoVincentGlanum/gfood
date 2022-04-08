<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('g_reservations', function (Blueprint $table) {
            $table->id();
            $table->string('demande_id');
            $table->string('user_id');
            $table->string('commande')->nullable();
            $table->string('state')->default('demande');
            $table->string('prix')->default(0);
            $table->string('tel')->nullable();
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
        Schema::dropIfExists('g_reservations');
    }
}
