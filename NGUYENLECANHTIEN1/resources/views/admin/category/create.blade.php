 @extends('layouts.admin')
 @section('content')

 <!-- Content Header (Page header) -->

 <section class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1>TẠO CATEGORY</h1>
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
                         <div class="col-md-8 bold-labels">



                             <form method="post" action="/admin/categories">
                                 {{csrf_field()}}


                                 <div class="card">
                                     <div class="card-body row">
                                         <div class="form-group col-sm-12" element="div" bp-field-wrapper="true" bp-field-name="author" bp-field-type="text">
                                             <label>Author</label>

                                             <input type="text" name="author" value="" class="form-control">


                                         </div>
                                         <div class="form-group col-sm-12" element="div" bp-field-wrapper="true" bp-field-name="cat_name" bp-field-type="text">
                                             <label>Cat name</label>

                                             @error('cat_name')
                                             <div class="alert alert-danger">
                                                 {{$message}}
                                             </div>
                                             @enderror

                                             <input type=" text" name="cat_name" value="" class="form-control">


                                         </div>
                                         <div class="form-group col-sm-12" element="div" bp-field-wrapper="true" bp-field-name="parent_id" bp-field-type="number">
                                             <label>Parent</label>

                                             <select name='parent_id'>
                                                 <option value=0>---0----</option>
                                                 @php
                                                 $html='';
                                                 $subcategorie1s=$categories->filter(function($item){
                                                 return $item->type==0;
                                                 });
                                                 $subcategorie2s=$categories->filter(function($item){
                                                 return $item->type==1;
                                                 });


                                                 foreach($subcategorie1s as $category1){
                                                 $html.='<option value="'.$category1->id.'">'.$category1->cat_name.'</option>';

                                                 foreach($subcategorie2s as $category2){
                                                 if($category2->parent_id==$category1->id) $html.='<option value="'.$category2->id.'">--'.$category2->cat_name.'</option>';
                                                 }

                                                 };
                                                 echo $html;


                                                 @endphp

                                             </select>



                                         </div>
                                         <div class="form-group col-sm-12" element="div" bp-field-wrapper="true" bp-field-name="slug" bp-field-type="text">
                                             <label>Slug</label>
                                             @error('slug')
                                             <div class="alert alert-danger">
                                                 {{$message}}
                                             </div>
                                             @enderror
                                             <input type="text" name="slug" value="" class="form-control">


                                         </div>
                                         <div class="form-group col-sm-12" element="div" bp-field-wrapper="true" bp-field-name="status" bp-field-type="boolean">
                                             <input type="hidden" name="status" value="0">
                                             <input type="checkbox" data-init-function="bpFieldInitCheckbox" id="checkbox_592215" data-initialized="true">
                                             <label class="font-weight-normal mb-0" for="checkbox_592215">Status</label>


                                         </div>








                                         <div class="form-group col-sm-12" element="div" bp-field-wrapper="true" bp-field-name="trash" bp-field-type="boolean">
                                             <input type="hidden" name="trash" value="0">
                                             <input type="checkbox" data-init-function="bpFieldInitCheckbox" id="checkbox_235209" data-initialized="true">
                                             <label class="font-weight-normal mb-0" for="checkbox_235209">Trash</label>


                                         </div>








                                         <div class="form-group col-sm-12" element="div" bp-field-wrapper="true" bp-field-name="type" bp-field-type="number">
                                             <label>Type</label>

                                             <select name='type'>
                                                 <option value=0>0</option>
                                                 <option value=1>1</option>
                                                 <option value=2>2</option>
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

                                         <div class="btn-group" role="group">
                                             <button id="bpSaveButtonsGroup" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span><span class="sr-only">▼</span></button>
                                             <div class="dropdown-menu" aria-labelledby="bpSaveButtonsGroup">
                                                 <button type="button" class="dropdown-item" data-value="save_and_edit">Save and edit this item</button>
                                                 <button type="button" class="dropdown-item" data-value="save_and_new">Save and new item</button>
                                                 <button type="button" class="dropdown-item" data-value="save_and_preview">Save and preview</button>
                                             </div>
                                         </div>

                                     </div>

                                     <a href="http://chuthimai.test/ad/category" class="btn btn-default"><span class="la la-ban"></span> &nbsp;Cancel</a>

                                 </div>

                             </form>
                         </div>
                     </div>



                 </div>
                 <!-- /.card -->
             </div>
         </div>
     </div>
 </section>
 @endsection