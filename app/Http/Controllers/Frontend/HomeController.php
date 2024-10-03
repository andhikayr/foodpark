<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SectionTitle;
use App\Models\Slider;
use App\Models\WhyChooseUs;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index() : View
    {
        $sliders = Slider::where('status', 1)->get();
        $sectionTitles = $this->getSectionTitles();
        $whyChooseUs = WhyChooseUs::where('status', 1)->get();
        return view('frontend.index', compact('sliders', 'sectionTitles', 'whyChooseUs'));
    }

    public function getSectionTitles() : Collection
    {
        $keys = ['why_choose_us_title', 'why_choose_us_sub_title', 'why_choose_us_description'];
        return SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
    }
}
