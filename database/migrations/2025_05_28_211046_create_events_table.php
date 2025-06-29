<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('events', function (Blueprint $table) {
        $table->id();
        $table->foreignId('organizer_id')->constrained('users')->onDelete('cascade');
        $table->string('name');
        $table->string('location');
        $table->date('start_date');
        $table->date('end_date');
        $table->time('start_time');
        $table->time('end_time');
        $table->text('description');
        $table->string('poster')->nullable();
        $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
        $table->timestamps();
    });
}

};
