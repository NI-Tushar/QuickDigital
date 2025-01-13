<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DigitalProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class DigitalProductController extends Controller
{
    public function index(Request $request)
    {
        $query = DigitalProduct::query();

        // Apply filters based on query parameters
        if ($request->filled('name')) {
            $query->where('title', 'like', '%' . $request->input('name') . '%');
        }

        $products = $query->latest()->paginate(10);
        return view('quick_digital.digital_product.digital_product', compact('products'))->with('request', $request);
    }


    public function suggestion(Request $request)
    {
        // Validate the request input to ensure a query is provided.
        $request->validate([
            'query' => 'required|string|min:1'
        ]);

        // Retrieve the query from the request.
        $query = $request->input('query');

        // Fetch unique client names that match the query.
        $product = DigitalProduct::where('title', 'LIKE', '%' . $query . '%')
            ->select('title')
            ->distinct()
            ->limit(10)
            ->get();

        // Return the unique client names as a JSON response.
        return response()->json($product);
    }
}
