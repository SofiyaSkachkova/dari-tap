<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        if (!$query) {
            return redirect()->back()->with('error', 'Введите запрос для поиска.');
        }

        // ВАЖНО: фильтрация по имени
        $medicines = Medicine::where('name', 'like', '%' . $query . '%')->get();

        return view('search.results', compact('query', 'medicines'));
    }
}
