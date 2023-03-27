<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HomePengurusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('home_pengurus')->delete();
        
        \DB::table('home_pengurus')->insert(array (
            0 => 
            array (
                'id' => '1',
                'urutan' => '1',
                'nama' => 'Dian Nopiandi,S.Sos.,M.Pd dan Puput Risnawati,S.Pd',
                'sebagai' => 'Pendiri',
                'foto' => '20230327080501.jpg',
                'no_whatsapp' => NULL,
                'no_telepon' => '081322608453',
                'facebook' => NULL,
                'twitter' => NULL,
                'instagram' => 'https://instagram.com/iseplutpinur',
                'tampilkan' => 'Ya',
                'created_at' => '2023-03-26 17:41:37',
                'updated_at' => '2023-03-27 08:05:01',
            ),
        ));
        
        
    }
}