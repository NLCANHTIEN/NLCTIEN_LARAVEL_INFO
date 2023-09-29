@extends('layouts.shop')
@section('content')
<x-shop.slideshow />
<x-shop.special-product-box type="new" title="New Products" />
<x-shop.special-product-box type="sale" title="Sale Products" />
@endsection