<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $units = \App\Models\UnitPengolah::with('layanan')->get();
        return view('layouts.landing.anyar.index', [
            'units' => $units
        ]);
    }

    public function create($idx_layanan = null)
    {
        $id_layanan = null;
        if ($idx_layanan) {
            $arr = \Vinkla\Hashids\Facades\Hashids::decode($idx_layanan);
            $id_layanan = $arr[0];
        }

        $daftarLayanan = DaftarLayanan::whereHas('syarat')->get();
        return view('landing.buat-pelayanan.index', [
            'daftar_layanan'  => $daftarLayanan,
            'id_layanan' => $id_layanan,
            'title' => 'Buat Permohonan Layanan'
        ]);
    }

    public function tentang()
    {
        return view('landing.tentang.index', [
            'title' => 'Tentang Pelayanan Terpadu Satu Pintu'
        ]);
    }

    public function daftarPelayanan() {
        $units = \App\Models\UnitPengolah::with('layanan')->get();
        return view('landing.daftar-pelayanan.index', [
            'title' => 'Daftar Pelayanan PTSP Online',
            'units' => $units
        ]);
    }

    public function lacakPelayanan() {
        $daftarLayanan = \App\Models\DaftarLayanan::all();
        return view('landing.lacak-pelayanan.index', [
            'title' => 'Lacak Permohonan Pelayanan',
            'daftar_layanan'  => $daftarLayanan,
        ]);
    }

    public function detailPelayanan($idx) {
        $daftarLayanan = \App\Models\DaftarLayanan::all();
        return view('landing.detail-pelayanan.index', [
            'title' => 'Detail Permohonan Pelayanan',
            'daftar_layanan'  => $daftarLayanan,
            'idx_pelayanan'  => $idx,
        ]);
    }
}
