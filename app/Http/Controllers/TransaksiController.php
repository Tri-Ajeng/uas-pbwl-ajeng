<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Transaksi::all();
        return view('transaksi.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaksi.create',[
            'pelanggan' => Pelanggan::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Transaksi::create(
            [
                'transaksi_id_pelanggan' => $request->transaksi_id_pelanggan,
                'transaksi_tanggal' => $request->transaksi_tanggal
            ]
        );

        return redirect('transaksi')->with('success','Data berhasil ditambahkan');
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
        $row = Transaksi::findOrFail($id);
        return view('transaksi.edit', [
            'pelanggan' => Pelanggan::get()
        ],
        compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Transaksi::findOrFail($id);
        $row->update(
            [
                'transaksi_id_pelanggan' => $request->transaksi_id_pelanggan,
                'transaksi_tanggal' => $request->transaksi_tanggal
            ]
        );
        return redirect('transaksi')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Transaksi::findOrFail($id);
        $row->delete();

        return redirect('transaksi')->with('success', 'Data berhasil dihapus');
    }
}