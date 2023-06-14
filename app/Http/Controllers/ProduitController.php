<?php

namespace App\Http\Controllers;

use App\Models\achat;
use App\Models\Categorie;
use App\Models\Commande;
use App\Models\Formation;
use App\Models\Image;
use App\Models\Maintenance;
use App\Models\Produit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;

class ProduitController extends Controller
{

    public function show($produit)
    {
        $produit = Produit::find($produit);
        $image = Image::where('produit_id', '=', $produit->id)->get();
        $image_first = Image::where('produit_id', '=', $produit->id)->first();

        return view('interfaces.credit', compact('produit', 'image_first', 'image'));
    }
    public function show_payer($produit)
    {
        $produit = Produit::find($produit);
        $image = Image::where('produit_id', '=', $produit->id)->get();
        $image_first = Image::where('produit_id', '=', $produit->id)->first();

        return view('interfaces.payer', compact('produit', 'image_first', 'image'));
    }
    public function form($produit)
    {
        $produit = Produit::find($produit);

        // le nombre de mois a payer le montant
        if ($produit->prix_prod <= 100000) {
            $mois = 4;
        } elseif ($produit->prix_prod > 100000 && $produit->prix_prod <= 200000) {
            $mois = 5;

        } elseif ($produit->prix_prod > 200000 && $produit->prix_prod <= 500000) {
            $mois = 7;
        } else {
            $mois = 1;
        }

        // le montant mensuell a payer
        $mensuel = $produit->prix_prod / $mois;

        // le rendez vous

        if (date('l') == 'Mondar' || date('l') == 'Tuesday') {
            $rdv = 'Vendredi';
        } else {
            $rdv = 'Lundi';
        }

        return view('interfaces.form', compact('produit', 'mensuel', 'mois', 'rdv'));
    }
    public function form_payer($produit)
    {
        $produit = Produit::find($produit);

        // le nombre de mois a payer le montant
        if ($produit->prix_prod <= 100000) {
            $mois = 4;
        } elseif ($produit->prix_prod > 100000 && $produit->prix_prod <= 200000) {
            $mois = 5;

        } elseif ($produit->prix_prod > 200000 && $produit->prix_prod <= 500000) {
            $mois = 7;
        } else {
            $mois = 8;
        }

        // le montant mensuell a payer
        $mensuel = $produit->prix_prod / $mois;

        // le rendez vous

        if (date('l') == 'Mondar' || date('l') == 'Tuesday') {
            $rdv = 'Vendredi';
        } else {
            $rdv = 'Lundi';
        }

        return view('interfaces.form_payer', compact('produit', 'mensuel', 'mois', 'rdv'));
    }
    public function form_commande(Request $request)
    {
        $cmd = new Commande();
        $cmd->produit_id = $request->input('prd_id');
        $cmd->user_id = $request->input('user_id');
        $cmd->mois_comm = $request->input('mois');
        $cmd->nom_bank_comm = $request->input('nom_bank');
        $cmd->num_bank_comm = $request->input('num_bank');
        $cmd->rdv_comm = $request->input('rdv');

        $cmd->save();
        if ($cmd) {
            return redirect()->back()->with('success', 'Commande effectuée avec succès. Nous allons vous contacter très bientôt.');
        }

        // return view('interfaces.form', compact('produit'));
    }

    // payer avec stripe
    public function form_payer_post(Request $request)
    {

        $produit = Produit::find($request->input('prd_id'));
        $prix = $produit->prix_prod;

        Stripe::setApiKey('sk_test_51Mf73PHhvvyAd0XVCMGJC9cubYqPILLO2vLplB6HzjcRDbttB7BW8qXKIQo8Qje9qhEsIopLYJdFHOlOfoGVzB6A00HkauY8jQ');

        try {

            $charge = Charge::create([
                "amount" => $prix,
                "currency" => "xof",
                "source" => $request->input('stripeToken'), // obtainded with Stripe.js
                "description" => 'Paiement du produit id:' . $produit->id . ' ' . $produit->nom_prod . ' sur Yiri-Mali',
            ]);

            if ($charge) {
                $cmd = new achat();
                $cmd->produit_id = $produit->id;
                $cmd->user_id = Auth::user()->id;
                $cmd->save();
            }

        } catch (Exception $e) {
            Session::put('erreur', $e);

            return redirect()->back();
        }

        Session::put('success', 'Paiement effectué avec succès');
        return redirect()->back();
    }

