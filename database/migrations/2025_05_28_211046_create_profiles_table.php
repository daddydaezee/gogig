<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('profiles', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('photo')->nullable();
        $table->string('phone')->nullable();
        $table->string('address')->nullable();
        $table->text('bio')->nullable();
        $table->string('social_ig')->nullable();
        $table->string('social_fb')->nullable();
        $table->string('social_x')->nullable();
        $table->string('social_email')->nullable();
        $table->string('social_phone')->nullable();
        $table->timestamps();
    });
}

};
