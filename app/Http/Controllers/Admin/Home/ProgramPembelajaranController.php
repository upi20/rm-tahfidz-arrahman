<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\ProgramPembelajaran;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;

class ProgramPembelajaranController extends Controller
{
    private $validate_model = [
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'urutan' => ['required', 'integer'],
        'nama' => ['required', 'string'],
        'keterangan' => ['required', 'string'],
    ];

    private $image_folder = ProgramPembelajaran::image_folder;

    private $key = 'setting.home.program_pembelajaran';

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return ProgramPembelajaran::datatable($request);
        }
        $image_folder = $this->image_folder;
        $page_attr = [
            'title' => 'Program Pembelajaran',
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
        $view = path_view('pages.admin.home.program_pembelajaran');
        $data = compact('page_attr', 'image_folder', 'setting', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function insert(Request $request): mixed
    {
        try {
            $request->validate($this->validate_model);

            $model = new ProgramPembelajaran();
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

            ProgramPembelajaran::feClearCache();

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
            $model = ProgramPembelajaran::findOrFail($request->id);
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

            ProgramPembelajaran::feClearCache();

            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(ProgramPembelajaran $model): mixed
    {
        try {
            $model->delete();
            // delete foto
            if ($model->foto) {
                $path = public_path("$this->image_folder/$model->foto");
                delete_file($path);
            }

            ProgramPembelajaran::feClearCache();

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
        return ProgramPembelajaran::findOrFail($request->id);
    }

    public function setting(Request $request)
    {
        settings()->set("$this->key.visible", $request->visible != null)->save();
        return response()->json();
    }
}
