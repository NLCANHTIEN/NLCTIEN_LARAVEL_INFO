@extends('layouts.shop')
@section('content')
<div class="row">
    <div class="span12">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li class="active">Check Out</li>
        </ul>
        <div class="well well-small">
            <h1>Check Out <small class="pull-right"> {{Cart::count()}} Items are in the cart </small></h1>
            <hr class="soften">

            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Description</th>
                        <th>Unit price</th>
                        <th>Qty </th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Cart::content() as $row)
                    <tr>
                        <td><img width="100" src="{{asset('upload/images/'.$row-> options->image)}}" alt=""></td>
                        <td>{{$row->name}}</td>


                        <td>{{$row->price}}</td>
                        <td>
                            <input class="span1" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text" value="{{$row->qty}}">
                            <div class="input-append">
                                <a href='dec-cart/{{$row->rowId}}' class="btn btn-mini" type="button">-</a><a href='inc-cart/{{$row->rowId}}' class="btn btn-mini" type="button"> + </a><a href='/delete-cart/{{$row->rowId}}' class="btn btn-mini btn-danger" type="button"><span class="icon-remove"></span></a>
                            </div>
                        </td>
                        <td>{{$row->price*$row->qty}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="alignR">Total products: </td>
                        <td> $ {{Cart::total()}} </td>
                    </tr>



                </tbody>
            </table><br>




            <a href="products.html" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping </a>
            <a href="/checkout" class="shopBtn btn-large pull-right">Checkout <span class="icon-arrow-right"></span></a>

        </div>
    </div>
</div>
@endsection