<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VisitorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('visitors')->delete();
        
        \DB::table('visitors')->insert(array (
            0 => 
            array (
                'id' => 1,
                'ip' => '114.124.131.102',
                'date' => '2023-03-14',
                'time' => '01:51:51',
                'platform' => 'Android',
                'browser' => 'MiuiBrowser',
                'browser_version' => '13.22.1',
            'user_agent' => 'Mozilla/5.0 (Linux; U; Android 12; en-gb; POCO M3 Build/SKQ1.211202.001) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/100.0.4896.127 Mobile Safari/537.36 XiaoMi/MiuiBrowser/13.22.1-gn',
                'hits' => 3,
                'has_detail' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'ip' => '103.147.8.244',
                'date' => '2023-03-14',
                'time' => '01:54:54',
                'platform' => 'Windows',
                'browser' => 'Edge',
                'browser_version' => '110.0.1587.69',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 Edg/110.0.1587.69',
                'hits' => 7,
                'has_detail' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'ip' => '149.154.161.233',
                'date' => '2023-03-14',
                'time' => '01:52:24',
                'platform' => NULL,
                'browser' => 'TelegramBot',
                'browser_version' => NULL,
            'user_agent' => 'TelegramBot (like TwitterBot)',
                'hits' => 1,
                'has_detail' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'ip' => '114.124.131.102',
                'date' => '2023-03-14',
                'time' => '01:52:34',
                'platform' => 'Android',
                'browser' => 'Chrome',
                'browser_version' => '111.0.0.0',
            'user_agent' => 'Mozilla/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36',
                'hits' => 1,
                'has_detail' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'ip' => '114.124.131.38',
                'date' => '2023-03-14',
                'time' => '01:53:25',
                'platform' => 'Android',
                'browser' => 'Chrome',
                'browser_version' => '111.0.0.0',
            'user_agent' => 'Mozilla/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36',
                'hits' => 4,
                'has_detail' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'ip' => '114.124.131.102',
                'date' => '2023-03-14',
                'time' => '01:52:58',
                'platform' => NULL,
                'browser' => 'YoWhatsApp',
                'browser_version' => '2.23.1.76',
                'user_agent' => 'YoWhatsApp/2.23.1.76 A',
                'hits' => 1,
                'has_detail' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'ip' => '114.124.130.38',
                'date' => '2023-03-14',
                'time' => '01:54:04',
                'platform' => 'Android',
                'browser' => 'Chrome',
                'browser_version' => '111.0.0.0',
            'user_agent' => 'Mozilla/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36',
                'hits' => 1,
                'has_detail' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'ip' => '114.124.131.102',
                'date' => '2023-03-14',
                'time' => '01:54:18',
                'platform' => 'Android',
                'browser' => 'Opera',
                'browser_version' => '67.1.2254.65126',
            'user_agent' => 'Mozilla/5.0 (Linux; U; Android 12; M2010J19CG Build/SKQ1.211202.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/110.0.5481.154 Mobile Safari/537.36 OPR/67.1.2254.65126',
                'hits' => 1,
                'has_detail' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'ip' => '114.124.130.38',
                'date' => '2023-03-14',
                'time' => '01:54:54',
                'platform' => 'Android',
                'browser' => 'Opera',
                'browser_version' => '67.1.2254.65126',
            'user_agent' => 'Mozilla/5.0 (Linux; U; Android 12; M2010J19CG Build/SKQ1.211202.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/110.0.5481.154 Mobile Safari/537.36 OPR/67.1.2254.65126',
                'hits' => 5,
                'has_detail' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'ip' => '103.147.8.244',
                'date' => '2023-03-14',
                'time' => '01:55:16',
                'platform' => 'Windows',
                'browser' => 'Firefox',
                'browser_version' => '111.0',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0',
                'hits' => 1,
                'has_detail' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'ip' => '103.147.8.244',
                'date' => '2023-03-14',
                'time' => '01:55:58',
                'platform' => 'Windows',
                'browser' => 'Edge',
                'browser_version' => '110.0.1587.69',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 Edg/110.0.1587.69,gzip(gfe)',
                'hits' => 2,
                'has_detail' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'ip' => '54.39.107.46',
                'date' => '2023-03-14',
                'time' => '01:56:32',
                'platform' => 'Windows',
                'browser' => 'Edge',
                'browser_version' => '110.0.1587.69',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 Edg/110.0.1587.69',
                'hits' => 1,
                'has_detail' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'ip' => '185.229.118.1',
                'date' => '2023-03-14',
                'time' => '02:01:57',
                'platform' => NULL,
                'browser' => 'Go-http-client',
                'browser_version' => '1.1',
                'user_agent' => 'Go-http-client/1.1',
                'hits' => 1,
                'has_detail' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'ip' => '127.0.0.1',
                'date' => '2023-03-14',
                'time' => '17:58:13',
                'platform' => 'Windows',
                'browser' => 'Edge',
                'browser_version' => '110.0.1587.69',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 Edg/110.0.1587.69',
                'hits' => 30,
                'has_detail' => 0,
            ),
            14 => 
            array (
                'id' => 15,
                'ip' => '127.0.0.1',
                'date' => '2023-03-14',
                'time' => '17:37:32',
                'platform' => 'Android',
                'browser' => 'Edge',
                'browser_version' => '110.0.1587.69',
            'user_agent' => 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Mobile Safari/537.36 Edg/110.0.1587.69',
                'hits' => 5,
                'has_detail' => 0,
            ),
            15 => 
            array (
                'id' => 16,
                'ip' => '103.147.9.137',
                'date' => '2023-03-14',
                'time' => '19:58:25',
                'platform' => 'Windows',
                'browser' => 'Chrome',
                'browser_version' => '111.0.0.0',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36',
                'hits' => 21,
                'has_detail' => 1,
            ),
            16 => 
            array (
                'id' => 17,
                'ip' => '103.147.9.137',
                'date' => '2023-03-14',
                'time' => '18:48:55',
                'platform' => 'Windows',
                'browser' => 'Edge',
                'browser_version' => '110.0.1587.69',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 Edg/110.0.1587.69',
                'hits' => 17,
                'has_detail' => 1,
            ),
            17 => 
            array (
                'id' => 18,
                'ip' => '52.167.144.87',
                'date' => '2023-03-14',
                'time' => '19:37:18',
                'platform' => NULL,
                'browser' => 'Chrome',
                'browser_version' => '103.0.5060.134',
            'user_agent' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36',
                'hits' => 3,
                'has_detail' => 1,
            ),
            18 => 
            array (
                'id' => 19,
                'ip' => '185.229.118.32',
                'date' => '2023-03-14',
                'time' => '23:31:59',
                'platform' => NULL,
                'browser' => 'Go-http-client',
                'browser_version' => '1.1',
                'user_agent' => 'Go-http-client/1.1',
                'hits' => 11,
                'has_detail' => 1,
            ),
            19 => 
            array (
                'id' => 20,
                'ip' => '40.77.167.228',
                'date' => '2023-03-14',
                'time' => '19:00:11',
                'platform' => NULL,
                'browser' => 'Chrome',
                'browser_version' => '103.0.5060.134',
            'user_agent' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36',
                'hits' => 5,
                'has_detail' => 1,
            ),
            20 => 
            array (
                'id' => 21,
                'ip' => '207.46.13.211',
                'date' => '2023-03-14',
                'time' => '18:45:14',
                'platform' => NULL,
                'browser' => 'Chrome',
                'browser_version' => '103.0.5060.134',
            'user_agent' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36',
                'hits' => 1,
                'has_detail' => 1,
            ),
            21 => 
            array (
                'id' => 22,
                'ip' => '40.77.167.167',
                'date' => '2023-03-14',
                'time' => '18:54:50',
                'platform' => NULL,
                'browser' => 'Chrome',
                'browser_version' => '103.0.5060.134',
            'user_agent' => 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/103.0.5060.134 Safari/537.36',
                'hits' => 1,
                'has_detail' => 1,
            ),
            22 => 
            array (
                'id' => 23,
                'ip' => '141.98.255.211',
                'date' => '2023-03-14',
                'time' => '19:08:16',
                'platform' => 'Macintosh',
                'browser' => 'Safari',
                'browser_version' => '7.0.6',
            'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_5) AppleWebKit/537.78.2 (KHTML, like Gecko) Version/7.0.6 Safari/537.78.2',
                'hits' => 1,
                'has_detail' => 1,
            ),
            23 => 
            array (
                'id' => 24,
                'ip' => '35.90.145.18',
                'date' => '2023-03-14',
                'time' => '19:30:15',
                'platform' => 'Windows',
                'browser' => 'Chrome',
                'browser_version' => '56.0.2924.76',
            'user_agent' => 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.76 Safari/537.36',
                'hits' => 1,
                'has_detail' => 1,
            ),
            24 => 
            array (
                'id' => 25,
                'ip' => '35.89.207.13',
                'date' => '2023-03-14',
                'time' => '19:30:17',
                'platform' => 'Macintosh',
                'browser' => 'Chrome',
                'browser_version' => '97.0.4692.99',
            'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36',
                'hits' => 1,
                'has_detail' => 1,
            ),
            25 => 
            array (
                'id' => 26,
                'ip' => '34.254.53.125',
                'date' => '2023-03-14',
                'time' => '19:57:26',
                'platform' => 'Linux',
                'browser' => 'Firefox',
                'browser_version' => '83.0',
            'user_agent' => 'Mozilla/5.0 (X11; Linux x86_64; rv:83.0) Gecko/20100101 Firefox/83.0',
                'hits' => 3,
                'has_detail' => 1,
            ),
            26 => 
            array (
                'id' => 27,
                'ip' => '34.254.53.125',
                'date' => '2023-03-14',
                'time' => '19:57:29',
                'platform' => 'Linux',
                'browser' => 'Firefox',
                'browser_version' => '109.0',
            'user_agent' => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:109.0) Gecko/20100101 Firefox/109.0',
                'hits' => 3,
                'has_detail' => 1,
            ),
            27 => 
            array (
                'id' => 28,
                'ip' => '34.254.53.125',
                'date' => '2023-03-14',
                'time' => '19:57:34',
                'platform' => 'Macintosh',
                'browser' => 'Chrome',
                'browser_version' => '33.0.1750.152',
            'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.152 Safari/537.36',
                'hits' => 3,
                'has_detail' => 1,
            ),
            28 => 
            array (
                'id' => 29,
                'ip' => '94.176.82.49',
                'date' => '2023-03-14',
                'time' => '23:14:38',
                'platform' => 'Windows',
                'browser' => 'MSIE',
                'browser_version' => '11.0',
            'user_agent' => 'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko',
                'hits' => 1,
                'has_detail' => 1,
            ),
            29 => 
            array (
                'id' => 30,
                'ip' => '36.69.128.176',
                'date' => '2023-03-14',
                'time' => '23:48:10',
                'platform' => 'Windows',
                'browser' => 'Chrome',
                'browser_version' => '111.0.0.0',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36',
                'hits' => 1,
                'has_detail' => 1,
            ),
            30 => 
            array (
                'id' => 31,
                'ip' => '185.229.118.32',
                'date' => '2023-03-15',
                'time' => '02:01:44',
                'platform' => NULL,
                'browser' => 'Go-http-client',
                'browser_version' => '1.1',
                'user_agent' => 'Go-http-client/1.1',
                'hits' => 15,
                'has_detail' => 1,
            ),
            31 => 
            array (
                'id' => 32,
                'ip' => '103.147.8.13',
                'date' => '2023-03-15',
                'time' => '00:17:03',
                'platform' => 'Windows',
                'browser' => 'Edge',
                'browser_version' => '110.0.1587.69',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 Edg/110.0.1587.69',
                'hits' => 1,
                'has_detail' => 1,
            ),
            32 => 
            array (
                'id' => 33,
                'ip' => '35.189.210.103',
                'date' => '2023-03-15',
                'time' => '00:19:33',
                'platform' => 'Macintosh',
                'browser' => 'Firefox',
                'browser_version' => '52.0',
            'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:52.0) Gecko/20100101 Firefox/52.0',
                'hits' => 1,
                'has_detail' => 1,
            ),
            33 => 
            array (
                'id' => 34,
                'ip' => '127.0.0.1',
                'date' => '2023-03-16',
                'time' => '19:38:35',
                'platform' => 'Windows',
                'browser' => 'Edge',
                'browser_version' => '111.0.1661.41',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36 Edg/111.0.1661.41',
                'hits' => 1,
                'has_detail' => 0,
            ),
            34 => 
            array (
                'id' => 35,
                'ip' => '127.0.0.1',
                'date' => '2023-03-20',
                'time' => '21:53:41',
                'platform' => 'Windows',
                'browser' => 'Edge',
                'browser_version' => '111.0.1661.44',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36 Edg/111.0.1661.44',
                'hits' => 228,
                'has_detail' => 0,
            ),
            35 => 
            array (
                'id' => 36,
                'ip' => '127.0.0.1',
                'date' => '2023-03-20',
                'time' => '19:47:53',
                'platform' => 'Android',
                'browser' => 'Edge',
                'browser_version' => '111.0.1661.44',
            'user_agent' => 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36 Edg/111.0.1661.44',
                'hits' => 2,
                'has_detail' => 0,
            ),
            36 => 
            array (
                'id' => 37,
                'ip' => '127.0.0.1',
                'date' => '2023-03-21',
                'time' => '00:12:13',
                'platform' => 'Windows',
                'browser' => 'Edge',
                'browser_version' => '111.0.1661.44',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36 Edg/111.0.1661.44',
                'hits' => 1,
                'has_detail' => 0,
            ),
            37 => 
            array (
                'id' => 38,
                'ip' => '127.0.0.1',
                'date' => '2023-03-24',
                'time' => '23:54:41',
                'platform' => 'Windows',
                'browser' => 'Edge',
                'browser_version' => '111.0.1661.44',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36 Edg/111.0.1661.44',
                'hits' => 193,
                'has_detail' => 0,
            ),
            38 => 
            array (
                'id' => 39,
                'ip' => '127.0.0.1',
                'date' => '2023-03-24',
                'time' => '16:52:30',
                'platform' => 'Android',
                'browser' => 'Edge',
                'browser_version' => '111.0.1661.44',
            'user_agent' => 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36 Edg/111.0.1661.44',
                'hits' => 34,
                'has_detail' => 0,
            ),
            39 => 
            array (
                'id' => 40,
                'ip' => '127.0.0.1',
                'date' => '2023-03-25',
                'time' => '01:29:09',
                'platform' => 'Windows',
                'browser' => 'Edge',
                'browser_version' => '111.0.1661.44',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36 Edg/111.0.1661.44',
                'hits' => 20,
                'has_detail' => 0,
            ),
            40 => 
            array (
                'id' => 41,
                'ip' => '127.0.0.1',
                'date' => '2023-03-25',
                'time' => '14:07:31',
                'platform' => 'Windows',
                'browser' => 'Edge',
                'browser_version' => '111.0.1661.51',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36 Edg/111.0.1661.51',
                'hits' => 4,
                'has_detail' => 0,
            ),
            41 => 
            array (
                'id' => 42,
                'ip' => '127.0.0.1',
                'date' => '2023-03-26',
                'time' => '21:04:18',
                'platform' => 'Windows',
                'browser' => 'Edge',
                'browser_version' => '111.0.1661.51',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36 Edg/111.0.1661.51',
                'hits' => 224,
                'has_detail' => 0,
            ),
            42 => 
            array (
                'id' => 43,
                'ip' => '192.168.190.26',
                'date' => '2023-03-26',
                'time' => '08:06:50',
                'platform' => 'Android',
                'browser' => 'Chrome',
                'browser_version' => '111.0.0.0',
            'user_agent' => 'Mozilla/5.0 (Linux; Android 12; M2010J19CG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36',
                'hits' => 5,
                'has_detail' => 0,
            ),
            43 => 
            array (
                'id' => 44,
                'ip' => '127.0.0.1',
                'date' => '2023-03-26',
                'time' => '16:49:39',
                'platform' => 'Android',
                'browser' => 'Edge',
                'browser_version' => '111.0.1661.51',
            'user_agent' => 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36 Edg/111.0.1661.51',
                'hits' => 3,
                'has_detail' => 0,
            ),
        ));
        
        
    }
}