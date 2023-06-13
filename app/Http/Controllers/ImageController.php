<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //
    public function main()
    {

        $images = Image::paginate(5);
        $produit = Produit::with(['categorie', 'image'])->orderBy('id', 'DESC')->paginate(5);

        return view('admin.image', [
            'produit' => $produit,
            'images' => $images,
        ]);
    }

    public function add(Request $request)
    {

        if ($request->hasFile('files')) {

            $prd_id = $request->id_image_edit;
            if (count($request->file('files')) === 4) {
               
                $exist = Image::where('produit_id', $request->input('id_image_edit'))->get();
                if (count($exist) > 0) {
                    return redirect()->back()->with('erreur', "Cet produit a des images");

                }

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

    public function edit($id)
    {
        $image = Produit::find($id);
        return response()->json(array('image' => $image), 200);
    }
    public function delete_search($id)
    {
        $image = Produit::find($id);
        return response()->json(array('image' => $image), 200);
    }
    public function delete(Request $request)
    {
        $image = Image::where('produit_id', $request->input('edit_prod_id_supr'))->get();

        if (count($image) == 4) {
            foreach ($image as $value) {

                Storage::delete('public/produit/' . $value->chemin);
                // delete into dbb
                Image::where([['produit_id', $request->input('edit_prod_id_supr')], ['chemin', $value->chemin]])->delete();

            }
            return redirect()->back()->with('success', 'Image Supprimer avec succès');

        } else {
            return redirect()->back()->with('erreur', 'Cet produit ne contient aucune image');
        }

    }
}
