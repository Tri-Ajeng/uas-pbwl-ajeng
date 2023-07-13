<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pembayaran;
class pembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = pembayaran::all();
        return view('pembayaran.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pembayaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        pembayaran::create(
            [
                'kode_transaksi' => $request->kode_transaksi,
                'tgl_pembayaran' => $request->tgl_pembayaran
            ]
        );

        return redirect('pembayaran')->with('success','Data berhasil ditambahkan');
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
        $row = Pembayaran::findOrFail($id);
        return view('pembayaran.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Pembayaran::findOrFail($id);
        $row->update(
            [
                'kode_transaksi' => $request->kode_transaksi,
                'tgl_pembayaran' => $request->tgl_pembayaran
            ]
        );
        return redirect('pembayaran')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Pembayaran::findOrFail($id);
        $row->delete();

        return redirect('pembayaran')->with('success', 'Data berhasil dihapus');
    }
}