    public function accueil()
    {
        return view('interfaces.accueil');
    }
    public function main()
    {
        $produit = Produit::with('categorie')->orderBy('id', 'desc')->paginate(5);
        $categorie = Categorie::all();
        return view('admin.produit', [
            'produit' => $produit,
            'categorie' => $categorie,
        ]);
    }
    public function add(Request $request)
    {
        $request->validate([
            'nom_prod' => 'required|min:1',
            'prix_prod' => 'required|min:1',
        ]);

        $exist = Produit::where('nom_prod', $request->input('nom_prod'))->get();

        if ($exist->count() > 0) {
            return redirect()->back()->with('erreur', 'Ce produit existe deja');
        }

        $produit = new Produit();
        $produit->nom_prod = $request->input('nom_prod');
        $produit->prix_prod = $request->input('prix_prod');
        $produit->stat_prod = $request->input('stat_prod');
        $produit->etat_prod = $request->input('etat_prod');
        $produit->categorie_id = $request->input('categorie_id');
        $produit->desc_prod = $request->input('desc_prod');

        $produit->save();

        return redirect()->back()->with('success', 'Produit Ajouté avec succès');
    }
    public function update(Request $request)
    {
        $produit = Produit::find($request->input('id_prod_edit'));
        // $exist = Produit::where('nom_prod', $request->input('nom_prod_edit'));

        // if ($exist->count() > 0) {
        //     return redirect()->back()->with('erreur', 'Ce produit existe deja');
        // }

        $produit->nom_prod = $request->input('nom_prod_edit');
        $produit->prix_prod = $request->input('prix_prod_edit');
        $produit->stat_prod = $request->input('stat_prod_edit');
        $produit->etat_prod = $request->input('etat_prod_edit');
        $produit->categorie_id = $request->input('categorie_id_edit');
        $produit->desc_prod = $request->input('desc_prod_edit');
        $produit->save();

        return redirect()->back()->with('success', 'Produit modifié avec succès');
    }
    public function edit($id)
    {
        $produit = Produit::find($id);
        return response()->json(array('produit' => $produit), 200);
    }
    public function delete_search($id)
    {
        $produit = Produit::find($id);
        return response()->json(array('produit' => $produit), 200);
    }
    public function delete(Request $request)
    {
        $produit = Produit::find($request->input('edit_prod_id_supr'));
        $produit->delete();
        return redirect()->back()->with('success', 'Produit supprimée avec succès');
    }

    public function formation()
    {
        return view('interfaces.formation');
    }
    public function send_formation(Request $request)
    {
        $new = Formation::create([
            'nom' => $request->input('nom'),
            'adresse' => $request->input('adresse'),
            'formation' => $request->input('formation'),
            'duree' => $request->input('duree'),
            'phone' => $request->input('numero'),
        ]);
        if ($new) {
            return redirect()->back()->with('success', 'Envoyer avec succès nous allons vous contactez très bientot');
        }
        return redirect()->back()->with('erreur', 'Erreur Veillez nous contacter');
    }
    public function maintenace()
    {
        return view('interfaces.maintenace');
    }

    public function send_maintenance(Request $request)
    {
        $new = Maintenance::create([
            'nom' => $request->input('nom'),
            'adresse' => $request->input('adresse'),
            'phone' => $request->input('phone'),
            'marque' => $request->input('marque'),
            'carracteristique' => $request->input('carracteristique'),
            'panne' => $request->input('panne'),
            'etat' => $request->input('etat'),
        ]);
        if ($new) {
            return redirect()->back()->with('success', 'Envoyer avec succès nous allons vous contactez très bientot');
        }
        return redirect()->back()->with('erreur', 'Erreur Veillez nous contacter');
    }
}
