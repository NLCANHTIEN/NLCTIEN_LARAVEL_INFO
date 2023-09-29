<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ordersDetails = OrderDetail::all();
        return $ordersDetails;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return OrderDetail::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetail $orderDetail)
    {
        //
        return $orderDetail;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderDetail $orderDetail)
    {
        //
        return $orderDetail->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderDetail $orderDetail)
    {
        //
        return $orderDetail->delete();
    }

    public function remove(OrderDetail $orderDetail)
    {
        return  $orderDetail->forceDelete();
    }

    public function trash()
    {
        return OrderDetail::onlyTrashed()->paginate(25);
    }

    public function restore($id)
    {
        return  OrderDetail::withTrashed()->find($id)->restore();
    }
}
