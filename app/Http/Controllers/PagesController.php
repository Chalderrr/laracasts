<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Filesystem\Filesystem;

class PagesController extends Controller
{
    public function home(Filesystem $file)
    {
        // return File::get(public_path('index.php'));
        return $file->get(public_path('index.php'));
        // return View::make('welcome');
    }
}
