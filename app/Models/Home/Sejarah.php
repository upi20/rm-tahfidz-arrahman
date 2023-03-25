<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sejarah extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'keterangan',
        'tahun',
    ];
    protected $primaryKey = 'id';
    protected $table = 'home_sejarah';
    const tableName = 'home_sejarah';
}
