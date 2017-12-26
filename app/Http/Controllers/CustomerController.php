<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return response()->json($customers, 200);

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
        Customer::create($attr);
        return response()->json("success", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return response()->json($customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $attr = $request->all();
        $customer->update($attr);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json("success", 200);
    }


    public function getCustomerOrders(Customer $customer)
    {
        $customerOrders = $customer->orders;
        return response()->json($customerOrders);
    }

    public function getCustomerPayments(Customer $customer)
    {
        $customerPayments = $customer->payments;
        return response()->json($customerPayments);
    }

    public function storeCustomerOrder(Customer $customer,Request $request)
    {
        $customer->orders()->create($request->all());
        return response()->json("success",200);
    }


    public function storeCustomerPayment(Customer $customer,Request $request)
    {
        $customer->payments()->create($request->all());
        return response()->json("success",200);
    }
}
