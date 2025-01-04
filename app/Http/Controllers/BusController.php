<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Http\Requests\StoreBusRequest;
use App\Http\Requests\UpdateBusRequest;
use Illuminate\Http\Request;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json([
            'message' => 'success',
            'data' => Bus::all()
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
        $busValidated = $request->validate([
            'namaBus' => 'required',
            'kapasitasPenumpang' => 'required',
            'harga' => 'required',
        ]);

        $bus = Bus::create([
            'namaBus' => $busValidated['namaBus'],
            'kapasitasPenumpang' => $busValidated['kapasitasPenumpang'],
            'harga' => $busValidated['harga'],
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $bus
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Bus $bus)
    {
        //

        return response()->json([
            'message' => 'success',
            'data' => $bus
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bus $bus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bus $bus)
    {
        //

        $busValidated = $request->validate([
            'namaBus' => 'required',
            'kapasitasPenumpang' => 'required',
            'harga' => 'required',
        ]);

        $bus->update([
            'namaBus' => $busValidated['namaBus'],
            'kapasitasPenumpang' => $busValidated['kapasitasPenumpang'],
            'harga' => $busValidated['harga'],
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $bus
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bus $bus)
    {
        //

        $bus->delete();

        return response()->json([
            'message' => 'success',
            'data' => $bus
        ]);
    }
}
