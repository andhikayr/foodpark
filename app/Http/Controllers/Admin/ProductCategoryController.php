<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $categories = ProductCategory::all();
        confirmDelete('Hapus kategori produk', 'Yakin ingin menghapus kategori produk yang dipilih ? Kategori produk yang terhapus tidak dapat dikembalikan');
        return view('admin.product.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('admin.product.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:100|unique:product_categories,name',
        ]);

        ProductCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-', 'id'),
        ]);

        Alert::success('Sukses', 'Kategori produk baru telah ditambahkan');
        return to_route('admin.product-category.index');
    }

    public function updateStatus(Request $request) : RedirectResponse
    {
        $productCategory = ProductCategory::findOrFail($request->id);

        switch ($productCategory->status) {
            case 1:
                $productCategory->status = 0;
                break;
            case 0:
                $productCategory->status = 1;
                break;
            default:
                break;
        }

        $productCategory->save();

        switch ($productCategory->status) {
            case 1:
                Alert::success('Sukses', 'Status untuk kategori produk yang dipilih telah diaktifkan');
                break;
            case 0:
                Alert::success('Sukses', 'Status untuk kategori produk yang dipilih telah dinonaktifkan');
                break;
            default:
                break;
        }

        Alert::success('Sukses', 'Status untuk kategori produk yang dipilih telah diperbarui');
        return back();
    }


    public function updateShowAtHome(Request $request) : RedirectResponse
    {
        $productCategory = ProductCategory::findOrFail($request->id);

        switch ($productCategory->show_at_home) {
            case 1:
                $productCategory->show_at_home = 0;
                break;
            case 0:
                $productCategory->show_at_home = 1;
                break;
            default:
                break;
        }

        $productCategory->save();

        switch ($productCategory->show_at_home) {
            case 1:
                Alert::success('Sukses', 'Status untuk menampilkan kategori produk yang dipilih pada homepage telah diizinkan');
                break;
            case 0:
                Alert::success('Sukses', 'Status untuk menampilkan kategori produk yang dipilih pada homepage tidak diizinkan');
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
        $productCategory = ProductCategory::findOrFail($id);
        return view('admin.product.category.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) : RedirectResponse
    {
        $request->validate([
            'name' => "required|max:100|unique:product_categories,name,$id",
        ]);

        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-', 'id'),
        ]);

        Alert::success('Sukses', 'Kategori produk baru telah berhasil diubah');
        return to_route('admin.product-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : RedirectResponse
    {
        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->delete();

        Alert::success('Sukses', 'Kategori produk yang dipilih telah dihapus');
        return back();
    }
}
