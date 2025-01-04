<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return response()->json([
            'message' => 'success',
            'data' => Jadwal::with('bus', 'halte')->get()
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

        $jadwalValidated = $request->validate([
            'id_bus' => 'required',
            'id_halte' => 'required',
            'waktuBerangkat' => 'required',
        ]);

        $jadwal = Jadwal::create([
            'id_bus' => $jadwalValidated['id_bus'],
            'id_halte' => $jadwalValidated['id_halte'],
            'waktuBerangkat' => $jadwalValidated['waktuBerangkat'],
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $jadwal
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        //
        return response()->json([
            'message' => 'success',
            'data' => $jadwal
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        //

        $jadwalValidated = $request->validate([
            'id_bus' => 'required',
            'id_halte' => 'required',
            'waktuBerangkat' => 'required',
        ]);

        $jadwal->update([
            'id_bus' => $jadwalValidated['id_bus'],
            'id_halte' => $jadwalValidated['id_halte'],
            'waktuBerangkat' => $jadwalValidated['waktuBerangkat'],
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $jadwal
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        //

        $jadwal->delete();

        return response()->json([
            'message' => 'success',
            'data' => $jadwal
        ]);
    }
}
