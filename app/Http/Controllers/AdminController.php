<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
  
    public function logout()
    {
        Auth::logout();
        return redirect()->route('main');
    }
    public function commande()
    {
        $commande = Commande::with(['user','produit'])->orderBy('id','desc')->paginate(5);
        return view('admin.commande', [
            'commande' => $commande,
        ]);
    }
   
}
