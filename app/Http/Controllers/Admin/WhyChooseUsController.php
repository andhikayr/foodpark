<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SectionTitle;
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
        return view('admin.why-choose-us.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    public function updateTitle(Request $request) : RedirectResponse
    {
        $request->validate([
            'title' => 'nullable|max:100',
            'sub_title' => 'nullable|max:255',
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
        //
    }
}
