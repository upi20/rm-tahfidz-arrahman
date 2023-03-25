<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HomeTopGradeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('home_top_grade')->delete();
        
        \DB::table('home_top_grade')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Americano Grade',
                'foto' => '20230324213339.jpg',
                'keterangan' => 'Curabitur semper erat a lacusey consequat, sit amet quam',
                'urutan' => 1,
                'created_at' => '2023-03-24 21:33:39',
                'updated_at' => '2023-03-24 21:33:39',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'arebica Green',
                'foto' => '20230324213455.jpg',
                'keterangan' => 'Curabitur semper erat a lacusey
consequat, sit amet quam',
                'urutan' => 2,
                'created_at' => '2023-03-24 21:34:55',
                'updated_at' => '2023-03-24 21:34:55',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'Mixed Rosted',
                'foto' => '20230324213533.jpg',
                'keterangan' => 'Curabitur semper erat a lacusey
consequat, sit amet quam',
                'urutan' => 3,
                'created_at' => '2023-03-24 21:35:33',
                'updated_at' => '2023-03-24 21:35:33',
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'Robasta Rosted',
                'foto' => '20230324213608.jpg',
                'keterangan' => 'Curabitur semper erat a lacusey
consequat, sit amet quam',
                'urutan' => 4,
                'created_at' => '2023-03-24 21:36:08',
                'updated_at' => '2023-03-24 21:36:08',
            ),
        ));
        
        
    }
}