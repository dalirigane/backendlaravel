<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
        $categories=categorie::all();
        return response()->json($categories);
        } catch (\Exception $e) {
            return response()->json(" catégorie non disponibles");
        }
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $categorie=new Categorie([
                'nomcategorie'=>$request->input("nomcategorie"),
                'imagecategorie'=>$request->input("imagecategorie")
            ]);
            $categorie->save();
            return response()->json("catégorie enregistrée");

        }catch (\Exception $e) {
            return response()->json("probleme d'ajout de ");
        }
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $categorie=Categorie::findOrFail($id);
            return response()->json($categorie);
        }
        catch (\Exception $e) {
            return response()->json("affichage impossible");
        }
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $scategorie=Scategorie::findOrFail($id);
            $scategorie->update($request->all());
            return response()->json($scategorie);


        } catch (\Exception $e) {
            return response()->json("Modification impossible {$e->getMessage()}");
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        try {
            $categorie=Categorie::findOrFail($id);
            $categorie->delete();
            return response()->json("categorie suprimé avec succé");

        }
        catch (\Exception $e) {
            return response()->json("supression impossible");
        }
        //
    }
}
