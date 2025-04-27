<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservasiStoreRequest;
use App\Http\Requests\ReservasiUpdateRequest;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $reservasis = Reservasi::query();
            return DataTables::of($reservasis)->toJson();
        }
        return view('reservasi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reservasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservasiStoreRequest $request)
    {
        $data = $request->validated();

        $data['waktu_reservasi'] = date('H:i', strtotime($data['waktu_reservasi']));
        Reservasi::create($data);
        return redirect()->route('reservasi.index')->with('success', 'Reservasi Berhasil Ditambahkan');
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
    public function edit(Reservasi $reservasi)
    {
        return view('reservasi.edit', compact('reservasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservasiUpdateRequest $request, Reservasi $reservasi)
    {
        $data = $request->validated();
        $data['waktu_reservasi'] = date('H:i', strtotime($data['waktu_reservasi']));
        $reservasi->update($data);
        return redirect()->route('reservasi.index')->with('success', 'Reservasi Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservasi $reservasi)
    {
        $reservasi->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Reservasi Berhasil Dihapus',
        ]);
    }

    public function trashed()
    {
        if (request()->ajax()) {
            $reservasis = Reservasi::onlyTrashed()->getQuery();
            return DataTables::of($reservasis)->toJson();
        }
        return view('reservasi.restore');
    }

    public function restore(String $id)
    {
        Reservasi::withTrashed()->where('id', $id)->restore();
        return response()->json([
            'success' => true,
            'message' => 'Data Reservasi Berhasil Dipulihkan',
        ]);
    }
}
