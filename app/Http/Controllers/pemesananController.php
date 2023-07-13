<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\pembayaran;
use Illuminate\Http\Request;
use App\Models\pemesanan;

class pemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Pemesanan::all();
        return view('pemesanan.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pemesanan.create',[
            'pelanggan' => Pelanggan::get(),
            'pembayaran' => pembayaran::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pemesanan::create(
            [
                'id_pelanggan' => $request->id_pelanggan,
                'id_pembayaran' => $request->id_pembayaran,
                'jumlah_pesanan' => $request->jumlah_pesanan
            ]
        );

        return redirect('pemesanan')->with('success','Data berhasil ditambahkan');
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
        $row = Pemesanan::findOrFail($id);
        return view('pemesanan.edit',[
            'pelanggan' => Pelanggan::get(),
            'pembayaran' => pembayaran::get()
        ],compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Pemesanan::findOrFail($id);
        $row->update(
            [
                'id_pelanggan' => $request->id_pelanggan,
                'id_pembayaran' => $request->id_pembayaran,
                'jumlah_pesanan' => $request->jumlah_pesanan
            ]
        );
        return redirect('pemesanan')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Pemesanan::findOrFail($id);
        $row->delete();

        return redirect('pemesanan')->with('success', 'Data berhasil dihapus');
    }
}