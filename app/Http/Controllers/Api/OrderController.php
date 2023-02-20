<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Order\OrderIndexRequest;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Http\Resources\Api\OrderCollection;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return OrderCollection
     */
    public function index(OrderIndexRequest $request)
    {
        $query = Order::query()->paginate($request->paginate, ['*'], 'page', $request->page);

        if ($request->date) {
            $query->orderByDesc('date');
        }
        $query->appends(['paginate' => $request->paginate, 'page' => $request->page]);


        return new OrderCollection($query);
    }

    public function show(Order $order)
    {
         return response()->json([
            'success'=>true,
             'date'=>$order,
        ]);
    }

    public function store(StoreOrderRequest $request)
    {
        Order::create($request->validated());
        return response()->json([
            'success'=>true,
        ]);
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->validated());
        return response()->json([
        'success'=>true,
        ]);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json([
            'success'=>true,
        ]);
    }
}
