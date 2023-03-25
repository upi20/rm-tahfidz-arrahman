<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HomeTestimonialsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('home_testimonials')->delete();
        
        \DB::table('home_testimonials')->insert(array (
            0 => 
            array (
                'id' => 1,
                'urutan' => 1,
                'nama' => 'Ludwig van Beethoven',
                'sebagai' => 'German composer',
                'foto' => '20230310112723.png',
                'testimoni' => 'Saya baru-baru ini mencoba kopi dari perkebunan kopi di gunung dan rasanya sangat berbeda dengan kopi yang biasa saya minum. Rasanya sangat kuat dan tajam dengan sedikit rasa manis alami. Ini benar-benar pengalaman yang menyenangkan dan saya sangat merekomendasikan untuk mencoba kopi gunung ini.',
                'tampilkan' => 'Ya',
                'created_at' => '2023-01-18 00:31:25',
                'updated_at' => '2023-03-10 11:27:23',
            ),
            1 => 
            array (
                'id' => 2,
                'urutan' => 3,
                'nama' => 'Johann Sebastian Bach',
                'sebagai' => 'German composer',
                'foto' => '20230310125413.jpeg',
                'testimoni' => 'Saya selalu mencari kopi dari perkebunan di gunung karena saya percaya bahwa kopi tersebut memiliki kualitas yang lebih baik dan terjaga. Rasanya sangat halus dan nikmat dengan sedikit rasa manis alami. Saya suka meminum kopi gunung di pagi hari untuk membantu saya memulai hari dengan baik.',
                'tampilkan' => 'Ya',
                'created_at' => '2023-01-18 00:32:00',
                'updated_at' => '2023-03-10 12:54:13',
            ),
            2 => 
            array (
                'id' => 3,
                'urutan' => 4,
                'nama' => 'Gertrude Stein',
                'sebagai' => 'American author',
                'foto' => '20230310113013.jpeg',
                'testimoni' => 'Saya telah mencoba kopi dari berbagai wilayah dan gunung, tetapi kopi gunung ini benar-benar menonjol. Rasanya kuat dan penuh karakter dengan sedikit rasa manis. Saya sangat merekomendasikan untuk mencoba kopi gunung ini kepada siapa saja yang mencari pengalaman kopi yang unik dan berkualitas.',
                'tampilkan' => 'Ya',
                'created_at' => '2023-01-18 00:32:18',
                'updated_at' => '2023-03-10 11:30:13',
            ),
            3 => 
            array (
                'id' => 4,
                'urutan' => 5,
                'nama' => 'Teddy Roosevelt',
                'sebagai' => '26th President of the USA',
                'foto' => '20230310113102.jpeg',
                'testimoni' => 'Saya suka meminum kopi gunung karena rasanya yang segar dan kaya. Rasanya sangat berbeda dengan kopi biasa dan memiliki aroma yang sangat kuat. Saya merasa bahwa kopi gunung ini sangat cocok untuk minum di pagi hari saat udara masih segar dan bersih.',
                'tampilkan' => 'Ya',
                'created_at' => '2023-01-18 00:32:41',
                'updated_at' => '2023-03-10 11:31:09',
            ),
            4 => 
            array (
                'id' => 5,
                'urutan' => 2,
                'nama' => 'David Lynch',
                'sebagai' => 'American filmmaker and actor',
                'foto' => '20230310112808.jpeg',
                'testimoni' => 'Saya suka minum kopi gunung karena rasanya yang kaya dan unik. Rasanya lebih kompleks daripada kopi biasa dan memiliki aroma yang sangat kuat. Saya juga merasa bahwa kopi gunung ini memberikan efek yang lebih kuat dan energi yang lebih tahan lama.',
                'tampilkan' => 'Ya',
                'created_at' => '2023-01-18 00:33:33',
                'updated_at' => '2023-03-10 11:28:08',
            ),
        ));
        
        
    }
}