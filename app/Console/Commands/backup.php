<?php

namespace App\Console\Commands;

use App\Models\Artikel\Artikel;
use App\Models\Artikel\Kategori;
use App\Models\Artikel\KategoriArtikel;
use App\Models\Artikel\Tag;
use App\Models\Artikel\TagArtikel;
use App\Models\Banner;
use App\Models\Contact\FAQ;
use App\Models\Contact\ListContact;
use App\Models\Contact\Message;
use App\Models\Galeri;
use App\Models\Home\KataKata;
use App\Models\Home\Pengurus;
use App\Models\Home\ProgramPembelajaran;
use App\Models\Menu\Admin as MenuAdmin;
use App\Models\Menu\Frontend as MenuFrontend;
use App\Models\Pendaftaran;
use App\Models\Pendaftaran\GForm;
use App\Models\Produk\Foto;
use App\Models\Produk\Kategori as ProdukKategori;
use App\Models\Produk\MarketPlace;
use App\Models\Produk\MarketPlaceJenis;
use App\Models\Produk\Produk;
use App\Models\RoleHasMenu;
use App\Models\Setting\HomeSlider;
use App\Models\SocialMedia;
use App\Models\Tracker;
use App\Models\Utility\HariBesarNasional;
use App\Models\Utility\NotifAdminAtas;
use App\Models\Utility\NotifDepanAtas;
use Illuminate\Console\Command;

class backup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:backup {type=all} {--current=1}  {--users=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup database using iseed';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tableNames = config('permission.table_names');
        $is_windows = strtolower(PHP_SHLIB_SUFFIX) === 'dll';

        $win_parse = function ($str) use ($is_windows) {
            return str_replace(['\\', '/'], ($is_windows ? '\\' : '/'), $str);
        };

        $root = dirname(__FILE__);
        $root = "$root/../../..";
        $arg_type = $this->argument('type');
        $opt_users = $this->option('users');
        // backup migrasi database sebelumnya
        if ($this->option('current') == 1) {
            // pindahkan folder dulu
            $folder_parent = $win_parse("$root/backup");
            $folder_backup = $win_parse("$folder_parent/" . date('Y-m-d'));

            if (!file_exists("$folder_parent")) echo shell_exec("mkdir $folder_parent");
            if (!file_exists($folder_backup)) echo shell_exec("mkdir $folder_backup");
            $copy = $is_windows ? 'copy' : 'cp -R';
            shell_exec($win_parse("$copy $root/database/seeders/* $folder_backup"));

            echo 'Berhasil backup data sebelumnya' . PHP_EOL;
        }

        $tables =  [
            'artikel' => [
                Artikel::tableName,
                Tag::tableName,
                Kategori::tableName,
                TagArtikel::tableName,
                KategoriArtikel::tableName,
                Banner::tableName,
            ],
            'galeri' => [
                Galeri::tableName,
            ],
            'frontend' => [
                SocialMedia::tableName,
            ],
            'pendaftaran' => [
                GForm::tableName,
                Pendaftaran::tableName
            ],
            'permissions' => [
                $tableNames['roles'],
                $tableNames['permissions'],
                MenuAdmin::tableName,
                $tableNames['model_has_permissions'],
                $tableNames['model_has_roles'],
                $tableNames['role_has_permissions'],
                RoleHasMenu::tableName,
                MenuFrontend::tableName,
            ],
            'utility' => [
                NotifDepanAtas::tableName,
                NotifAdminAtas::tableName,
                HariBesarNasional::tableName,
            ],
            'contact' => [
                ListContact::tableName,
                Message::tableName,
                FAQ::tableName,
            ],
            'home' => [
                KataKata::tableName,
                ProgramPembelajaran::tableName,
                Pengurus::tableName,
            ],
            'setting' => [
                HomeSlider::tableName,
                Tracker::tableName,
            ],
            'produk' => [
                ProdukKategori::tableName,
                Produk::tableName,
                MarketPlaceJenis::tableName,
                Foto::tableName,
                MarketPlace::tableName,
            ],
        ];
        if ($opt_users == 1 || $arg_type == 'users') echo shell_exec('php artisan iseed users --force');
        foreach ($tables as $k => $t) {
            $type = $arg_type == 'all' ? $tables[$k] : ($k == $arg_type ? $t : []);
            foreach ($type as $table) {
                echo shell_exec('php artisan iseed ' . $table . ' --force');
            }

            if (in_array($arg_type, $t)) {
                echo shell_exec('php artisan iseed ' . $arg_type . ' --force');
            }
        }
        return 1;
    }
}
