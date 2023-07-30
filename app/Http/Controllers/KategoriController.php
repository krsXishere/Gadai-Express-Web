<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();

        return view('signed.kategori.kategori', [
            'title' => 'Gadai Express | Simulasi Gadai | Kategori',
            'kategori' => $kategoris,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        $image_path = $request->file('image')->store('kategori', 'public');

        $kategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'image' => $image_path,
        ]);

        return redirect()->route('kategori');
    }

    public function create()
    {
        return view('signed.kategori.add_kategori', [
            'title' => 'Gadai Express | Simulasi Gadai | Tambah Kategori',
        ]);
    }

    public function edit(Request $request)
    {
        $kategori = DB::select("select * from kategoris where id = '" . $request->id . "'");

        return view('signed.Kategori.edit_kategori', [
            'title' => 'Gadai Express | Simulasi Gadai | Edit Kategori',
            'kategori' => $kategori,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        $kategori = Kategori::find($request->id);

        $old_image_path = public_path() . '/storage' . '/' . $kategori->image;
        // dd($old_image_path);

        $image_path = '';

        if ($old_image_path) {
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
                $image_path = $request->file('image')->store('kategori', 'public');
            } else {
                $image_path = $request->file('image')->store('kategori', 'public');
            }
        } else {
            $image_path = $request->file('image')->store('kategori', 'public');
        }

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'image' => $image_path,
        ]);

        return redirect()->route('kategori');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);

        $old_image_path = public_path() . '/storage' . '/' . $kategori->image;
        if ($old_image_path) {
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
        }

        $data = $kategori->delete();

        return redirect()->route('kategori');
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);

        $kategoris = DB::select("select * from kategoris where nama_kategori like '%" . $request->search . "%'");

        return view('signed.Kategori.Kategori', [
            'title' => 'Gadai Express | Simulasi Gadai | Kategori',
            'kategori' => $kategoris,
        ]);
    }
}
