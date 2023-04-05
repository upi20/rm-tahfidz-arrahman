<?php

namespace App\Http\Controllers\Admin\Produk;

use App\Http\Controllers\Controller;
use App\Models\Produk\Kategori as ProdukKategori;
use App\Models\Produk\Produk;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;

class KategoriController extends Controller
{
    private $validate_model = [
        'nama' => ['required', 'string'],
        'keterangan' => ['nullable', 'string'],
    ];

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return ProdukKategori::datatable($request);
        }
        $page_attr = [
            'title' => 'Kategori',
            'breadcrumbs' => [
                ['name' => 'Dashboard', 'url' => 'admin.dashboard'],
                ['name' => 'Produk'],
            ]
        ];
        return view('pages.admin.produk.kategori', compact('page_attr'));
    }

    public function insert(Request $request): mixed
    {
        try {
            $request->validate($this->validate_model);

            $model = new ProdukKategori();
            $model->keterangan = $request->keterangan;
            $model->nama = $request->nama;
            $model->save();
            Produk::clearCache();
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
            $model = ProdukKategori::findOrFail($request->id);
            $request->validate(array_merge(['id' => [
                'required', 'int',
            ]], $this->validate_model));
            $model->nama = $request->nama;
            $model->keterangan = $request->keterangan;
            $model->replicate();
            $model->save();
            Produk::clearCache();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(ProdukKategori $model): mixed
    {
        try {
            $model->delete();
            Produk::clearCache();
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
        return ProdukKategori::findOrFail($request->id);
    }
}
