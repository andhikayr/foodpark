<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderCreateRequest;
use App\Http\Requests\SliderEditRequest;
use App\Models\Slider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $sliders = Slider::all();
        confirmDelete('Hapus produk (slider)', 'Yakin ingin menghapus produk (slider) yang dipilih ? Produk (slider) yang terhapus tidak dapat dikembalikan');
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderCreateRequest $sliderCreateRequest)
    {
        if ($sliderCreateRequest->hasFile('image')) {
            $image = $sliderCreateRequest->file('image');
            $imageName = 'slider_image_' . date('YmdHis') . '.' . $image->extension();
            $image->move('admin/uploads/slider_images', $imageName);
        }

        Slider::create([
            'title' => $sliderCreateRequest->title,
            'sub_title' => $sliderCreateRequest->sub_title,
            'description' => $sliderCreateRequest->description,
            'image' => $imageName,
            'offer' => $sliderCreateRequest->offer,
            'button_link' => $sliderCreateRequest->button_link,
        ]);

        Alert::success('Sukses', 'Produk (slider) baru berhasil ditambahkan');
        return to_route('admin.slider.index');
    }

    public function updateStatus(Request $request) : RedirectResponse
    {
        $slider = Slider::findOrFail($request->id);

        switch ($slider->status) {
            case 1:
                $slider->status = 0;
                break;
            case 0:
                $slider->status = 1;
                break;
            default:
                break;
        }

        $slider->save();

        Alert::success('Sukses', 'Status untuk produk yang dipilih telah diperbarui');
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
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderEditRequest $sliderEditRequest, string $id)
    {
        $slider = Slider::findOrFail($id);
        if ($sliderEditRequest->hasFile('image')) {
            if ($slider->image && file_exists("admin/uploads/slider_images/$slider->image")) {
                unlink("admin/uploads/slider_images/$slider->image");
            }
            $image = $sliderEditRequest->file('image');
            $imageName = 'slider_image_' . date('YmdHis') . '.' . $image->extension();
            $image->move('admin/uploads/slider_images', $imageName);
            $slider->image = $imageName;
        }

        $slider->update([
            'title' => $sliderEditRequest->title,
            'sub_title' => $sliderEditRequest->sub_title,
            'description' => $sliderEditRequest->description,
            'offer' => $sliderEditRequest->offer,
            'button_link' => $sliderEditRequest->button_link,
        ]);

        Alert::success('Sukses', 'Produk (slider) telah berhasil diubah');
        return to_route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);
        if ($slider->image && file_exists("admin/uploads/slider_images/$slider->image")) {
            unlink("admin/uploads/slider_images/$slider->image");
        }
        $slider->delete();
        Alert::success('Sukses', 'Produk (slider) yang anda pilih berhasil di hapus');
        return back();
    }
}
