<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PRoleHasMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('p_role_has_menu')->delete();
        
        \DB::table('p_role_has_menu')->insert(array (
            0 => 
            array (
                'id' => 26,
                'role_id' => 1,
                'menu_id' => 405,
                'created_at' => '2023-01-15 14:52:15',
                'updated_at' => '2023-01-15 14:52:15',
            ),
            1 => 
            array (
                'id' => 27,
                'role_id' => 1,
                'menu_id' => 406,
                'created_at' => '2023-01-15 14:52:44',
                'updated_at' => '2023-01-15 14:52:44',
            ),
            2 => 
            array (
                'id' => 28,
                'role_id' => 1,
                'menu_id' => 361,
                'created_at' => '2023-01-15 14:52:49',
                'updated_at' => '2023-01-15 14:52:49',
            ),
            3 => 
            array (
                'id' => 47,
                'role_id' => 1,
                'menu_id' => 367,
                'created_at' => '2023-01-17 21:46:02',
                'updated_at' => '2023-01-17 21:46:02',
            ),
            4 => 
            array (
                'id' => 48,
                'role_id' => 1,
                'menu_id' => 368,
                'created_at' => '2023-01-17 21:46:07',
                'updated_at' => '2023-01-17 21:46:07',
            ),
            5 => 
            array (
                'id' => 49,
                'role_id' => 1,
                'menu_id' => 369,
                'created_at' => '2023-01-17 21:46:13',
                'updated_at' => '2023-01-17 21:46:13',
            ),
            6 => 
            array (
                'id' => 50,
                'role_id' => 1,
                'menu_id' => 386,
                'created_at' => '2023-01-17 21:46:58',
                'updated_at' => '2023-01-17 21:46:58',
            ),
            7 => 
            array (
                'id' => 51,
                'role_id' => 9,
                'menu_id' => 386,
                'created_at' => '2023-01-17 21:46:58',
                'updated_at' => '2023-01-17 21:46:58',
            ),
            8 => 
            array (
                'id' => 59,
                'role_id' => 1,
                'menu_id' => 373,
                'created_at' => '2023-01-22 17:11:43',
                'updated_at' => '2023-01-22 17:11:43',
            ),
            9 => 
            array (
                'id' => 60,
                'role_id' => 9,
                'menu_id' => 373,
                'created_at' => '2023-01-22 17:11:43',
                'updated_at' => '2023-01-22 17:11:43',
            ),
            10 => 
            array (
                'id' => 63,
                'role_id' => 1,
                'menu_id' => 351,
                'created_at' => '2023-01-22 17:12:35',
                'updated_at' => '2023-01-22 17:12:35',
            ),
            11 => 
            array (
                'id' => 64,
                'role_id' => 9,
                'menu_id' => 351,
                'created_at' => '2023-01-22 17:12:35',
                'updated_at' => '2023-01-22 17:12:35',
            ),
            12 => 
            array (
                'id' => 65,
                'role_id' => 1,
                'menu_id' => 352,
                'created_at' => '2023-01-22 17:12:43',
                'updated_at' => '2023-01-22 17:12:43',
            ),
            13 => 
            array (
                'id' => 66,
                'role_id' => 9,
                'menu_id' => 352,
                'created_at' => '2023-01-22 17:12:43',
                'updated_at' => '2023-01-22 17:12:43',
            ),
            14 => 
            array (
                'id' => 75,
                'role_id' => 1,
                'menu_id' => 363,
                'created_at' => '2023-01-22 17:13:20',
                'updated_at' => '2023-01-22 17:13:20',
            ),
            15 => 
            array (
                'id' => 76,
                'role_id' => 9,
                'menu_id' => 363,
                'created_at' => '2023-01-22 17:13:20',
                'updated_at' => '2023-01-22 17:13:20',
            ),
            16 => 
            array (
                'id' => 77,
                'role_id' => 1,
                'menu_id' => 364,
                'created_at' => '2023-01-22 17:13:31',
                'updated_at' => '2023-01-22 17:13:31',
            ),
            17 => 
            array (
                'id' => 78,
                'role_id' => 9,
                'menu_id' => 364,
                'created_at' => '2023-01-22 17:13:31',
                'updated_at' => '2023-01-22 17:13:31',
            ),
            18 => 
            array (
                'id' => 79,
                'role_id' => 1,
                'menu_id' => 407,
                'created_at' => '2023-01-22 17:13:44',
                'updated_at' => '2023-01-22 17:13:44',
            ),
            19 => 
            array (
                'id' => 80,
                'role_id' => 9,
                'menu_id' => 407,
                'created_at' => '2023-01-22 17:13:44',
                'updated_at' => '2023-01-22 17:13:44',
            ),
            20 => 
            array (
                'id' => 81,
                'role_id' => 1,
                'menu_id' => 409,
                'created_at' => '2023-01-22 17:13:48',
                'updated_at' => '2023-01-22 17:13:48',
            ),
            21 => 
            array (
                'id' => 82,
                'role_id' => 9,
                'menu_id' => 409,
                'created_at' => '2023-01-22 17:13:48',
                'updated_at' => '2023-01-22 17:13:48',
            ),
            22 => 
            array (
                'id' => 83,
                'role_id' => 1,
                'menu_id' => 408,
                'created_at' => '2023-01-22 17:13:56',
                'updated_at' => '2023-01-22 17:13:56',
            ),
            23 => 
            array (
                'id' => 84,
                'role_id' => 9,
                'menu_id' => 408,
                'created_at' => '2023-01-22 17:13:56',
                'updated_at' => '2023-01-22 17:13:56',
            ),
            24 => 
            array (
                'id' => 85,
                'role_id' => 1,
                'menu_id' => 397,
                'created_at' => '2023-01-22 17:14:03',
                'updated_at' => '2023-01-22 17:14:03',
            ),
            25 => 
            array (
                'id' => 86,
                'role_id' => 9,
                'menu_id' => 397,
                'created_at' => '2023-01-22 17:14:03',
                'updated_at' => '2023-01-22 17:14:03',
            ),
            26 => 
            array (
                'id' => 96,
                'role_id' => 1,
                'menu_id' => 393,
                'created_at' => '2023-01-22 17:14:41',
                'updated_at' => '2023-01-22 17:14:41',
            ),
            27 => 
            array (
                'id' => 97,
                'role_id' => 9,
                'menu_id' => 393,
                'created_at' => '2023-01-22 17:14:41',
                'updated_at' => '2023-01-22 17:14:41',
            ),
            28 => 
            array (
                'id' => 98,
                'role_id' => 1,
                'menu_id' => 402,
                'created_at' => '2023-01-22 17:14:47',
                'updated_at' => '2023-01-22 17:14:47',
            ),
            29 => 
            array (
                'id' => 99,
                'role_id' => 9,
                'menu_id' => 402,
                'created_at' => '2023-01-22 17:14:47',
                'updated_at' => '2023-01-22 17:14:47',
            ),
            30 => 
            array (
                'id' => 100,
                'role_id' => 1,
                'menu_id' => 394,
                'created_at' => '2023-01-22 17:14:55',
                'updated_at' => '2023-01-22 17:14:55',
            ),
            31 => 
            array (
                'id' => 101,
                'role_id' => 9,
                'menu_id' => 394,
                'created_at' => '2023-01-22 17:14:55',
                'updated_at' => '2023-01-22 17:14:55',
            ),
            32 => 
            array (
                'id' => 106,
                'role_id' => 1,
                'menu_id' => 353,
                'created_at' => '2023-01-22 18:04:22',
                'updated_at' => '2023-01-22 18:04:22',
            ),
            33 => 
            array (
                'id' => 107,
                'role_id' => 9,
                'menu_id' => 353,
                'created_at' => '2023-01-22 18:04:22',
                'updated_at' => '2023-01-22 18:04:22',
            ),
            34 => 
            array (
                'id' => 108,
                'role_id' => 1,
                'menu_id' => 354,
                'created_at' => '2023-01-22 18:04:27',
                'updated_at' => '2023-01-22 18:04:27',
            ),
            35 => 
            array (
                'id' => 109,
                'role_id' => 9,
                'menu_id' => 354,
                'created_at' => '2023-01-22 18:04:27',
                'updated_at' => '2023-01-22 18:04:27',
            ),
            36 => 
            array (
                'id' => 112,
                'role_id' => 1,
                'menu_id' => 416,
                'created_at' => '2023-01-27 22:17:21',
                'updated_at' => '2023-01-27 22:17:21',
            ),
            37 => 
            array (
                'id' => 113,
                'role_id' => 9,
                'menu_id' => 416,
                'created_at' => '2023-01-27 22:17:21',
                'updated_at' => '2023-01-27 22:17:21',
            ),
            38 => 
            array (
                'id' => 114,
                'role_id' => 1,
                'menu_id' => 417,
                'created_at' => '2023-01-27 22:17:43',
                'updated_at' => '2023-01-27 22:17:43',
            ),
            39 => 
            array (
                'id' => 115,
                'role_id' => 9,
                'menu_id' => 417,
                'created_at' => '2023-01-27 22:17:43',
                'updated_at' => '2023-01-27 22:17:43',
            ),
            40 => 
            array (
                'id' => 116,
                'role_id' => 1,
                'menu_id' => 360,
                'created_at' => '2023-03-09 22:26:42',
                'updated_at' => '2023-03-09 22:26:42',
            ),
            41 => 
            array (
                'id' => 117,
                'role_id' => 9,
                'menu_id' => 360,
                'created_at' => '2023-03-09 22:26:42',
                'updated_at' => '2023-03-09 22:26:42',
            ),
            42 => 
            array (
                'id' => 118,
                'role_id' => 1,
                'menu_id' => 392,
                'created_at' => '2023-03-09 22:27:14',
                'updated_at' => '2023-03-09 22:27:14',
            ),
            43 => 
            array (
                'id' => 119,
                'role_id' => 9,
                'menu_id' => 392,
                'created_at' => '2023-03-09 22:27:14',
                'updated_at' => '2023-03-09 22:27:14',
            ),
            44 => 
            array (
                'id' => 127,
                'role_id' => 1,
                'menu_id' => 418,
                'created_at' => '2023-03-10 13:04:51',
                'updated_at' => '2023-03-10 13:04:51',
            ),
            45 => 
            array (
                'id' => 128,
                'role_id' => 9,
                'menu_id' => 418,
                'created_at' => '2023-03-10 13:04:51',
                'updated_at' => '2023-03-10 13:04:51',
            ),
            46 => 
            array (
                'id' => 129,
                'role_id' => 1,
                'menu_id' => 345,
                'created_at' => '2023-03-10 13:05:00',
                'updated_at' => '2023-03-10 13:05:00',
            ),
            47 => 
            array (
                'id' => 130,
                'role_id' => 9,
                'menu_id' => 345,
                'created_at' => '2023-03-10 13:05:00',
                'updated_at' => '2023-03-10 13:05:00',
            ),
            48 => 
            array (
                'id' => 131,
                'role_id' => 1,
                'menu_id' => 413,
                'created_at' => '2023-03-10 13:29:41',
                'updated_at' => '2023-03-10 13:29:41',
            ),
            49 => 
            array (
                'id' => 132,
                'role_id' => 9,
                'menu_id' => 413,
                'created_at' => '2023-03-10 13:29:41',
                'updated_at' => '2023-03-10 13:29:41',
            ),
            50 => 
            array (
                'id' => 133,
                'role_id' => 1,
                'menu_id' => 412,
                'created_at' => '2023-03-10 13:31:08',
                'updated_at' => '2023-03-10 13:31:08',
            ),
            51 => 
            array (
                'id' => 134,
                'role_id' => 9,
                'menu_id' => 412,
                'created_at' => '2023-03-10 13:31:08',
                'updated_at' => '2023-03-10 13:31:08',
            ),
            52 => 
            array (
                'id' => 135,
                'role_id' => 1,
                'menu_id' => 414,
                'created_at' => '2023-03-10 13:31:14',
                'updated_at' => '2023-03-10 13:31:14',
            ),
            53 => 
            array (
                'id' => 136,
                'role_id' => 9,
                'menu_id' => 414,
                'created_at' => '2023-03-10 13:31:14',
                'updated_at' => '2023-03-10 13:31:14',
            ),
            54 => 
            array (
                'id' => 141,
                'role_id' => 1,
                'menu_id' => 415,
                'created_at' => '2023-03-15 14:11:03',
                'updated_at' => '2023-03-15 14:11:03',
            ),
            55 => 
            array (
                'id' => 142,
                'role_id' => 9,
                'menu_id' => 415,
                'created_at' => '2023-03-15 14:11:03',
                'updated_at' => '2023-03-15 14:11:03',
            ),
            56 => 
            array (
                'id' => 143,
                'role_id' => 1,
                'menu_id' => 419,
                'created_at' => '2023-03-15 20:01:06',
                'updated_at' => '2023-03-15 20:01:06',
            ),
            57 => 
            array (
                'id' => 144,
                'role_id' => 9,
                'menu_id' => 419,
                'created_at' => '2023-03-15 20:01:06',
                'updated_at' => '2023-03-15 20:01:06',
            ),
            58 => 
            array (
                'id' => 145,
                'role_id' => 1,
                'menu_id' => 400,
                'created_at' => '2023-03-24 17:35:01',
                'updated_at' => '2023-03-24 17:35:01',
            ),
            59 => 
            array (
                'id' => 146,
                'role_id' => 9,
                'menu_id' => 400,
                'created_at' => '2023-03-24 17:35:01',
                'updated_at' => '2023-03-24 17:35:01',
            ),
            60 => 
            array (
                'id' => 147,
                'role_id' => 1,
                'menu_id' => 420,
                'created_at' => '2023-03-24 21:39:21',
                'updated_at' => '2023-03-24 21:39:21',
            ),
            61 => 
            array (
                'id' => 148,
                'role_id' => 9,
                'menu_id' => 420,
                'created_at' => '2023-03-24 21:39:21',
                'updated_at' => '2023-03-24 21:39:21',
            ),
            62 => 
            array (
                'id' => 149,
                'role_id' => 1,
                'menu_id' => 421,
                'created_at' => '2023-03-24 23:53:51',
                'updated_at' => '2023-03-24 23:53:51',
            ),
            63 => 
            array (
                'id' => 150,
                'role_id' => 9,
                'menu_id' => 421,
                'created_at' => '2023-03-24 23:53:51',
                'updated_at' => '2023-03-24 23:53:51',
            ),
            64 => 
            array (
                'id' => 151,
                'role_id' => 1,
                'menu_id' => 410,
                'created_at' => '2023-03-24 23:54:00',
                'updated_at' => '2023-03-24 23:54:00',
            ),
            65 => 
            array (
                'id' => 152,
                'role_id' => 9,
                'menu_id' => 410,
                'created_at' => '2023-03-24 23:54:00',
                'updated_at' => '2023-03-24 23:54:00',
            ),
            66 => 
            array (
                'id' => 153,
                'role_id' => 1,
                'menu_id' => 411,
                'created_at' => '2023-03-25 00:09:21',
                'updated_at' => '2023-03-25 00:09:21',
            ),
            67 => 
            array (
                'id' => 154,
                'role_id' => 9,
                'menu_id' => 411,
                'created_at' => '2023-03-25 00:09:21',
                'updated_at' => '2023-03-25 00:09:21',
            ),
            68 => 
            array (
                'id' => 155,
                'role_id' => 1,
                'menu_id' => 398,
                'created_at' => '2023-03-25 00:10:13',
                'updated_at' => '2023-03-25 00:10:13',
            ),
            69 => 
            array (
                'id' => 156,
                'role_id' => 9,
                'menu_id' => 398,
                'created_at' => '2023-03-25 00:10:13',
                'updated_at' => '2023-03-25 00:10:13',
            ),
            70 => 
            array (
                'id' => 157,
                'role_id' => 1,
                'menu_id' => 399,
                'created_at' => '2023-03-25 00:10:18',
                'updated_at' => '2023-03-25 00:10:18',
            ),
            71 => 
            array (
                'id' => 158,
                'role_id' => 9,
                'menu_id' => 399,
                'created_at' => '2023-03-25 00:10:18',
                'updated_at' => '2023-03-25 00:10:18',
            ),
            72 => 
            array (
                'id' => 159,
                'role_id' => 1,
                'menu_id' => 346,
                'created_at' => '2023-03-25 00:12:04',
                'updated_at' => '2023-03-25 00:12:04',
            ),
        ));
        
        
    }
}