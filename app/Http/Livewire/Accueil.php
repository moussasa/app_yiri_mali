<?php

namespace App\Http\Livewire;

use App\Models\Produit;
use Livewire\Component;
use Livewire\WithPagination;

class Accueil extends Component
{
    use WithPagination;
    public $search_n = "";

    public function render()
    {
        $produit = Produit::where('stat_prod', '=', 1)->where('nom_prod', 'like', '%' . $this->search_n . '%')
            ->whereHas('categorie', function ($query) {
                $query->where('nom_cate', 'like', '%' . $this->search_n . '%');
            })->paginate(10);

        return view('livewire.accueil', ['produit' => $produit]);
    }
}
