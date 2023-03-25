<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Helpers\Summernote;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $page_attr = [
            'title' => 'About Us',
            'breadcrumbs' => [
                ['name' => 'Setting Halaman'],
            ]
        ];

        $data = compact(
            'page_attr'
        );
        return view('admin.setting.about',  array_merge($data, ['compact' => $data]));
    }

    public function update(Request $request)
    {
        $detail = Summernote::update($request->about, '/assets/about', '');
        settings()->set('about.html', $detail->html)->save();
        settings()->set('about.judul', $request->judul)->save();
        return response()->json();
    }
}
