<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('pages.index', [
            'title' => 'Selamat Datang',
            'daftarBerita' => Berita::paginate(10)
        ]);
    }
}
