<?php

namespace App\Http\Controllers\api;

use App\Helpers\APIFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use Exception;
use Illuminate\Support\Facades\DB;

class BarangAPIController extends Controller
{
    public function index()
    {
        $barang = Barang::all();

        if ($barang) {
            return APIFormatter::createAPI(200, 'Success', $barang);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function show($id)
    {
        $data = Barang::where('id', '=', $id)->orWhere('nama_barang', 'LIKE', '%' . $id . '%')->get();

        if ($data) {
            return APIFormatter::createAPI(200, 'Success', $data[0]);
        } else {
            return APIFormatter::createAPI(400, 'Failed');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_barang' => 'required',
                'merk_barang' => 'required',
                'tipe_barang' => 'required',
                'harga_barang' => 'required',
                'spesifikasi' => 'required',
            ]);

            $barang = Barang::create([
                'nama_barang' => $request->nama_barang,
                'merk_barang' => $request->merk_barang,
                'tipe_barang' => $request->tipe_barang,
                'harga_barang' => $request->harga_barang,
                'spesifikasi' => $request->spesifikasi,
            ]);

            $data = Barang::where('id', '=', $barang->id)->get();

            if ($data) {
                return APIFormatter::createAPI(200, 'Success', $data);
            } else {
                return APIFormatter::createAPI(400, 'Failed', 'Empty');
            }
        } catch (Exception $error) {
            return APIFormatter::createAPI(400, 'Failed', $error);
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'nama_barang' => 'required',
                'merk_barang' => 'required',
                'tipe_barang' => 'required',
                'harga_barang' => 'required',
                'spesifikasi' => 'required',
            ]);

            $barang = Barang::find($request->id);

            $barang->update($request->all());

            $data = Barang::where('id', '=', $request->id)->get();

            if ($data) {
                return APIFormatter::createAPI(200, 'Success', $data);
            } else {
                return APIFormatter::createAPI(400, 'Failed', 'Empty');
            }
        } catch (Exception $error) {
            return APIFormatter::createAPI(422, 'Error', $error);
        }
    }

    public function destroy($id)
    {
        try {
            $barang = Barang::findOrFail($id);
            $data = $barang->delete();

            if ($data) {
                return APIFormatter::createAPI(200, 'Success');
            } else {
                return APIFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $error) {
            return APIFormatter::createAPI(400, 'Failed', $error);
        }
    }

    public function barang(Request $request)
    {
        try {
            // dd();
            $data = DB::select("select * from barangs where kategori_id = '" . $request->kategori_id . "' and merk_id = '" . $request->merk_id . "'");

            if ($data) {
                return APIFormatter::createAPI(200, 'Success', $data);
            } else {
                return APIFormatter::createAPI(400, 'Failed', $request->kategori_id);
            }
        } catch (Exception $error) {
            return APIFormatter::createAPI(400, 'Failed', $error);
        }
    }
}
