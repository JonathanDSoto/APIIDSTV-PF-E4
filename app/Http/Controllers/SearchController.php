<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{

public function search(Request $request)
{
    $searchTerm = $request->input('searchTerm');

    $results = User::where('name', 'like', "%$searchTerm%")
                   ->orWhere('lastname', 'like', "%$searchTerm%")
                   ->get();

    return response()->json($results);
}
}
