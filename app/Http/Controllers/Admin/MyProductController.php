<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProductRequest;

use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Category;
use App\ProductGallery;

use Illuminate\Support\Str;


class MyProductController extends Controller
{
    public function index()
    {
        $products = Product::with('galleries', 'category')
            ->where('users_id', Auth::user()->id)
            ->get();
        return view('pages.admin.product-store.index', [
            'products' => $products
        ]);
    }

    public function details(Request $request, $id)
    {
        $product = Product::with((['galleries', 'user', 'category']))->findOrFail($id);
        $categories = Category::all();

        return view('pages.admin.product-store.detail', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function uploadGallery(Request $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/product', 'public');

        ProductGallery::create($data);

        return redirect()->route('pages.admin.product-store.detail', $request->products_id);
    }

    public function deleteGallery(Request $request, $id)
    {
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.product-store.detail', $item->products_id);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product-store.create', [
            'categories' => $categories
        ]);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $product = Product::create($data);

        $gallery = [
            'products_id' => $product->id,
            'photos' => $request->file('photo')->store('assets/product', 'public')
        ];
        ProductGallery::create($gallery);

        return redirect()->route('admin.product-store.index');
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();

        $item = Product::findOrFail($id);

        $data['slug'] = Str::slug($request->name);

        $item->update($data);

        return redirect()->route('admin.product-store.index');
    }
}
