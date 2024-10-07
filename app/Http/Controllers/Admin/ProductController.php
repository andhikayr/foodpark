<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $productCategories = ProductCategory::all();
        return view('admin.product.create', compact('productCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $productCreateRequest) : RedirectResponse
    {
        if ($productCreateRequest->hasFile('thumb_image')) {
            $image = $productCreateRequest->file('thumb_image');
            $imageName = 'product_image_' . date('YmdHis') . '.' . $image->extension();
            $image->move('admin/uploads/product_images', $imageName);
        }

        Product::create([
            'thumb_image' => $imageName,
            'name' => $productCreateRequest->name,
            'slug' => generateUniqueSlug('Product', $productCreateRequest->name),
            'category_id' => $productCreateRequest->category_id,
            'price' => $productCreateRequest->price,
            'offer_price' => $productCreateRequest->offer_price,
            'short_description' => $productCreateRequest->short_description,
            'description' => $productCreateRequest->description,
            'sku' => $productCreateRequest->sku,
            'seo_title' => $productCreateRequest->seo_title,
            'seo_description' => $productCreateRequest->seo_description,
        ]);

        Alert::success('Sukses', 'Produk baru berhasil ditambahkan');
        return to_route('admin.product.index');
    }

    public function updateStatus(Request $request) : RedirectResponse
    {
        $product = Product::findOrFail($request->id);

        switch ($product->status) {
            case 1:
                $product->status = 0;
                break;
            case 0:
                $product->status = 1;
                break;
            default:
                break;
        }

        $product->save();

        Alert::success('Sukses', 'Status untuk produk yang dipilih telah diperbarui');
        return back();
    }


    public function updateShowAtHome(Request $request) : RedirectResponse
    {
        $product = Product::findOrFail($request->id);

        switch ($product->show_at_home) {
            case 1:
                $product->show_at_home = 0;
                break;
            case 0:
                $product->show_at_home = 1;
                break;
            default:
                break;
        }

        $product->save();

        Alert::success('Sukses', 'Status untuk menampilkan produk yang dipilih pada homepage telah diperbarui');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
