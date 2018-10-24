<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TindakLanjutTemuanController extends Controller
{
    public function index()
    {
        return view('backend.pages.tanggapan.index');
    }
}
