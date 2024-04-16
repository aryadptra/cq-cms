<?php

namespace App\Http\Controllers;

use App\Models\MenuManagement;
use Illuminate\Http\Request;

class MenuManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menu-management.index', [
            'menus' => MenuManagement::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu-management.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'name' => 'required',
            'url' => 'required',
            'position' => 'required',
        ]);

        // Store
        MenuManagement::create($request->all());

        // Redirect
        return redirect()->route('menus.index')->with('success', 'Menu created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuManagement $menuManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = MenuManagement::findOrFail($id);

        // dd($data);

        return view('menu-management.edit', [
            'menu' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $menuManagement)
    {
        // Validate
        $request->validate([
            'name' => 'required',
            'url' => 'required',
            'position' => 'required',
        ]);

        // Update
        MenuManagement::where('id', $menuManagement)->update([
            'name' => $request->name,
            'url' => $request->url,
            'position' => $request->position,
        ]);

        // Redirect
        return redirect()->route('menus.index')->with('success', 'Menu updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete
        MenuManagement::where('id', $id)->delete();

        // Redirect
        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully!');
    }
}
