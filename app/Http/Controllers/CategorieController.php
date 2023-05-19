<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //
    public function main()
    {
        $categorie = Categorie::paginate(5);
        return view('admin.categorie', [
            'categorie' => $categorie,
        ]);
    }
    public function add(Request $request)
    {
        $request->validate([
            'nom_cate' => 'required|min:1',
        ]);
        $categorie = new Categorie();
        $categorie->nom_cate = $request->input('nom_cate');
        $categorie->save();

        return redirect()->back()->with('success', 'Catégorie Ajoutée avec succès');
    }
    public function update(Request $request)
    {
        $categories = Categorie::find($request->input('edit_cat_id'));
        $exist = Categorie::where('nom_cate', $request->input('edit_cat_name'));
        
        if ($exist->count() > 0) {
            return redirect()->back()->with('erreur', 'Cette Catégorie existe deja');
        }

        $categories->nom_cate = $request->input('edit_cat_name');
        $categories->update();

        return redirect()->back()->with('success', 'Catégorie modifiée avec succès');
    }
    public function edit($id)
    {
        $categories = Categorie::find($id);
        return response()->json(array('categories' => $categories), 200);
    }
    public function delete_search($id)
    {
        $categories = Categorie::find($id);
        return response()->json(array('categories' => $categories), 200);
    }
    public function delete(Request $request)
    {
        $categories = Categorie::find($request->input('edit_cat_id_supr'));
        $categories->delete();
        return redirect()->back()->with('success', 'Catégorie supprimée avec succès');
    }

}
