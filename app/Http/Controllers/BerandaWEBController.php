<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerandaWEBController extends Controller
{
    public function index()
    {
        $barang_db = DB::select("select count(id) as jumlah from barangs");
        $barang = '';

        foreach ($barang_db as $row) {
            $barang = $row->jumlah;
        }

        return view('signed.beranda', [
            'title' => 'Gadai Express | Simulasi Gadai | Beranda',
            'barang' => $barang,
        ]);
    }
}
