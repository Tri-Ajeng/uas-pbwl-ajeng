<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stokproduk;

class stokprodukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Stokproduk::all();
        return view('stokproduk.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stokproduk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Stokproduk::create(
            [
                'tgl_pembuatan' => $request->tgl_pembuatan,
                'stok_barang' => $request->stok_barang
            ]
        );

        return redirect('stokproduk')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Stokproduk::findOrFail($id);
        return view('stokproduk.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Stokproduk::findOrFail($id);
        $row->update(
            [
                'tgl_pembuatan' => $request->tgl_pembuatan,
                'stok_barang' => $request->stok_barang
            ]
        );
        return redirect('stokproduk')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Stokproduk::findOrFail($id);
        $row->delete();

        return redirect('stokproduk')->with('success', 'Data berhasil dihapus');
    }
}
