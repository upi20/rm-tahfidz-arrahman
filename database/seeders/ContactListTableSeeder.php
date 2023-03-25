<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactListTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contact_list')->delete();
        
        \DB::table('contact_list')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Our Location',
                'icon' => 'fas fa-map-marker-alt',
                'url' => 'https://www.google.co.id/maps/place/Jl.+Sekar+Tongeret+No.14,+Turangga,+Kec.+Lengkong,+Kota+Bandung,+Jawa+Barat+40264/@-6.9371867,107.6219683,17z/data=!3m1!4b1!4m6!3m5!1s0x2e68e87d267b07cd:0x88e85caa3b70c6a1!8m2!3d-6.937192!4d107.624157!16s%2Fg%2F11h20h7r0b',
                'order' => 1,
                'keterangan' => 'Jl. Sekar Toneret No. 14, Turangga, Kec. Lengkong, Kota Bandung, Jawa Barat',
                'status' => 1,
                'created_at' => '2022-08-21 08:34:56',
                'updated_at' => '2023-03-14 18:16:01',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'Telepon',
                'icon' => 'fas fa-phone',
                'url' => 'tel:+6281322728628',
                'order' => 2,
                'keterangan' => '+6281322728628',
                'status' => 1,
                'created_at' => '2022-08-21 08:35:23',
                'updated_at' => '2022-11-12 03:26:57',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'Email',
                'icon' => 'fas fa-envelope',
                'url' => 'mailto:infogeb@greeneducationbdg.com',
                'order' => 3,
                'keterangan' => 'infogeb@greeneducationbdg.com',
                'status' => 1,
                'created_at' => '2022-08-21 08:35:47',
                'updated_at' => '2022-11-12 03:26:38',
            ),
        ));
        
        
    }
}