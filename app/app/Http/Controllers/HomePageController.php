<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Inertia\Inertia;
use Inertia\Response;

class HomePageController extends Controller
{
    public function index(): Response {
        $products = Product::published()
            ->orderByDesc('updated_at')
            ->take(6)->get()->map(function ($product) {
            return [
                ...$product->toArray(),
                'slug' => $product->slug,
                'image_url' => $product->getImageUrl(),
            ];
        });
        return Inertia::render('Home', [
            'products' => $products,
        ]);
    }
}
