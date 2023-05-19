<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_prod',
        'prix_prod',
        'stat_prod',
        'etat_prod',
        'desc_prod',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }
    public function image()
    {
        return $this->hasMany(Image::class);
    }

}
