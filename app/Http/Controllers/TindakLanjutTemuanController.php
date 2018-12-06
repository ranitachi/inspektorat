<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DetailTemuan;

class TindakLanjutTemuanController extends Controller
{
    public function index($id)
    {
        $temuan = DetailTemuan::with('pengawasan')->findOrFail($id);

        // return $temuan;

        return view('backend.pages.tanggapan.index')->with('temuan', $temuan);
    }
}
