<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\KataKata;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;

class KataKataController extends Controller
{
    private $validate_model = [
        'nama' => ['required', 'string'],
        'sebagai' => ['required', 'string'],
        'tampilkan' => ['required', 'string'],
        'kata_kata' => ['required', 'string'],
    ];

    private $key = 'setting.home.kata_kata';
    private $folder_image = '/assets/setting/home';

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return KataKata::datatable($request);
        }
        $page_attr = [
            'title' => 'Kata Kata',
            'breadcrumbs' => [
                ['name' => 'Dashboard', 'url' => 'admin.dashboard'],
                ['name' => 'Halaman Utama'],
            ]
        ];
        $setting = (object)[
            'visible' => settings()->get("$this->key.visible"),
            'title' => settings()->get("$this->key.title"),
            'sub_title' => settings()->get("$this->key.sub_title"),
            'image' => settings()->get("$this->key.image"),
        ];

        $view = path_view('pages.admin.home.kata_kata');
        $data = compact('page_attr', 'setting', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request): mixed
    {
        try {
            $request->validate($this->validate_model);

            $model = new KataKata();
            $model->nama = $request->nama;
            $model->sebagai = $request->sebagai;
            $model->tampilkan = $request->tampilkan;
            $model->kata_kata = $request->kata_kata;
            $model->save();

            KataKata::feClearCache();

            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function update(Request $request): mixed
    {
        try {
            $model = KataKata::findOrFail($request->id);
            $request->validate(array_merge(['id' => [
                'required', 'int',
            ]], $this->validate_model));

            $model->nama = $request->nama;
            $model->sebagai = $request->sebagai;
            $model->tampilkan = $request->tampilkan;
            $model->kata_kata = $request->kata_kata;
            $model->save();

            KataKata::feClearCache();

            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(KataKata $model): mixed
    {
        try {
            $model->delete();
            KataKata::feClearCache();

            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function find(Request $request)
    {
        return KataKata::findOrFail($request->id);
    }

    public function setting(Request $request)
    {
        settings()->set("$this->key.visible", $request->visible != null)->save();

        $key = 'image';
        $current = settings()->get("$this->key.$key");
        if ($image = $request->file($key)) {
            // delete foto
            $folder = $this->folder_image;
            if ($current) {
                $path = public_path("$folder/$current");
                delete_file($path);
            }

            $foto = "$folder/kata_kata." . $image->getClientOriginalExtension();
            $image->move(public_path($folder), $foto);
            $current = $foto;
            // save foto
            settings()->set("$this->key.$key", $foto)->save();
        }

        return response()->json(['foto' => $current]);
    }
}
