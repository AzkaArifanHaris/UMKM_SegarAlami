<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif,jfif|max:2048',
        ]);
        $produk = new Produk;
        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        $produk->gambar = $request->gambar;

        if ($request->hasFile('gambar')) {
            $produk->gambar = $request->file('gambar')->store('images', 'public');
        }
        $produk->save();

        return redirect()->route('produk.index')->with('success', 'Berita berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
        $produk=$produk;
        return view('produk.edit',compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif,jfif|max:2048',
        ]);
        $produk = new Produk;
        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        $produk->gambar = $request->gambar;

        if ($request->hasFile('gambar')) {
            if($produk->gambar){
                Storage::delete('public/'. $produk->gambar);  // hapus file gambar lama  //
            }
            $projek->gambar = $request->file('gambar')->store('images', 'public');
        }
        $projek->save();

        return redirect()->route('produk.index')->with('success', 'Berita berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk=$produk;
        if($produk->gambar){
            Storage::delete('public/'. $produk->gambar);  // hapus file gambar  //
        }
        $berita->delete();

        return redirect()->route('produk.index')->with('error', 'Berita berhasil dihapus!');
    }

}
