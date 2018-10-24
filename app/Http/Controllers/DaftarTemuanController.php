<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarTemuan;
use App\Models\MasterDinas;
use App\Models\MasterBidangPengawasan;
use App\Models\MasterTemuan;
use App\Models\MasterSebab;
use App\Models\MasterRekomendasi;
class DaftarTemuanController extends Controller
{
    public function index()
    {
        $dinas=MasterDinas::all();
        return view('backend.pages.daftar-temuan.index')
            ->with('dinas',$dinas);
    }

    public function data($dinas_id=null,$tahun=null)
    {
        $daftar=DaftarTemuan::where(['dinas_id'=>$dinas_id,'tahun'=>$tahun])->with(['aparat','dinas','detail'])->get();
        return view('backend.pages.daftar-temuan.data')
            ->with('daftar',$daftar);
    }

    public function create()
    {
        $dinas=MasterDinas::all();
        $bidang=MasterBidangPengawasan::all();
        $temuan=MasterTemuan::all();
        $sebab=MasterSebab::all();
        $rekomendasi=MasterRekomendasi::all();
        return view('backend.pages.daftar-temuan.form')
            ->with('dinas',$dinas)
            ->with('temuan',$temuan)
            ->with('sebab',$sebab)
            ->with('rekomendasi',$rekomendasi)
            ->with('bidang',$bidang);
    }
}
