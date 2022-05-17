<?php

use App\Models\Banco;
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
            $table->integer('fone');
            $table->integer('fone1');
            $table->integer('tipo');
            $table->integer('tipo1');
            $table->foreignIdFor(Banco::class);
            $table->string('endereço');
            $table->string('agencia');
            $table->string('nome_agencia');
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
