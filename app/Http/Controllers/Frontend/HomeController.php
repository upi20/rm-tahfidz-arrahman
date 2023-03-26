<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Artikel\Artikel;
use App\Models\Contact\FAQ;
use App\Models\Galeri;
use App\Models\Home\Testimonial;
use App\Models\Home\ProgramPembelajaran;
use App\Models\Produk\Produk;
use App\Models\Tracker;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        Tracker::hit();

        $page_attr = [
            'navigation' => 'home',
        ];

        $testimonials = Testimonial::getFeViewData();
        $produks = Produk::getFeHomeData();
        $program_pembelajarans = ProgramPembelajaran::getFeViewData();

        if ($this->checkVisible('artikel')) {
            $articles = Artikel::getHomeViewData();
        } else {
            $articles = [];
        }

        // galeri
        if ($this->checkVisible('galeri')) {
            $galeries = Galeri::getHomeViewData();
        } else {
            $galeries = [];
        }

        $faqs = FAQ::getFeViewData();

        $data = compact(
            'page_attr',
            'articles',
            'galeries',
            'program_pembelajarans',
            'faqs',
        );
        $data['compact'] = $data;
        return view('frontend.home', $data);
    }

    private function checkVisible(string $item): ?bool
    {
        return settings()->get("setting.home.$item.visible", false);
    }

    public function fronted2(Request $request)
    {
        return view('templates.frontend.master');
    }
}
