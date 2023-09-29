 @extends('layouts.admin')
 @section('content')

 <!-- Content Header (Page header) -->
 <section class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1>CHI TIẾT PRODUCTS</h1>
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
                 <!-- Default box -->
                 <div class="container-fluid animated fadeIn">


                     <div class="row">
                         <div class="col-md-8">


                             <div class="">
                                 <div class="card no-padding no-border">
                                     <table class="table table-striped mb-0">
                                         <tbody>
                                             <tr>
                                                 <td>
                                                     <strong>Cat name:</strong>
                                                 </td>
                                                 <td>
                                                     <span>
                                                         {{$product->product_name}}
                                                     </span>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>
                                                     <strong>Slug:</strong>
                                                 </td>
                                                 <td>
                                                     <span>
                                                         {{$product->slug}}
                                                     </span>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>
                                                     <strong>Parent:</strong>
                                                 </td>
                                                 <td>
                                                     <span>
                                                         {{$product->cat_id}}
                                                     </span>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>
                                                     <strong>Type:</strong>
                                                 </td>
                                                 <td>
                                                     <span>
                                                         {{$product->brand_id}}
                                                     </span>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>
                                                     <strong>Author:</strong>
                                                 </td>
                                                 <td>
                                                     <span>
                                                         {{$product->summary}}
                                                     </span>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>
                                                     <strong>Trash:</strong>
                                                 </td>
                                                 <td>
                                                     <span>
                                                         {{$product->detail}}
                                                     </span>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>
                                                     <strong>Status:</strong>
                                                 </td>
                                                 <td>
                                                     <span>
                                                         {{$product->price}}
                                                     </span>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>
                                                     <strong>Created:</strong>
                                                 </td>
                                                 <td>
                                                     <span data-order="2023-02-05 18:33:07">
                                                         {{$product->sale_price}}
                                                     </span>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>
                                                     <strong>Updated:</strong>
                                                 </td>
                                                 <td>
                                                     <span data-order="2023-02-05 11:57:22">
                                                         {{$product->image}}
                                                     </span>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td><strong>Actions</strong></td>
                                                 <td>
                                                     <a href="/admin/categories/{{$category->id}}/edit"><i class="fas fa-edit"></i></a>
                                                     <form action='/admin/categories/{{$category->id}}' method=post style='display:inline'>
                                                         {{method_field('DELETE')}}
                                                         {{csrf_field()}}
                                                         <button type='submit' style="border:none;color:red;"><i class="fas fa-trash-alt"></i></button>
                                                     </form>
                                                 </td>
                                             </tr>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>

                         </div>
                     </div>


                 </div>
                 <!-- /.card -->
             </div>
         </div>
     </div>
 </section>
 @endsection