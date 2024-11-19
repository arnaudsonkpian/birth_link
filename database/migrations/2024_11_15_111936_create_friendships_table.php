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
        Schema::create('friendships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Référence à l'utilisateur
            $table->foreignId('friend_id')->constrained('users')->onDelete('cascade'); // Référence à l'ami
            $table->enum('status', ['pending', 'accepted', 'declined', 'blocked'])->default('pending'); // Statut de l'amitié
            $table->timestamps(); 

            // Assurez-vous que la combinaison user_id et friend_id est unique
            $table->unique(['user_id', 'friend_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friendships');
    }
};
