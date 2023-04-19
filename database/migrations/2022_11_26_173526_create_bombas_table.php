<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bombas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 80);
            $table->string('endereco', 100)->unique();
            $table->string('contacto', 10)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->boolean('gas');
            $table->boolean('gol');
            $table->float('lat', "10");
            $table->float('lng', "10");
            $table->time('abertura')->nullable();
            $table->time('fechamento')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bombas');
    }
};
