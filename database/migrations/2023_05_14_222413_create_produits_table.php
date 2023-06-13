<?php

use App\Models\Produit;
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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom_prod');
            $table->integer('prix_prod');
            $table->boolean('stat_prod')->default(0);
            $table->boolean('etat_prod')->default(0);
            $table->text('desc_prod')->nullable();
            $table->timestamps();
        });
        Schema::table('images', function (Blueprint $table) {
            $table->foreignIdFor(Produit::class)->constrained()->cascadeOnDelete();
        });
        Schema::table('commandes', function (Blueprint $table) {
            $table->foreignIdFor(Produit::class)->constrained()->cascadeOnDelete();
        });
        Schema::table('achats', function (Blueprint $table) {
            $table->foreignIdFor(Produit::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
        Schema::table('images', function (Blueprint $table) {
            $table->dropForeignIdFor(Produit::class);
        });
        Schema::table('commandes', function (Blueprint $table) {
            $table->dropForeignIdFor(Produit::class);
        });
        Schema::table('achats', function (Blueprint $table) {
            $table->dropForeignIdFor(Produit::class);
        });
    }
};
