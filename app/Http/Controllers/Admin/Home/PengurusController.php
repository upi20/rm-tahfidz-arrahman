<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\Pengurus;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;

class PengurusController extends Controller
{
    private $validate_model = [
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'urutan' => ['required', 'integer'],
        'nama' => ['required', 'string'],
        'sebagai' => ['required', 'string'],
        'tampilkan' => ['required', 'string'],
        'no_whatsapp' => ['nullable', 'string'],
        'no_telepon' => ['nullable', 'string'],
        'facebook' => ['nullable', 'string'],
        'twitter' => ['nullable', 'string'],
        'instagram' => ['nullable', 'string'],
    ];

    private $image_folder = Pengurus::image_folder;

    private $key = 'setting.home.pengurus';
    private $folder_image = '/assets/setting/home';

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return Pengurus::datatable($request);
        }
        $image_folder = $this->image_folder;
        $page_attr = [
            'title' => 'Pengurus',
            'breadcrumbs' => [
                ['name' => 'Dashboard', 'url' => 'admin.dashboard'],
                ['name' => 'Halaman Utama'],
            ]
        ];
        $setting = (object)[
            'visible' => settings()->get("$this->key.visible"),
            'title' => settings()->get("$this->key.title"),
            'sub_title' => settings()->get("$this->key.sub_title"),
        ];
        $folder_image = $this->folder_image;
        return view('pages.admin.home.pengurus', compact('page_attr', 'image_folder', 'setting'));
    }

    public function insert(Request $request): mixed
    {
        try {
            $request->validate($this->validate_model);

            $model = new Pengurus();
            $foto = '';
            if ($image = $request->file('foto')) {
                $foto = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($this->image_folder), $foto);
            }

            $model->foto = $foto;
            $model->urutan = $request->urutan;
            $model->nama = $request->nama;
            $model->sebagai = $request->sebagai;
            $model->tampilkan = $request->tampilkan;
            $model->no_whatsapp = $request->no_whatsapp;
            $model->no_telepon = $request->no_telepon;
            $model->facebook = $request->facebook;
            $model->twitter = $request->twitter;
            $model->instagram = $request->instagram;
            $model->save();

            Pengurus::feClearCache();

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
            $model = Pengurus::findOrFail($request->id);
            $request->validate(array_merge(['id' => [
                'required', 'int',
            ]], $this->validate_model));

            // foto handle
            $foto = '';
            if ($image = $request->file('foto')) {
                $foto = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($this->image_folder), $foto);

                // delete foto
                if ($model->foto) {
                    $path = public_path("$this->image_folder/$model->foto");
                    delete_file($path);
                }
                // save foto
                $model->foto = $foto;
            }

            $model->urutan = $request->urutan;
            $model->nama = $request->nama;
            $model->sebagai = $request->sebagai;
            $model->tampilkan = $request->tampilkan;
            $model->no_whatsapp = $request->no_whatsapp;
            $model->no_telepon = $request->no_telepon;
            $model->facebook = $request->facebook;
            $model->twitter = $request->twitter;
            $model->instagram = $request->instagram;
            $model->save();

            Pengurus::feClearCache();

            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(Pengurus $model): mixed
    {
        try {
            $model->delete();
            // delete foto
            if ($model->foto) {
                $path = public_path("$this->image_folder/$model->foto");
                delete_file($path);
            }

            Pengurus::feClearCache();

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
        $pengurus = Pengurus::findOrFail($request->id);
        $pengurus->foto_link = $pengurus->fotoUrl();
        return $pengurus;
    }

    public function setting(Request $request)
    {
        settings()->set("$this->key.visible", $request->visible != null)->save();
        settings()->set("$this->key.title", $request->title)->save();
        settings()->set("$this->key.sub_title", $request->sub_title)->save();
        return response()->json();
    }
}
