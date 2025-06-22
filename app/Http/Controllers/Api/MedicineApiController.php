<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineApiController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $medicines = Medicine::when($query, function ($q) use ($query) {
            $q->where('name', 'like', "%{$query}%");
        })->get();

        return response()->json($medicines);
    }
}
