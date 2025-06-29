<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('reviews', function (Blueprint $table) {
        $table->id();
        $table->foreignId('reviewer_id')->constrained('users');
        $table->foreignId('reviewee_id')->constrained('users');
        $table->tinyInteger('rating');
        $table->text('comment')->nullable();
        $table->timestamps();
    });
}

};
