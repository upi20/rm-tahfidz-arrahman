<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SocialMediaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('social_media')->delete();
        
        \DB::table('social_media')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Facebook',
                'icon' => 'fab fa-facebook-f',
                'url' => 'https://www.facebook.com/wkgroastery',
                'order' => 1,
                'keterangan' => 'Facebook Utama',
                'status' => 1,
                'created_at' => '2022-04-18 06:56:15',
                'updated_at' => '2023-03-14 18:19:56',
            ),
            1 => 
            array (
                'id' => 3,
                'nama' => 'Whatsapp',
                'icon' => 'fab fa-whatsapp',
                'url' => 'https://api.whatsapp.com/send?phone=08997370999&amp;text=Halo kak...',
                'order' => 5,
                'keterangan' => 'Whatsapp Utama',
                'status' => 1,
                'created_at' => '2022-04-18 07:00:40',
                'updated_at' => '2023-03-14 18:23:22',
            ),
            2 => 
            array (
                'id' => 4,
                'nama' => 'Instagram',
                'icon' => 'fab fa-instagram',
                'url' => 'https://www.instagram.com/wkgroastery',
                'order' => 2,
                'keterangan' => 'Instagram Utama',
                'status' => 1,
                'created_at' => '2022-04-18 07:02:06',
                'updated_at' => '2023-03-14 18:48:48',
            ),
            3 => 
            array (
                'id' => 5,
                'nama' => 'Tiktok',
                'icon' => 'fab fa-tiktok',
                'url' => 'https://www.tiktok.com/@wkgroastery',
                'order' => 3,
                'keterangan' => 'Tiktok Utama',
                'status' => 1,
                'created_at' => '2023-03-14 18:22:26',
                'updated_at' => '2023-03-14 18:23:04',
            ),
        ));
        
        
    }
}