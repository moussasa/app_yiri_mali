<?php

use App\Models\Categorie;
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('nom_cate');
            $table->timestamps();
        });
        Schema::table('produits',function(Blueprint $table){
            $table->foreignIdFor(Categorie::class)->constrained()->cascadeOnDelete();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        Schema::table('produits',function(Blueprint $table){
            $table->dropForeignIdFor(Categorie::class);
        });
    }
};
