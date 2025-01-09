<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Http\Requests\StoreLaporanRequest;
use App\Http\Requests\UpdateLaporanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return response()->json([
            'message' => 'success',
            'data' => Laporan::with('user')->get()
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
        //dd($request->all());
        $laporanValidated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'file_media' => 'nullable',
            'id_user' => 'required|exists:users,id',
        ],
        [
            'id_user.exists' => 'User not found'
        ]
    );
    //dd($laporanValidated);

        //fileupload
        if ($request->hasFile('file_media')) {
            $file = $request->file('file_media');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storePubliclyAs('laporan', $filename, 'public');
            $laporanValidated['file_media'] = 'laporan/' . $filename;
        }

        $laporan = Laporan::create([
            'judul' => $laporanValidated['judul'],
            'deskripsi' => $laporanValidated['deskripsi'],
            'tanggal' => $laporanValidated['tanggal'],
            'file_media' => $laporanValidated['file_media'] ?? null,
            'id_user' => $laporanValidated['id_user'],
        ]);

        //dd($laporan);
        return response()->json([
            'message' => 'success',
            'data' => $laporan
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Laporan $laporan)
    {
        //

        return response()->json([
            'message' => 'success',
            'data' => $laporan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laporan $laporan)
    {
        //

        $laporanValidated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'file_media' => 'nullable',
            'id_user' => 'required|exists:users,id',
        ]);

        $file_media = $laporan->file_media;
        //fileupload
        if ($request->hasFile('file_media')) {
            $file = $request->file('file_media');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storePubliclyAs('laporan', $filename, 'public');
            $file_media = 'laporan/' . $filename;

            //delete old file
            Storage::delete('public/' . $laporan->file_media);
        }

        $laporan->update([
            'judul' => $laporanValidated['judul'],
            'deskripsi' => $laporanValidated['deskripsi'],
            'tanggal' => $laporanValidated['tanggal'],
            'file_media' => $file_media,
            'id_user' => $laporanValidated['id_user'],
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $laporan
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laporan $laporan)
    {
        //

        $laporan->delete();

        return response()->json([
            'message' => 'success',
            'data' => $laporan
        ]);
    }
}
