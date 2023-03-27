<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GaleriTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('galeri')->delete();
        
        \DB::table('galeri')->insert(array (
            0 => 
            array (
                'id' => '12',
                'nama' => 'Kegiatan Mengaji',
                'foto' => NULL,
                'foto_id_gdrive' => 'https://drive.google.com/file/d/1kTPNYwX5WPNBIdU3Vftzo_VBM7kTYjfR/view?usp=share_link',
                'id_gdrive' => 'https://drive.google.com/file/d/1kTPNYwX5WPNBIdU3Vftzo_VBM7kTYjfR/view?usp=share_link',
                'slug' => 'kegiatan-mengaji-',
                'tanggal' => '2023-03-27',
                'lokasi' => 'Kp. Tanjungmukti Desa Girimukti Kec. Pasirkuda Kab. Cianjur',
                'keterangan' => 'Rumah  Tahfizh Quran Ar-Rahman',
                'status' => '1',
                'created_at' => '2023-03-27 16:40:55',
                'updated_at' => '2023-03-27 16:45:16',
            ),
        ));
        
        
    }
}