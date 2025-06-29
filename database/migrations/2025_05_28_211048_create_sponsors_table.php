<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('sponsors', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('type')->nullable();
        $table->string('logo')->nullable();
        $table->text('description')->nullable();
        $table->integer('amount')->nullable();
        $table->timestamps();
    });
}

};
