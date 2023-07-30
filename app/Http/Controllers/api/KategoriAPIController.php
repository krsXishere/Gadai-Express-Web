<?php

namespace App\Http\Controllers\api;

use App\Helpers\APIFormatter;
use App\Http\Controllers\Controller;
use App\Models\Kategori;

class KategoriAPIController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();

        if ($kategori) {
            return APIFormatter::createAPI(200, 'Success', $kategori);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function merk($id)
    {
        $merk = Kategori::with('merk')->where('id', $id)->first();

        if ($merk) {
            return APIFormatter::createAPI(200, 'Success', $merk);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function barang($id)
    {
        $barang = Kategori::with('barang')->where('id', $id)->first();

        if ($barang) {
            return APIFormatter::createAPI(200, 'Success', $barang);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function barangMerk($id)
    {
        $barang = Kategori::with('barang')->with('merk')->where('id', $id)->first();

        if ($barang) {
            return APIFormatter::createAPI(200, 'Success', $barang);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }
}
