<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Galeri extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama',
        'foto',
        'foto_id_gdrive',
        'id_gdrive',
        'slug',
        'tanggal',
        'lokasi',
        'keterangan',
        'status',
    ];
    protected $primaryKey = 'id';
    protected $table = 'galeri';
    const tableName = 'galeri';

    public static function get(Request $request, int $paginate = 6, ?string $params = null): object
    {
        $model = static::where('status', '=', 1)->select([DB::raw('*'), DB::raw("date_format(tanggal, '%d %M %Y') as tanggal_str")])
            ->orderBy('tanggal', 'desc');

        if ($request->search) {
            $model->whereRaw("(
                nama like '%$request->search%' or
                foto like '%$request->search%' or
                slug like '%$request->search%' or
                keterangan like '%$request->search%'
            )");
        }

        // model->item get access
        $model = $model->paginate($paginate)
            ->appends(request()->query());
        return $model;
    }

    public static function getParams(Request $request): string
    {
        $filters = (object)[
            'search' => $request->search,
        ];

        // filter to url
        $params = "";
        foreach ($filters as $key => $filter) {
            $params .= $params ? ($filter ? "&" : '') : '';
            $params .= $filter ? "$key=$filter" : '';
        }

        return $params;
    }
}
