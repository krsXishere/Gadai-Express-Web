<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Merk;
use Illuminate\Support\Facades\DB;

class MerkController extends Controller
{
    public function index()
    {
        $merks = DB::select("select merks.id, merks.nama_merk, kategoris.nama_kategori from merks, kategoris where merks.kategori_id = kategoris.id");

        return view('signed.merk.merk', [
            'title' => 'Gadai Express | Simulasi Gadai | Merk',
            'merk' => $merks,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_merk' => 'required',
            'kategori_id' => 'required',
        ]);

        $Merk = Merk::create([
            'nama_merk' => $request->nama_merk,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('merk');
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('signed.merk.add_merk', [
            'title' => 'Gadai Express | Simulasi Gadai | Tambah Merk',
            'kategori' => $kategori,
        ]);
    }

    public function edit(Request $request)
    {
        $kategori = Kategori::all();
        $merk = DB::select("select merks.id, merks.nama_merk, kategoris.nama_kategori from merks, kategoris where kategoris.id = merks.kategori_id and merks.id = '" . $request->id . "'");

        return view('signed.merk.edit_merk', [
            'title' => 'Gadai Express | Simulasi Gadai | Edit Merk',
            'merk' => $merk,
            'kategori' => $kategori,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_merk' => 'required',
            'kategori_id' => 'required',
        ]);

        $merk = Merk::find($request->id);

        $merk->update([
            'nama_merk' => $request->nama_merk,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('merk');
    }

    public function destroy($id)
    {
        $merk = Merk::findOrFail($id);
        $data = $merk->delete();

        return redirect()->route('merk');
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);

    $merks = DB::select("select merks.id, merks.nama_merk, kategoris.nama_kategori from merks, kategoris where merks.kategori_id = kategoris.id and (nama_merk like '%" . $request->search . "%' or nama_kategori like '%" . $request->search . "%')");

        return view('signed.merk.merk', [
            'title' => 'Gadai Express | Simulasi Gadai | Merk',
            'merk' => $merks,
        ]);
    }
}
