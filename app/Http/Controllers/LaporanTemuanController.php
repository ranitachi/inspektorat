<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarTemuan;
use App\Models\DetailTemuan;
use App\Models\MasterDinas;
use App\Models\MasterBidangPengawasan;
use App\Models\MasterTemuan;
use App\Models\MasterSebab;
use App\Models\MasterRekomendasi;

use Auth;
class LaporanTemuanController extends Controller
{
    public function index()
    {
        $dinas=MasterDinas::all();
        return view('backend.pages.laporan.rekap-temuan')->with('dinas',$dinas);
    }
    public function rekapdetail($opd)
    {
        $dinas=MasterDinas::where('nama_slug',$opd)->first();
        return view('backend.pages.laporan.rekap-detail')->with('dinas',$dinas);
    }
}
