 @extends('layouts.admin')
 @section('content')

 <!-- Content Header (Page header) -->
 <section class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1>DANH MỤC CATEGORY</h1>
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
                                     <thead>
                                         <tr>
                                             <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">Id</th>
                                             <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">cat_name</th>
                                             <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">slug</th>
                                             <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">parent_id</th>
                                             <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">type</th>
                                             <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">author</th>
                                             <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">trash</th>
                                             <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">status</th>
                                             <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">deleted_at</th>
                                             <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">Action</th>

                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach($categories as $category)
                                         <tr class="odd">
                                             <td>{{$category->id}}</td>
                                             <td> {{$category->cat_name}}</td>
                                             <td>{{$category->slug}}</td>
                                             <td>{{$category->parent_id}}</td>
                                             <td>{{$category->type}}</td>
                                             <td>{{$category->author}}</td>
                                             <td>{{$category->trash}}</td>
                                             <td>{{$category->status}}</td>
                                             <td>{{$category->delete_at}}</td>
                                             <td>
                                                 <a class='btn btn-primany' href='/admin/categories/restore/{{$category->id}}'>Restore</a>
                                                 <a class='btn btn-secondary' href='/admin/categories/remove/{{$category->id}}'>Delete</a>
                                             </td>
                                         </tr>
                                         @endforeach
                                     </tbody>

                                 </table>
                             </div>
                         </div>
                         <div>
                             {!!
                             $categories->withQueryString()->links('pagination::bootstrap-5')
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