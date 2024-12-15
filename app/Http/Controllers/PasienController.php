<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all patients
        $pasiens = Pasien::all();
        return response()->json($pasiens);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:10',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:15',
        ]);

        // Create new patient
        $pasien = Pasien::create($validated);

        return response()->json($pasien, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Fetch a single patient
        $pasien = Pasien::findOrFail($id);
        return response()->json($pasien);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validated = $request->validate([
            'nama' => 'sometimes|string|max:100',
            'tanggal_lahir' => 'sometimes|date',
            'jenis_kelamin' => 'sometimes|string|max:10',
            'alamat' => 'sometimes|string',
            'nomor_telepon' => 'sometimes|string|max:15',
        ]);

        // Update patient details
        $pasien = Pasien::findOrFail($id);
        $pasien->update($validated);

        return response()->json($pasien);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Delete a patient
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return response()->json(['message' => 'Pasien deleted successfully']);
    }
}
