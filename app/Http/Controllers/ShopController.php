<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * ⚠️ Contrôleur VOLONTAIREMENT VULNÉRABLE — projet pédagogique DevSecOps.
 * Ne jamais déployer ce code. Chaque faille est numérotée (VULN-xx) et
 * documentée dans le README, avec la correction attendue.
 */
class ShopController extends Controller
{
    public function index()
    {
        return view('shop.index', [
            'products' => Product::orderBy('name')->get(),
        ]);
    }

    public function search(Request $request)
    {
        $q = $request->query('q', '');

        // VULN-01 : injection SQL — l'entrée utilisateur est concaténée dans la requête.
        // Exemple d'exploitation : /search?q=' UNION SELECT id, email, password FROM users --
        $results = DB::select("SELECT id, name, price FROM products WHERE name LIKE '%" . $q . "%'");

        // VULN-02 : la valeur $q est réaffichée sans échappement dans la vue (XSS réfléchi).
        return view('shop.search', [
            'q' => $q,
            'results' => $results,
        ]);
    }

    public function download(Request $request)
    {
        $file = $request->query('file', 'catalogue.txt');

        // VULN-06 : path traversal — aucun contrôle sur le nom du fichier.
        // Exemple : /download?file=../../.env
        return response()->download(storage_path('app/public/' . $file));
    }
}
