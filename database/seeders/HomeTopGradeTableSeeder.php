<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HomeProgramPembelajaranTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('home_program_pembelajaran')->delete();
    }
}