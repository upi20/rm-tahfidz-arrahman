<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\TopGrade;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;

class TopGradeController extends Controller
{
    private $validate_model = [
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'urutan' => ['required', 'integer'],
        'nama' => ['required', 'string'],
        'keterangan' => ['required', 'string'],
    ];

    private $image_folder = TopGrade::image_folder;

    private $key = 'setting.home.top_grade';

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return TopGrade::datatable($request);
        }
        $image_folder = $this->image_folder;
        $page_attr = [
            'title' => 'Kelebihan Produk',
            'breadcrumbs' => [
                ['name' => 'Dashboard', 'url' => 'admin.dashboard'],
                ['name' => 'Halaman Utama'],
            ]
        ];
        $setting = (object)[
            'visible' => settings()->get("$this->key.visible"),
            'title' => settings()->get("$this->key.title"),
            'sub_title' => settings()->get("$this->key.sub_title"),
            'number' => settings()->get("$this->key.number")
        ];
        return view('admin.home.top_grade', compact('page_attr', 'image_folder', 'setting'));
    }

    public function insert(Request $request): mixed
    {
        try {
            $request->validate($this->validate_model);

            $model = new TopGrade();
            $foto = '';
            if ($image = $request->file('foto')) {
                $foto = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($this->image_folder), $foto);
            }

            $model->foto = $foto;
            $model->urutan = $request->urutan;
            $model->nama = $request->nama;
            $model->keterangan = $request->keterangan;
            $model->save();

            TopGrade::feClearCache();

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
            $model = TopGrade::findOrFail($request->id);
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
            $model->keterangan = $request->keterangan;
            $model->save();

            TopGrade::feClearCache();

            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(TopGrade $model): mixed
    {
        try {
            $model->delete();
            // delete foto
            if ($model->foto) {
                $path = public_path("$this->image_folder/$model->foto");
                delete_file($path);
            }

            TopGrade::feClearCache();

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
        return TopGrade::findOrFail($request->id);
    }

    public function setting(Request $request)
    {
        settings()->set("$this->key.visible", $request->visible != null)->save();
        settings()->set("$this->key.number", $request->number != null)->save();
        settings()->set("$this->key.title", $request->title)->save();
        settings()->set("$this->key.sub_title", $request->sub_title)->save();
        return response()->json();
    }
}
