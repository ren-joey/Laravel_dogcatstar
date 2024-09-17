<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
     public function index()
     {
         $orders = Order::all();
         return response()->json($orders);
     }

     public function userOrders(Request $request)
     {
         $user = $request->user();
         $orders = $user->orders;
         return response()->json($orders);
     }

     public function store(Request $request)
     {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $order = $request->user()->orders()->create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return response()->json($order, 201);
     }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric|min:0',
        ]);

        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found.'], 404);
        }

        if ($order->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $order->fill($request->only(['name', 'price']));
        $order->save();

        return response()->json(['message' => 'Order updated successfully.', 'order' => $order], 200);
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found.'], 404);
        }

        if ($order->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $order->delete();

        return response()->json(['message' => 'Order deleted successfully.'], 200);
    }
}