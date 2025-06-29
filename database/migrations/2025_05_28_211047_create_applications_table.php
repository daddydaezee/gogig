<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('applications', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // performer
        $table->foreignId('event_id')->constrained()->onDelete('cascade');
        $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
        $table->text('message')->nullable();
        $table->timestamps();
    });
}

};
