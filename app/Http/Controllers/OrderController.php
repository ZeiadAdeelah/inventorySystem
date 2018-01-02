<?php

namespace App\Http\Controllers;

use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Order::query();
        $format = 'd/m/Y';

        if ($request->has('orderDateFrom')) {
            $date = Carbon::createFromFormat($format, $request->get('orderDateFrom'));

            $query = $query->whereDate('order_date',
                '>=',
                $date);
        }
        if ($request->has('orderDateTo')) {
            $date = Carbon::createFromFormat($format, $request->get('orderDateTo'));

            $query = $query->whereDate(
                'order_date',
                '<=',
                $date
            );
        }
        if ($request->has('orderDueDateFrom')) {
            $date = Carbon::createFromFormat($format, $request->get('orderDueDateFrom'));

            $query = $query->whereDate(
                'order_due_date',
                '>=',
                $date
            );
        }
        if ($request->has('orderDueDateTo')) {
            $date = Carbon::createFromFormat($format, $request->get('orderDueDateTo'));

            $query = $query->whereDate(
                'order_due_date',
                '<=',
                $date
            );
        }

//dd($query->toSql());
        $orders = $query->get();
        return response()->json($orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = $request->all();
        Order::create($attr);
        return response()->json("success", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return response()->json($order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $attr = $request->all();
        $order->update($attr);
        return response()->json("success", 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json("success", 200);
    }
}
