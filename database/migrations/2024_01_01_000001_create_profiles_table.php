<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('full_name');
            $table->string('title'); // e.g., "Full-Stack Developer"
            $table->string('tagline')->nullable(); // Short catchy phrase
            $table->text('bio'); // About me
            $table->text('short_bio')->nullable(); // For hero section
            $table->string('profile_image')->nullable();
            $table->string('cv_file')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->json('social_links')->nullable(); // GitHub, LinkedIn, etc.
            $table->integer('years_experience')->default(0);
            $table->integer('projects_completed')->default(0);
            $table->integer('happy_clients')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
