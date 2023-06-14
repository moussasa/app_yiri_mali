<?php

namespace App\Http\Controllers;

use App\Models\achat;
use App\Models\Categorie;
use App\Models\Commande;
use App\Models\Formation;
use App\Models\Maintenance;
use App\Models\User;
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
    public function achat()
    {
        $achat = achat::with(['user','produit'])->orderBy('id','desc')->paginate(5);
        return view('admin.achat', [
            'achat' => $achat,
        ]);
    }
    public function client()
    {
        $client = User::orderBy('id','desc')->paginate(5);
        return view('admin.client', [
            'client' => $client,
        ]);
    }
    public function formation()
    {
        $formation = Formation::orderBy('id','desc')->paginate(5);
        return view('admin.formation', [
            'formation' => $formation,
        ]);
    }
    public function maintenance()
    {
        $maintenance = Maintenance::orderBy('id','desc')->paginate(5);
        return view('admin.maintenance', [
            'maintenance' => $maintenance,
        ]);
    }
   
}
