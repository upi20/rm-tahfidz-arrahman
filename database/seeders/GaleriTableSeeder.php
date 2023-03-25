<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GaleriTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('galeri')->delete();
        
        \DB::table('galeri')->insert(array (
            0 => 
            array (
                'id' => 8,
                'nama' => 'Apresiasi dari pengunjung',
                'foto' => '',
                'foto_id_gdrive' => '1FdEhTh0Zl4uBwPGpYCM-7AfgKm0LTIIX',
                'id_gdrive' => '19qaw40ID74FzXXwSxDOSgInpVG7mZRP-',
                'slug' => 'apresiasi-dari-pengunjung',
                'tanggal' => '2022-11-12',
                'lokasi' => 'lokasi',
                'keterangan' => 'Keterangan',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 9,
                'nama' => 'Pameran urban farming',
                'foto' => '',
                'foto_id_gdrive' => '16tFAQVijq_G3TCuztVSNqGoG7QRkXlul',
                'id_gdrive' => '1csG6Iutg1mVqPsGeIq9O4JIuaC9vGSO1',
                'slug' => 'pameran-urban-farming',
                'tanggal' => '2022-11-12',
                'lokasi' => 'lokasi',
                'keterangan' => 'Keterangan',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 10,
                'nama' => 'Pelatihan art recycle',
                'foto' => '',
                'foto_id_gdrive' => '1zfnH-CL74_WHYpjIc3_4MsbzpT3eh_HQ',
                'id_gdrive' => '1huzdMz15jfOZQRYTk6qzNJQIb0f2xc7B',
                'slug' => 'pelatihan-art-recycle',
                'tanggal' => '2022-11-12',
                'lokasi' => 'lokasi',
                'keterangan' => 'Keterangan',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 11,
                'nama' => 'Pelatihan art recycle mengolah limbah',
                'foto' => '',
                'foto_id_gdrive' => '1JIRMtoS0zxtCR2hF5R9lJO_hjS38vgT7',
                'id_gdrive' => '188_7_sPBMYRnn9wdAn0DsMiAlG-Hsl3j',
                'slug' => 'pelatihan-art-recycle-mengolah-limbah',
                'tanggal' => '2022-11-11',
                'lokasi' => 'lokasi',
                'keterangan' => 'Keterangan',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 12,
                'nama' => 'Pelatihan hidroponik',
                'foto' => '',
                'foto_id_gdrive' => '14tSjoZfT9uZSBVxs2-pKHpwnsHsXRGNG',
                'id_gdrive' => '1BHTE4Ko4s9gGaD0x0ILekCbBpDSF_cZu',
                'slug' => 'pelatihan-hidroponik',
                'tanggal' => '2022-11-12',
                'lokasi' => 'lokasi',
                'keterangan' => 'Keterangan',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 13,
                'nama' => 'Pelatihan kebun sekolah',
                'foto' => '',
                'foto_id_gdrive' => '11Mo1pt64clen9u_oP-zvsa-XbkhQ7rS3',
                'id_gdrive' => '1puxsbawa0eT60297aJ7sktPZjrUGcRvL',
                'slug' => 'pelatihan-kebun-sekolah',
                'tanggal' => '2022-11-12',
                'lokasi' => 'lokasi',
                'keterangan' => 'Keterangan',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 14,
                'nama' => 'Pelatihan urban farming',
                'foto' => '',
                'foto_id_gdrive' => '1ttKfABAyCvRLPoGyrxI-4v77zHs-jtUS',
                'id_gdrive' => '123ZvirT_--ievDWNNcRSmYHwAgkI6VF9',
                'slug' => 'pelatihan-urban-farming',
                'tanggal' => '2022-11-12',
                'lokasi' => 'lokasi',
                'keterangan' => 'Keterangan',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 15,
                'nama' => 'Penanaman anggrek',
                'foto' => '',
                'foto_id_gdrive' => '1m8OrGDgkC_KhUy8XYaQgKhrK9DkVakWY',
                'id_gdrive' => '1rt7CABgknNh1bHTBiz-Xr4GoVhEFw-S6',
                'slug' => 'penanaman-anggrek',
                'tanggal' => '2022-11-12',
                'lokasi' => 'lokasi',
                'keterangan' => 'Keterangan',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 16,
                'nama' => 'Pendidikan budaya',
                'foto' => '',
                'foto_id_gdrive' => '1I7qpBv8VN8r24V7TEEBkBM-DRqwc6v37',
                'id_gdrive' => '1KEkC-xKivDUzZIJuHptvvPNOXwL319yT',
                'slug' => 'pendidikan-budaya',
                'tanggal' => '2022-11-12',
                'lokasi' => 'lokasi',
                'keterangan' => 'Keterangan',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 17,
                'nama' => 'Pendidikan lingkungan',
                'foto' => '',
                'foto_id_gdrive' => '1n52yeOoVcGvnBxBJk1_KL3zTeKGu-YYk',
                'id_gdrive' => '1l-cjHCQ2p-9GyktWhc-eGgr_VsG246TJ',
                'slug' => 'pendidikan-lingkungan',
                'tanggal' => '2022-11-12',
                'lokasi' => 'lokasi',
                'keterangan' => 'Keterangan',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 18,
                'nama' => 'Pengenalan sawah',
                'foto' => '',
                'foto_id_gdrive' => '17x_fjpRXgXgPJ-vE1v_EPp_Fmxc3Bzmm',
                'id_gdrive' => '1iQiU0CYjN-OUOgAgitbiClemRJ037WVL',
                'slug' => 'pengenalan-sawah',
                'tanggal' => '2022-11-12',
                'lokasi' => 'lokasi',
                'keterangan' => 'Keterangan',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 19,
                'nama' => 'penyewaan tanaman hias',
                'foto' => NULL,
                'foto_id_gdrive' => '11',
                'id_gdrive' => '12',
                'slug' => 'penyewaan-tanaman-hias',
                'tanggal' => '2023-01-23',
                'lokasi' => 'https://drive.google.com/file/d/11X58kSdMWtGoVpO7n5kI1dxvGtqWEcGF/view?usp=drivesdk',
                'keterangan' => 'Pdf',
                'status' => 1,
                'created_at' => '2023-01-23 12:09:24',
                'updated_at' => '2023-01-23 12:09:24',
            ),
            12 => 
            array (
                'id' => 20,
                'nama' => 'Pelatiham Wirausaha Tanaman Hias Sukulen',
                'foto' => NULL,
                'foto_id_gdrive' => '1LYQJl2IXhjkgj6GSoSL2yokSLIL_713z',
                'id_gdrive' => '1uqzblgutD6Eru6ElldMBsXBFTNSQPfvQ',
                'slug' => 'pelatiham-wirausaha-tanaman-hias-sukulen',
                'tanggal' => '2023-01-26',
                'lokasi' => 'Kel. manjahlega kecamatan rancasari',
                'keterangan' => 'Pelatiham Wirausaha Tanaman Hias Sukulen untuk Ibu-ibu PKK kelurahan manjahlega kecamatan rancasari, bekerjasama dengan dinas sosial kota bandung',
                'status' => 1,
                'created_at' => '2023-01-27 00:15:27',
                'updated_at' => '2023-01-27 00:15:27',
            ),
        ));
        
        
    }
}