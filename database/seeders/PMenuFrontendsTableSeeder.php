<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PMenuFrontendsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('p_menu_frontends')->delete();
        
        \DB::table('p_menu_frontends')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => NULL,
                'title' => 'Home',
                'icon' => NULL,
                'route' => '__base_url__',
                'sequence' => 1,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-20 14:26:10',
                'updated_at' => '2022-08-20 14:30:13',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => NULL,
                'title' => 'About Us',
                'icon' => NULL,
                'route' => 'about',
                'sequence' => 2,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-20 14:30:39',
                'updated_at' => '2023-03-24 14:26:20',
            ),
            2 => 
            array (
                'id' => 18,
                'parent_id' => NULL,
                'title' => 'Kontak',
                'icon' => NULL,
                'route' => 'kontak',
                'sequence' => 6,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-08-20 14:47:10',
                'updated_at' => '2023-03-14 17:39:43',
            ),
            3 => 
            array (
                'id' => 20,
                'parent_id' => NULL,
                'title' => 'Blog',
                'icon' => NULL,
                'route' => 'artikel',
                'sequence' => 5,
                'active' => 1,
                'type' => 1,
                'created_at' => '2022-09-02 00:45:45',
                'updated_at' => '2023-03-14 17:39:43',
            ),
            4 => 
            array (
                'id' => 22,
                'parent_id' => NULL,
                'title' => 'Katalog',
                'icon' => NULL,
                'route' => 'katalog',
                'sequence' => 3,
                'active' => 1,
                'type' => 1,
                'created_at' => '2023-01-27 22:18:36',
                'updated_at' => '2023-03-20 12:38:47',
            ),
            5 => 
            array (
                'id' => 27,
                'parent_id' => NULL,
                'title' => 'FAQ',
                'icon' => NULL,
                'route' => 'kontak.faq',
                'sequence' => 7,
                'active' => 0,
                'type' => 1,
                'created_at' => '2023-03-10 21:07:26',
                'updated_at' => '2023-03-14 17:39:43',
            ),
            6 => 
            array (
                'id' => 28,
                'parent_id' => NULL,
                'title' => 'Marketplace',
                'icon' => NULL,
                'route' => 'marketplace',
                'sequence' => 4,
                'active' => 1,
                'type' => 1,
                'created_at' => '2023-03-14 17:39:30',
                'updated_at' => '2023-03-24 16:44:33',
            ),
        ));
        
        
    }
}