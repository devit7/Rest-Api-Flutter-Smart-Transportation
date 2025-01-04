<?php

namespace App\Http\Controllers;

use App\Models\Halte;
use App\Http\Requests\StoreHalteRequest;
use App\Http\Requests\UpdateHalteRequest;
use Illuminate\Http\Request;

class HalteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return response()->json([
            'message' => 'success',
            'data' => Halte::all()
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

        $halteValidated = $request->validate([
            'namaHalte' => 'required',
            'lokasiHalte' => 'required',
        ]);

        $halte = Halte::create([
            'namaHalte' => $halteValidated['namaHalte'],
            'lokasiHalte' => $halteValidated['lokasiHalte'],
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $halte
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Halte $halte)
    {
        //
        return response()->json([
            'message' => 'success',
            'data' => $halte
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Halte $halte)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Halte $halte)
    {
        //

        $halteValidated = $request->validate([
            'namaHalte' => 'required',
            'lokasiHalte' => 'required',
        ]);

        $halte->update([
            'namaHalte' => $halteValidated['namaHalte'],
            'lokasiHalte' => $halteValidated['lokasiHalte'],
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $halte
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Halte $halte)
    {
        //

        $halte->delete();

        return response()->json([
            'message' => 'success',
            'data' => $halte
        ]);
    }
}
