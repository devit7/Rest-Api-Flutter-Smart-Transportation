<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return response()->json([
            'message' => 'success',
            'data' => Transaksi::with('user', 'bus', 'jadwal')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $transaksiValidated = $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_jadwal' => 'required|exists:jadwal,id',
            'status' => 'required',
            'tanggalTransaksi' => 'required',
        ]);

        $transaksi = Transaksi::create([
            'id_user' => $transaksiValidated['id_user'],
            'id_jadwal' => $transaksiValidated['id_jadwal'],
            'status' => $transaksiValidated['status'],
            'tanggalTransaksi' => $transaksiValidated['tanggalTransaksi'],
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $transaksi
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //

        return response()->json([
            'message' => 'success',
            'data' => $transaksi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //

        $transaksiValidated = $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_jadwal' => 'required|exists:jadwal,id',
            'status' => 'required',
            'statusPenumpang' => 'required|in:in,out',
            'tanggalTransaksi' => 'required',
        ]);

        $transaksi->update([
            'id_user' => $transaksiValidated['id_user'],
            'id_jadwal' => $transaksiValidated['id_jadwal'],
            'status' => $transaksiValidated['status'],
            'statusPenumpang' => $transaksiValidated['statusPenumpang'],
            'tanggalTransaksi' => $transaksiValidated['tanggalTransaksi'],
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $transaksi
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //

        $transaksi->delete();

        return response()->json([
            'message' => 'success',
            'data' => $transaksi
        ]);
    }
}
