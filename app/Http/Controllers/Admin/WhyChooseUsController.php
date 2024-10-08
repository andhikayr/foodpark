<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WhyChooseUsRequest;
use App\Models\SectionTitle;
use App\Models\WhyChooseUs;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class WhyChooseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $keys = ['why_choose_us_title', 'why_choose_us_sub_title', 'why_choose_us_description'];
        $title = SectionTitle::whereIn('key', $keys)->pluck('value', 'key')->toArray();
        $whyChooseUs = WhyChooseUs::all();
        confirmDelete('Hapus card (mengapa memilih kita)', 'Yakin ingin menghapus card (mengapa memilih kita) yang dipilih ? Card (mengapa memilih kita) yang terhapus tidak dapat dikembalikan');
        return view('admin.why-choose-us.index', compact('title', 'whyChooseUs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('admin.why-choose-us.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WhyChooseUsRequest $whyChooseUsRequest)
    {
        WhyChooseUs::create($whyChooseUsRequest->validated());
        Alert::success('Sukses', 'Card (mengapa memilih kita) baru berhasil ditambahkan');
        return to_route('admin.why-choose-us.index');
    }

    public function updateStatus(Request $request) : RedirectResponse
    {
        $whyChooseUs = WhyChooseUs::findOrFail($request->id);

        switch ($whyChooseUs->status) {
            case 1:
                $whyChooseUs->status = 0;
                break;
            case 0:
                $whyChooseUs->status = 1;
                break;
            default:
                break;
        }

        $whyChooseUs->save();

        switch ($whyChooseUs->status) {
            case 1:
                Alert::success('Sukses', 'Status untuk card (mengapa memilih kita) yang dipilih telah diaktifkan');
                break;
            case 0:
                Alert::success('Sukses', 'Status untuk card (mengapa memilih kita) yang dipilih telah dinonaktifkan');
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
    public function edit(string $id)
    {
        $whyChooseUs = WhyChooseUs::findOrFail($id);
        return view('admin.why-choose-us.edit', compact('whyChooseUs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WhyChooseUsRequest $whyChooseUsRequest, string $id)
    {
        $whyChooseUs = WhyChooseUs::findOrFail($id);
        $whyChooseUs->update($whyChooseUsRequest->validated());

        Alert::success('Sukses', 'Card (mengapa memilih kita) yang dipilih telah diperbarui');
        return to_route('admin.why-choose-us.index');
    }

    public function updateTitle(Request $request) : RedirectResponse
    {
        $request->validate([
            'title' => 'nullable|max:50',
            'sub_title' => 'nullable|max:150',
            'description' => 'nullable',
        ]);

        SectionTitle::updateOrCreate(
            ['key' => 'why_choose_us_title'],
            ['value' => $request->why_choose_us_title],
        );

        SectionTitle::updateOrCreate(
            ['key' => 'why_choose_us_sub_title'],
            ['value' => $request->why_choose_us_sub_title],
        );

        SectionTitle::updateOrCreate(
            ['key' => 'why_choose_us_description'],
            ['value' => $request->why_choose_us_description],
        );

        Alert::success('Sukses', 'Bagian judul (Mengapa Memilih Kita) telah berhasil diperbarui');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $whyChooseUs = WhyChooseUs::findOrFail($id);
        $whyChooseUs->delete();

        Alert::success('Sukses', 'Card (mengapa memilih kita) yang dipilih berhasil dihapus');
        return back();
    }
}
