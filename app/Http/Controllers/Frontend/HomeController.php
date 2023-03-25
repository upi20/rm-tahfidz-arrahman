<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Artikel\Artikel;
use App\Models\Contact\FAQ;
use App\Models\Home\Testimonial;
use App\Models\Home\TopGrade;
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
        $top_grades = TopGrade::getFeViewData();

        // artikel
        if ($this->checkVisible('artikel')) {
            $articles = Artikel::getHomeViewData();
        } else {
            $articles = [];
        }

        $faqs = FAQ::getFeViewData();

        $data = compact(
            'page_attr',
            'testimonials',
            'articles',
            'faqs',
            'produks',
            'top_grades',
        );
        $data['compact'] = $data;
        return view('frontend.home', $data);
    }

    private function checkVisible(string $item): ?bool
    {
        return settings()->get("setting.home.$item.visible", false);
    }
}
