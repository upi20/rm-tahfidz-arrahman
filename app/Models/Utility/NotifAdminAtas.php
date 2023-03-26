<?php

namespace App\Models\Utility;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class NotifAdminAtas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'deskripsi',
        'dari',
        'sampai',
        'link',
        'link_nama',
    ];
    protected $primaryKey = 'id';
    protected $table = 'notif_admin_atas';
    const tableName = 'notif_admin_atas';
    const image_folder = '/assets/utility/notif_admin_atas';
    const feCacheKey = 'feNotifAdminAtas';

    public static function getFeViewData()
    {
        return Cache::rememberForever(self::feCacheKey, function () {
            $now = date('Y-m-d');
            return static::whereRaw("(dari <= '$now') and (sampai >= '$now' or sampai is null )")->get();
        });
    }

    public static function feClearCache()
    {
        return Cache::pull(self::feCacheKey);
    }
}