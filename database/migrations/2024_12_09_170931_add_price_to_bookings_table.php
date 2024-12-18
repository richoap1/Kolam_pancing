<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name', 100);
            $table->string('email', 100);
            $table->date('date');
            $table->time('time');
            $table->string('duration', 50);
            $table->string('hourly_option', 50)->nullable();
            $table->decimal('price', 10, 2)->nullable(); // Make sure price can be saved, nullable during creation
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings'); // Drop the bookings table during rollback
    }
};
