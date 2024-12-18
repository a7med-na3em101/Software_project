<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('client_contact_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('client')->onDelete('cascade');
            $table->string('phone_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('mailing_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_contact_details');
    }
};
