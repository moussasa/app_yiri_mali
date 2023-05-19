<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Produit;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    public function main()
    {
    

        $images = Image::paginate(5);
        $produit = Produit::with(['categorie','image'])->paginate(5);
        
        return view('admin.image', [
            'produit' => $produit,
            'images' => $images,
        ]);
    }
    
    public function add(Request $request)
    {
        // $request->validate([
        //     'files' => 'required',
        //     'files.*' => 'mimes:jpg,jpeg,png',
        // ]);

        if ($request->hasFile('files')) {

           $prd_id=$request->id_image_edit;
            if (count($request->file('files')) === 4) {
                foreach ($request->file('files') as $value) {
                    $filetostore = rand(1, 100000) . '_' . time() . '.' . $value->getClientOriginalExtension();
                    $value->storeAs('public/produit', $filetostore);

                    // ajout into dbb
                    $image = new Image();
                    $image->chemin = $filetostore;
                    $image->produit_id = $prd_id;
                    $image->save();
                }
                return redirect()->back()->with('success', 'Image Ajoutée avec succès');

            } else {
                return redirect()->back()->with('erreur', 'Veillez sélectionner 4 images. ni plus ni moins');
            }

        } else {
            return redirect()->back()->with('erreur', 'Veillez choisir des images de types: jpg,jpeg,png ');
        }

    }
    public function update(Request $request)
    {
        $image = Image::find($request->input('edit_cat_id'));
        // $exist = Image::where('nom_cate', $request->input('edit_cat_name'));

        // if ($exist->count() > 0) {
        //     return redirect()->back()->with('erreur', 'Cette Catégorie existe deja');
        // }

        $image->nom_cate = $request->input('edit_cat_name');
        $image->update();

        return redirect()->back()->with('success', 'Catégorie modifiée avec succès');
    }
    public function edit($id)
    {
        $image = Produit::find($id);
        return response()->json(array('image' => $image), 200);
    }
    public function delete_search($id)
    {
        $image = Image::find($id);
        return response()->json(array('image' => $image), 200);
    }
    public function delete(Request $request)
    {
        $image = Image::find($request->input('edit_cat_id_supr'));
        $image->delete();
        return redirect()->back()->with('success', 'Image supprimée avec succès');
    }
}
