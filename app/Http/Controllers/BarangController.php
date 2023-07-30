<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Merk;
use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = DB::select("select barangs.id, barangs.image, barangs.nama_barang, merks.nama_merk, barangs.tipe_barang, barangs.harga_barang, barangs.spesifikasi, kategoris.nama_kategori from barangs, merks, kategoris where barangs.merk_id = merks.id and barangs.kategori_id = kategoris.id");

        return view('signed.barang.barang', [
            'title' => 'Gadai Express | Simulasi Gadai | Barang',
            'barang' => $barangs,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'tipe_barang' => 'required',
            'harga_barang' => 'required',
            'spesifikasi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'merk_id' => 'required',
            'kategori_id' => 'required',
        ]);

        $image_path = $request->file('image')->store('barang', 'public');

        $barang = Barang::create([
            'nama_barang' => $request->nama_barang,
            'tipe_barang' => $request->tipe_barang,
            'harga_barang' => $request->harga_barang,
            'spesifikasi' => $request->spesifikasi,
            'image' => $image_path,
            'merk_id' => $request->merk_id,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('barang');
    }

    public function create()
    {
        $merks = DB::select("select merks.id, merks.nama_merk, kategoris.nama_kategori from merks, kategoris where merks.kategori_id = kategoris.id");
        $kategoris = Kategori::all();
        return view('signed.barang.add_barang', [
            'title' => 'Gadai Express | Simulasi Gadai | Tambah Barang',
            'merk' => $merks,
            'kategori' => $kategoris,
        ]);
    }

    public function edit(Request $request)
    {
        $barang = DB::select("select * from barangs where id = '" . $request->id . "'");
        $merks = DB::select("select merks.id, merks.nama_merk, kategoris.nama_kategori from merks, kategoris where merks.kategori_id = kategoris.id");
        $kategoris = Kategori::all();

        return view('signed.barang.edit_barang', [
            'title' => 'Gadai Express | Simulasi Gadai | Edit Barang',
            'barang' => $barang,
            'merk' => $merks,
            'kategori' => $kategoris,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'tipe_barang' => 'required',
            'harga_barang' => 'required',
            'spesifikasi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'merk_id' => 'required',
            'kategori_id' => 'required',
        ]);

        $barang = Barang::find($id);

        $old_image_path = public_path() . '/storage' . '/' . $barang->image;
        // dd($old_image_path);

        $image_path = '';

        if ($request->file('image')) {
            if ($old_image_path) {
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                    $image_path = $request->file('image')->store('barang', 'public');
                } else {
                    $image_path = $request->file('image')->store('barang', 'public');
                }
            } else {
                $image_path = $request->file('image')->store('barang', 'public');
            }

            // dd($image_path);

            $barang->update([
                'nama_barang' => $request->nama_barang,
                'tipe_barang' => $request->tipe_barang,
                'harga_barang' => $request->harga_barang,
                'spesifikasi' => $request->spesifikasi,
                'image' => $image_path,
                'merk_id' => $request->merk_id,
                'kategori_id' => $request->kategori_id,
            ]);
        } else {
            $barang->update([
                'nama_barang' => $request->nama_barang,
                'tipe_barang' => $request->tipe_barang,
                'harga_barang' => $request->harga_barang,
                'spesifikasi' => $request->spesifikasi,
                'merk_id' => $request->merk_id,
                'kategori_id' => $request->kategori_id,
            ]);
        }

        return redirect()->route('barang');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);

        $old_image_path = public_path() . '/storage' . '/' . $barang->image;
        if ($old_image_path) {
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
        }

        $data = $barang->delete();

        return redirect()->route('barang');
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);

        $barangs = DB::select("select barangs.id, barangs.image, barangs.nama_barang, merks.nama_merk, barangs.tipe_barang, barangs.harga_barang, barangs.spesifikasi, kategoris.nama_kategori from barangs, merks, kategoris where barangs.merk_id = merks.id and barangs.kategori_id = kategoris.id and (nama_barang like '%" . $request->search . "%' or nama_merk like '%" . $request->search . "%' or nama_kategori like '%" . $request->search . "%')");

        return view('signed.barang.barang', [
            'title' => 'Gadai Express | Simulasi Gadai | Barang',
            'barang' => $barangs,
        ]);
    }
}
