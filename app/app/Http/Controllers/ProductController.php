<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    public function index(): Response
    {
        $products = Product::published()
            ->orderByDesc('updated_at')
            ->paginate(6)
            ->through(function ($product) {
                return [
                    ...$product->toArray(),
                    'slug' => $product->slug,
                    'image_url' => $product->getImageUrl(),
                ];
            });

        return Inertia::render('Products/Pagination', [
            'pagination' => $products,
        ]);
    }

    public function show(string $slug, ProductRepository $productRepository): Response {
        $product = $productRepository->published()->forSlug($slug)->firstOrFail();

        return Inertia::render('Products/Single', [
            'product' => [
                'id' => $product->id,
                'title' => $product->title,
                'description' => $product->description,
                'price' => $product->price,
                'slug' => $product->slug,
                'images' => $product->images('image', 'default', ['fm' => 'png']), // Adjust based on your image relationship
            ],
        ]);
    }
}
