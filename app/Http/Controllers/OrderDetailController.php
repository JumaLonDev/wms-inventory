<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the order details.
     */
    public function index()
    {
        $ordersDetails = OrderDetail::all();
        return response()->json($ordersDetails);
    }

    /**
     * Store a newly created order detail in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $orderDatail = OrderDetail::create($request->all());

        return response()->json([
            'message' => 'Order detail created successfully',
            'orderDetail' => $orderDatail,
        ], 201);
    }

    /**
     * Display the specified order detail.
     */
    public function show(string $id)
    {
        $orderDetail = OrderDetail::find($id);

        if (!$orderDetail) {
            return response()->json(['message' => 'Order detail not found'], 404);
        }

        return response()->json($orderDetail);
    }

    /**
     * Update the specified order detail in storage.
     */
    public function update(Request $request, string $id)
    {
        $orderDetail = OrderDetail::find($id);

        if (!$orderDetail) {
            return response()->json(['message' => 'Order detail not found'], 404);
        }

        $request->validate([
            'quantity' => 'sometimes|integer|min:1',
            'price' => 'sometimes|numeric|min:0',
        ]);

        $orderDetail->update($request->all());

        return response()->json([
            'message' => 'Order detail updated successfully',
            'orderDetail' => $orderDetail,
        ]);
    }

    /**
     * Remove the specified order detail from storage.
     */
    public function destroy(string $id)
    {
        $orderDetail = OrderDetail::find($id);
        
        if (!$orderDetail) {
            return response()->json(['message' => 'Order detail not found'], 404);
        }

        $orderDetail->delete();
        
        return response()->json(['message' => 'Order detail deleted successfully']);
    }
}
