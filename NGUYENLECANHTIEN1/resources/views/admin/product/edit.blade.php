@extends('layouts.admin')
@section('content')
<div class="container-fluid animated fadeIn">

    <div class="row">
        <div class="col-md-8 bold-labels">



            <form method="post" action="/admin/products/{{$product->id}}">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <div class="card">
                    <div class="card-body row">
                        <div class="form-group col-sm-12" element="div" bp-field-wrapper="true" bp-field-name="product_name" bp-field-type="text">
                            <label>Product name</label>
                            <span>
                                @error('product_name')
                                {{$message}}
                                @enderror
                            </span>

                            <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control">


                        </div>
                        <div class="form-group col-sm-12" element="div" bp-field-wrapper="true" bp-field-name="slug" bp-field-type="text">
                            <label>Slug</label>

                            <input type="text" name="slug" class="form-control" value='{{$product->slug}}'>


                        </div>
                        <div class="form-group col-sm-12" element="div" bp-field-wrapper="true" bp-field-name="brand_id" bp-field-type="text">
                            <label>Brand</label>
                            <select name='brand_id'>
                                @foreach($brands as $brand )
                                <option value='{{$brand->id}}' @if($product->brand_id==$brand->id)
                                    selected
                                    @endif

                                    >{{$brand->brand_name}}</option>
                                @endforeach
                            </select>




                        </div>
                        <div class="form-group col-sm-12" element="div" bp-field-wrapper="true" bp-field-name="parent_id" bp-field-type="number">
                            <label>Category</label>

                            <select name='cat_id'>

                                @php
                                $html='';
                                $subcategorie1s=$categories->filter(function($item){
                                return $item->type==0;
                                });
                                $subcategorie2s=$categories->filter(function($item){
                                return $item->type==1;
                                });
                                $subcategorie3s=$categories->filter(function($item){
                                return $item->type==2;
                                });


                                foreach($subcategorie1s as $category1){
                                if($product->cat_id==$category1->id)
                                $html.='<option value="'.$category1->id.'" selected>'.$category1->cat_name.'</option>';
                                else
                                $html.='<option value="'.$category1->id.'">'.$category1->cat_name.'</option>';
                                foreach($subcategorie2s as $category2){
                                if($category2->parent_id==$category1->id)
                                {
                                if($product->cat_id==$category2->id)

                                $html.='<option value="'.$category2->id.'" selected>--'.$category2->cat_name.'</option>';
                                else
                                $html.='<option value="'.$category2->id.'">--'.$category2->cat_name.'</option>';
                                foreach($subcategorie3s as $category3){

                                if($category3->parent_id==$category2->id)
                                if($product->cat_id==$category3->id)
                                $html.='<option value="'.$category3->id.'" selected>------'.$category3->cat_name.'</option>';
                                else
                                $html.='<option value="'.$category3->id.'">------'.$category3->cat_name.'</option>';
                                }

                                }

                                }

                                };
                                echo $html;


                                @endphp

                            </select>



                        </div>
                        <div class="form-group col-sm-12" element="div" bp-field-wrapper="true" bp-field-name="summary" bp-field-type="textarea">
                            <label>Summary</label>
                            <textarea name="summary" class="form-control">{{$product->summary}}</textarea>


                        </div>
                        <div class="form-group col-sm-12" element="div" bp-field-wrapper="true" bp-field-name="detail" bp-field-type="textarea">
                            <label>Detail</label>
                            <textarea name="detail" class="form-control">{{$product->detail}}</textarea>


                        </div>
                        <div class="form-group col-sm-12" element="div" bp-field-wrapper="true" bp-field-name="image" bp-field-type="text">
                            <label>Image</label>

                            <input type="text" name="image" value="{{$product->image}}" class="form-control">


                        </div>
                        <div class="form-group col-sm-12" element="div" bp-field-wrapper="true" bp-field-name="price" bp-field-type="text">
                            <label>Price</label>

                            <input type="number" name="price" value="{{$product->price}}" class="form-control">


                        </div>

                        <div class="form-group col-sm-12" element="div" bp-field-wrapper="true" bp-field-name="sale_price" bp-field-type="text">
                            <label>Sale price</label>

                            <input type="number" name="sale_price" value="{{$product->sale_price}}" class="form-control">


                        </div>
                        <div class="form-group col-sm-12" element="div" bp-field-wrapper="true" bp-field-name="type" bp-field-type="text">
                            <label>Type</label>

                            <input type="text" name="type" value="{{$product->type}}" class="form-control">


                        </div>
                        <div class="form-group col-sm-12" element="div" bp-field-wrapper="true" bp-field-name="status" bp-field-type="boolean">
                            <label class="font-weight-bold mb-0" for="checkbox_152422">Status</label>
                            <select name='status'>
                                <option value=1 @if($product->status==1)
                                    selected
                                    @endif
                                    >Hiện</option>
                                <option value=0 @if($product->status==0)
                                    selected
                                    @endif
                                    >Ẩn</option>
                            </select>




                        </div>



                    </div>
                </div>






                <div class="d-none" id="parentLoadedAssets">["bpFieldInitCheckbox"]</div>
                <div id="saveActions" class="form-group">

                    <input type="hidden" name="_save_action" value="save_and_back">
                    <div class="btn-group" role="group">

                        <button type="submit" class="btn btn-success">
                            <span class="la la-save" role="presentation" aria-hidden="true"></span> &nbsp;
                            <span data-value="save_and_back">Save and back</span>
                        </button>



                    </div>



                </div>

            </form>
        </div>
    </div>
</div>
@endsection