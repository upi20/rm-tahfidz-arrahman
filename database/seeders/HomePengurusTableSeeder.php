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
                'nama' => 'Hamad Bin Jasim',
                'sebagai' => 'Pendiri',
                'foto' => '20230326174550.jpg',
                'no_whatsapp' => '6285798132505',
                'no_telepon' => '+6285798132505',
                'facebook' => 'https://www.facebook.com/iseplutpinur7',
                'twitter' => NULL,
                'instagram' => 'https://instagram.com/iseplutpinur',
                'tampilkan' => 'Ya',
                'created_at' => '2023-03-26 17:41:37',
                'updated_at' => '2023-03-26 17:45:50',
            ),
            1 => 
            array (
                'id' => '2',
                'urutan' => '2',
                'nama' => 'Sayyida Al-Hijaazi',
                'sebagai' => 'Hafiz Quran Scholor',
                'foto' => '20230326174557.jpg',
                'no_whatsapp' => NULL,
                'no_telepon' => '+6285798132505',
                'facebook' => NULL,
                'twitter' => NULL,
                'instagram' => NULL,
                'tampilkan' => 'Tidak',
                'created_at' => '2023-03-26 17:44:37',
                'updated_at' => '2023-03-26 18:34:01',
            ),
            2 => 
            array (
                'id' => '3',
                'urutan' => '3',
                'nama' => 'Sayyida Al-Hijaazi',
                'sebagai' => 'Hafiz Quran Scholor',
                'foto' => '20230326175839.png',
                'no_whatsapp' => '+6285798132505',
                'no_telepon' => '+6285798132505',
                'facebook' => NULL,
                'twitter' => NULL,
                'instagram' => NULL,
                'tampilkan' => 'Ya',
                'created_at' => '2023-03-26 17:45:15',
                'updated_at' => '2023-03-26 17:58:39',
            ),
            3 => 
            array (
                'id' => '4',
                'urutan' => '4',
                'nama' => 'Dreams come true',
                'sebagai' => 'Hafiz Quran Scholor',
                'foto' => '20230326174648.jpg',
                'no_whatsapp' => '+6285798132505',
                'no_telepon' => NULL,
                'facebook' => NULL,
                'twitter' => NULL,
                'instagram' => NULL,
                'tampilkan' => 'Ya',
                'created_at' => '2023-03-26 17:46:48',
                'updated_at' => '2023-03-26 17:47:58',
            ),
            4 => 
            array (
                'id' => '5',
                'urutan' => '5',
                'nama' => 'Ayesha Binte Alif',
                'sebagai' => 'Hafiz Quran Scholor',
                'foto' => '20230326174716.jpg',
                'no_whatsapp' => NULL,
                'no_telepon' => NULL,
                'facebook' => 'https://instagram.com/iseplutpinur',
                'twitter' => NULL,
                'instagram' => NULL,
                'tampilkan' => 'Ya',
                'created_at' => '2023-03-26 17:47:16',
                'updated_at' => '2023-03-26 17:48:10',
            ),
        ));
        
        
    }
}