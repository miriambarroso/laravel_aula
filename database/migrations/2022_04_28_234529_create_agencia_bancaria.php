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
        Schema::create('agencia_bancaria', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fone');
            $table->bigInteger('fone1');
            $table->integer('tipo');
            $table->integer('tipo1');
            $table->foreignIdFor(App\Models\Banco::class);
            $table->string('endereco');
            $table->string('agencia');
            $table->string('nome_agencia');
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('agencia_bancaria');
    }
};
