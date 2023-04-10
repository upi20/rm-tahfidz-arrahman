<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Session;
use MatthiasMullie\Minify\JS;

class LoaderController extends Controller
{
    public function js($file)
    {
        $path = "$file.js";
        return $this->render($path);
    }

    public function js_f(string $f, string $file)
    {
        $path = "$f/$file.js";
        return $this->render($path);
    }

    public function js_a(string $f, string $f_a, string $file)
    {
        $path = "$f/$f_a/$file.js";
        return $this->render($path);
    }

    public function js_b(string $f, string $f_a, string $f_b, string $file)
    {
        $path = "$f/$f_a/$f_b/$file.js";
        return $this->render($path);
    }

    public function js_c(string $f, string $f_a, string $f_b,  string $f_c, string $file)
    {
        $path = "$f/$f_a/$f_b/$f_c/$file.js";
        return $this->render($path);
    }

    public function js_d(string $f, string $f_a, string $f_b,  string $f_c, string $f_d, string $file)
    {
        $path = "$f/$f_a/$f_b/$f_c/$f_d/$file.js";
        return $this->render($path);
    }

    private function render($path)
    {
        try {
            $csrf_token = Session::token();
            $key = request('k');
            $check_token = $csrf_token == $key;
            $full_path = resource_path("js/views/$path");
            if (file_exists($full_path) && $check_token) {
                $minifier = new JS($full_path);
                $data = request()->query();
                $result = Blade::render($minifier->minify(), $data);
                return response($result)->header('Content-Type', 'application/javascript');
            } else return $this->js_nf($path);
        } catch (\Throwable $th) {
            return $this->js_err($path);
        }
    }

    private function js_nf($file)
    {
        return response("console.log('javascript {$file} not found')")
            ->header('Content-Type', 'application/javascript');
    }

    private function js_err($file)
    {
        return response("console.log('javascript {$file} error')")
            ->header('Content-Type', 'application/javascript');
    }
}
