<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the warehouses.
     */
    public function index()
    {
        $warehouses = Warehouse::all();
        return response()->json($warehouses);
    }

    /**
     * Store a newly created warehouse in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);

        $warehouse = Warehouse::create($request->all());

        return response()->json([
            'message' => 'Warehouse created successfully',
            'warehouse' => $warehouse,
        ], 201);
    }

    /**
     * Display the specified warehouse.
     */
    public function show(string $id)
    {
        $warehouse = Warehouse::find($id);
        
        if (!$warehouse) {
            return response()->json(['message' => 'Warehouse not found'], 404);
        }

        return response()->json($warehouse);
    }
    
    /**
     * Update the specified warehouse in storage.
     */
    public function update(Request $request, string $id)
    {
        $warehouse = Warehouse::find($id);

        if (!$warehouse) {
            return response()->json(['message' => 'warehouse not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'location' => 'sometimes|string|max:255',
        ]);

        $warehouse->update($request->all());

        return response()->json([
            'message' => 'Warehouse updated successfully',
            'warehouse' => $warehouse,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $warehouse = Warehouse::find($id);

        if (!$warehouse) {
            return response()->json(['message' => 'Warehouse not found'], 404);
        }

        $warehouse->delete();

        return response()->json(['message' => 'Warehouse deleted successfully']);
    }
}
