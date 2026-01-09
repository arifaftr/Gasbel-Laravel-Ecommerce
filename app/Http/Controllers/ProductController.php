<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $product->load('category');
        return view('product', compact('product'));
    }

    /**
     * Filter products based on query parameters
     */
    public function filter(Request $request)
    {
        $query = Product::with('category');

        // Filter by categories
        if ($request->has('categories') && !empty($request->categories)) {
            $categories = $request->categories;
            $query->whereHas('category', function ($q) use ($categories) {
                $q->whereIn('id', $categories);
            });
        }

        // Filter by price range
        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Filter by rating
        if ($request->has('rating') && !empty($request->rating)) {
            $rating = $request->rating;
            // This assumes there's a rating column, you might need to adjust based on your schema
            // For now, we'll just filter by a basic rating threshold
            $query->where('rating', '>=', $rating);
        }

        // Sort options
        $sort = $request->get('sort', 'popular');
        
        switch ($sort) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'rating':
                $query->orderBy('rating', 'desc');
                break;
            case 'popular':
            default:
                $query->orderBy('id', 'desc');
                break;
        }

        $products = $query->paginate(12);

        // If it's an AJAX request, return JSON
        if ($request->ajax()) {
            return response()->json([
                'html' => view('components.product-grid', compact('products'))->render(),
                'count' => $products->total()
            ]);
        }

        return view('shop', compact('products'));
    }
}
