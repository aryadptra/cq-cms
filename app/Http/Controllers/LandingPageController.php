<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendefinisikan kunci-kunci yang akan disimpan
        $keys = [
            'hero.title',
            'hero.subtitle',
        ];

        // Array untuk menyimpan hasil pencarian untuk setiap kunci
        $landings = [];

        // Loop melalui setiap kunci untuk menangani setiap kunci secara terpisah
        foreach ($keys as $key) {
            $landing = Landing::where('key', $key)->first(); // Cari kunci dalam tabel landing

            // Menambahkan hasil pencarian ke dalam array $landings
            $landings[$key] = $landing;
        }

        // Mengirimkan data ke view
        return view('landing.index', ['landings' => $landings]);
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
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
        ]);

        // Mendefinisikan kunci-kunci yang akan disimpan
        $keys = [
            'hero.title',
            'hero.subtitle',
        ];

        // Loop melalui setiap kunci untuk menangani setiap kunci secara terpisah
        foreach ($keys as $key) {
            $landing = Landing::where('key', $key)->first(); // Cari kunci dalam tabel landing

            if ($landing) {
                // Jika kunci sudah ada, update nilai yang sesuai
                $landing->update([
                    'value' => $request->input(str_replace('hero.', '', $key)), // Mengambil nilai dari request sesuai kunci
                ]);
            } else {
                // Jika kunci belum ada, buat entri baru
                Landing::create([
                    'key' => $key,
                    'value' => $request->input(str_replace('hero.', '', $key)), // Mengambil nilai dari request sesuai kunci
                ]);
            }
        }

        return redirect()->back()->with('success', 'Landing page updated successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
