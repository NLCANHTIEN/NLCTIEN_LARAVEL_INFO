 @extends('layouts.admin')
 @section('content')

 <!-- Content Header (Page header) -->
 <section class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1>PRODUCT LIST</h1>
             </div>
             <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item"><a href="#">Layout</a></li>
                     <li class="breadcrumb-item active">Fixed Layout</li>
                 </ol>
             </div>
         </div>
     </div><!-- /.container-fluid -->
 </section>

 <!-- Main content -->
 <section class="content">

     <div class="container-fluid">
         <div class="row">
             <div class="col-12">
                 <div class='text-secondary'>{!! \Session::get('success') !!}</div>
                 <div class="card-body">

                     <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                         <div class="row">
                             <div class="col-sm-12 col-md-6">
                                 <div class="dt-buttons btn-group flex-wrap"> <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Copy</span></button> <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>CSV</span></button> <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Excel</span></button> <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>PDF</span></button> <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1" type="button"><span>Print</span></button>
                                     <div class="btn-group"><button class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0" aria-controls="example1" type="button" aria-haspopup="true"><span>Column visibility</span><span class="dt-down-arrow"></span></button></div>
                                 </div>
                             </div>
                             <div class="col-sm-12 col-md-6">
                                 <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-12">
                                 <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                     <div>
                                         <a href='/admin/products/create' class="btn btn-success"> Create Category </a>
                                     </div>
                                     <thead>
                                         <tr>
                                             <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">Id</th>
                                             <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">Product name</th>
                                             <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">slug</th>
                                             <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">category id</th>
                                             <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">brand id</th>
                                             <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">summary</summary>
                                             </th>
                                             <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">image</th>
                                             <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">trash</th>
                                             <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">status</th>

                                             <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">Action</th>

                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach($products as $product)
                                         <tr class="odd">
                                             <td>{{$product->id}}</td>
                                             <td> {{$product->product_name}}</td>
                                             <td>{{$product->slug}}</td>
                                             <td>{{$product->cat_id}}</td>
                                             <td>{{$product->brand_id}}</td>
                                             <td>{!!nl2br($product->summary)!!}</td>
                                             <td><img src='/upload/images/{{$product->image}}' style='width:50px;height:50px'></td>
                                             <td>{{$product->trash}}</td>
                                             <td>{{$product->status}}</td>

                                             <td>
                                                 <a href="/admin/products/{{$product->id}}"><i class="fas fa-low-vision"></i></a>
                                                 <a href="/admin/products/{{$product->id}}/edit"><i class="fas fa-edit"></i></a>
                                                 <form action='/admin/products/{{$product->id}}' method=post style='display:inline'>
                                                     {{method_field('DELETE')}}
                                                     {{csrf_field()}}
                                                     <button type='submit' style="border:none;color:red;"><i class="fas fa-trash-alt"></i></button>
                                                 </form>
                                             </td>
                                         </tr>
                                         @endforeach
                                     </tbody>

                                 </table>
                             </div>
                         </div>
                         <div>
                             {!!
                             $products->withQueryString()->links('pagination::bootstrap-5')
                             !!}
                         </div>
                     </div>

                 </div>
             </div>
         </div>
     </div>
     </div>
 </section>
 @endsection