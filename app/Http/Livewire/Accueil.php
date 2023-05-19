<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Accueil extends Component
{
    public $search_n="";
    public $search="";


    public function render()
    {
        
       return view('livewire.accueil');
    }
}
