<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductEditRequest;
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
        confirmDelete('Hapus produk', 'Yakin ingin menghapus produk yang dipilih ? Produk yang terhapus tidak dapat dikembalikan');
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

        switch ($product->status) {
            case 1:
                Alert::success('Sukses', 'Status untuk produk yang dipilih telah diaktifkan');
                break;
            case 0:
                Alert::success('Sukses', 'Status untuk produk yang dipilih telah dinonaktifkan');
                break;
            default:
                break;
        }

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

        switch ($product->show_at_home) {
            case 1:
                Alert::success('Sukses', 'Status untuk menampilkan produk yang dipilih pada homepage telah diizinkan');
                break;
            case 0:
                Alert::success('Sukses', 'Status untuk menampilkan produk yang dipilih pada homepage tidak diizinkan');
                break;
            default:
                break;
        }

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
    public function edit(string $id) : View
    {
        $product = Product::findOrFail($id);
        $productCategories = ProductCategory::all();
        return view('admin.product.edit', compact('product', 'productCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductEditRequest $productEditRequest, string $id) : RedirectResponse
    {
        $product = Product::findOrFail($id);

        if ($productEditRequest->hasFile('thumb_image')) {
            if ($product->thumb_image && file_exists("admin/uploads/product_images/$product->thumb_image")) {
                unlink("admin/uploads/product_images/$product->thumb_image");
            }
            $image = $productEditRequest->file('thumb_image');
            $imageName = 'product_image_' . date('YmdHis') . '.' . $image->extension();
            $image->move('admin/uploads/product_images', $imageName);
        }

        $product->update([
            'thumb_image' => $imageName,
            'name' => $productEditRequest->name,
            'slug' => generateUniqueSlug('Product', $productEditRequest->name),
            'category_id' => $productEditRequest->category_id,
            'price' => $productEditRequest->price,
            'offer_price' => $productEditRequest->offer_price,
            'short_description' => $productEditRequest->short_description,
            'description' => $productEditRequest->description,
            'sku' => $productEditRequest->sku,
            'seo_title' => $productEditRequest->seo_title,
            'seo_description' => $productEditRequest->seo_description,
        ]);

        Alert::success('Sukses', 'Produk telah berhasil diubah');
        return to_route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : RedirectResponse
    {
        $product = Product::findOrFail($id);

        if ($product->thumb_image && file_exists("admin/uploads/product_images/$product->thumb_image")) {
            unlink("admin/uploads/product_images/$product->thumb_image");
        }
        $product->delete();

        Alert::success('Sukses', 'Produk telah dihapus');
        return back();
    }
}
