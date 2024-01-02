@extends('admin.master', ['menu' => 'catbad', 'submenu' => 'category'])
@section('title', isset($title) ? $title : '')
@section('content')
    <div id="table-url" data-url="{{ route('admin.category') }}"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{__('Category')}}</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('Category')}}</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="customers__area bg-style mb-30">
                <div class="item-title">
                    <div class="col-xs-6">
                        <a href="{{route('admin.category.create')}}" class="btn btn-md btn-info">{{ __('Add Category')}}</a>
                    </div>
                </div>
                <!--<div class="item-title">-->
                <!--    <div class="col-xs-6">-->
                <!--        <a href="{{route('admin.category.sub.create')}}" class="btn btn-md btn-info">{{ __('Add sub sub Category')}}</a>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="customers__table">-->
                <!--    <table id="CategoryTable" class="row-border data-table-filter table-style">-->
                <!--        <thead>-->
                <!--        <tr>-->
                <!--            <th>{{ __('Category Name')}}</th>-->
                <!--            <th>{{ __('Category Slug')}}</th>-->
                <!--            <th>{{ __('Description')}}</th>-->
                <!--            <th>{{ __('Icon')}}</th>-->
                <!--            <th>{{ __('Status')}}</th>-->
                <!--            <th>{{ __('Action')}}</th>-->
                <!--        </tr>-->
                <!--        </thead>-->
                <!--        <tbody>-->
                <!--        </tbody>-->
                <!--    </table>-->

                <!--</div>-->

                <div class="table-responsive">
                  <table class="table align-middle">
                    <thead>
                      <tr>
                        <th>Category Name </th>
                        <th>Image</th>
                        <th>2 Step Category</th>
                        <th style="width: 70px;">Action </th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $category)
                            <tr>
                                <td width="10%" title="{{$category->position}}">{{$category->en_Category_Name}}</td>
                                <td width="10%">
                                    <img src="{{asset('uploaded_files/category/' .$category->CategoryImage)}}" alt="No Image Found"  class="img-fluid" style="height:; width:;">
                                </td>
                                @php
                                    $sub_categories = App\Models\Admin\Category::where('parent_id',$category->id)->get();
                                @endphp
                                 @if($sub_categories->count() > 0)
                                <td>
                                    <table class="table table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>2 Step  Category name </th>
                                                    <th>Image </th>
                                                    <th>3 Step Categories</th>
                    								<th style="width: 70px;"> Action </th>
                                                </tr>
                                            </thead>
                                                @foreach($sub_categories as $sub_category)
                                                <tbody>
                                                    <tr>
                                                        <td>{{$sub_category->en_Category_Name}}</td>
                                                        <td>
                                                            <img src="{{asset('uploaded_files/category/' .$sub_category->CategoryImage)}}" alt="No Image Found" style="height:; width:;">
                                                        </td>
                    									@php
                    										$sub_sub_categories = App\Models\Admin\Category::where('parent_id',$sub_category->id)->get();
                    									@endphp
                    									@if($sub_sub_categories->count() > 0)
                        									<td>


                        										<table class="table table-bordered table-responsive">
                        											<thead>
                        												<tr>
                        													<th>3 Step Category name </th>
                        													<th>Image </th>
                        													<th>4 Step Category </th>
                        													<th style="width: 70px;">Action</th>
                        												</tr>
                        											</thead>
                        											@foreach($sub_sub_categories as $sub_sub_category)
                        											    <tbody>
                        												<tr>
                        													<td>{{$sub_sub_category->en_Category_Name}}</td>
                        													<td>
                        														<img src="{{asset('uploaded_files/category/' .$sub_sub_category->CategoryImage)}}" alt="No Image Found" style="height:100px;width:100px;">
                        													</td>
                        													<td>
                        													    <table class="table table-bordered table-responsive">
                        											<thead>
                        												<tr>
                        													<th>4 Step Category  name</th>
                        													<th>Image </th>
                        													<!--<th>4 Step Category </th>-->
                        													<th style="width: 70px;">Action</th>
                        												</tr>
                        											</thead>
                        											@php
                                										$sub_sub_sub_categories = App\Models\Admin\Category::where('parent_id',$sub_sub_category->id)->get();
                                									@endphp
                        											@foreach($sub_sub_sub_categories as $sub_sub_sub_category)
                        											    <tbody>
                        												<tr>
                        													<td>{{$sub_sub_sub_category->en_Category_Name}}</td>
                        													<td>
                        														<img src="{{asset('uploaded_files/category/' .$sub_sub_sub_category->CategoryImage)}}" alt="No Image Found" style="height:100px;width:100px;">
                        													</td>

                        													<td>
                        														<!--@if ($sub_sub_sub_category->Status == 1) -->
                        														<!--		<a href="{{route('admin.category.inactive', $sub_sub_sub_category->id)}}" class="btn-action" title="Inactive"><i class="fas fa-toggle-on"></i></a>-->
                        														<!--@else -->
                        														<!--	   <a href="{{route('admin.category.active',  $sub_sub_sub_category->id)}}" class="btn-action" title="Active"><i class="fas fa-toggle-off"></i></a>-->
                        														<!--@endif-->
                        														<!--<form method="POST" action="{{route('admin.category.delete', $sub_sub_sub_category->id)}}">-->
                        														<!--    @csrf-->
                        														<!--	<a href="{{route('admin.category.edit', $sub_sub_sub_category->id)}}" class="btn-action" title="Edit"><i class="fas fa-pen-to-square"></i></a>-->


                        														<!--	<a href="#" class="show_confirm" title="Delete"><i class="fas fa-trash-alt"></i></a>-->
                        														<!--</form>-->

                        													    <form method="POST" action="{{route('admin.category.delete', $sub_sub_sub_category->id)}}">
                                                                                @csrf
                                                                                    <input name="_method" type="hidden" value="GET">
                                                                                    @if ($sub_sub_sub_category->Status == 1)


                                                                                        <a href="{{route('admin.category.inactive', $sub_sub_sub_category->id)}}" class="btn-action" title="Inactive"><i class="fas fa-toggle-on"></i></a>
                                                                                    @else
                                                                                           <a href="{{route('admin.category.active',  $sub_sub_sub_category->id)}}" class="btn-action" title="Active"><i class="fas fa-toggle-off"></i></a>
                                                                                    @endif

                                                                                    <!--<a href="{{route('admin.category.delete', $category->id)}}" class="btn-action" title="Delete"><i class="fas fa-trash-alt"></i></a>-->

                                                                                        <a href="{{route('admin.category.edit', $sub_sub_sub_category->id)}}" class="btn-action" title="Edit"><i class="fas fa-pen-to-square"></i></a>

                                            										    <a href="#" class="show_confirm" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                            									</form>
                        													</td>
                        												</tr>
                        											</tbody>
                        											@endforeach
                        										</table>



                        													</td>
                        													<td>
                        														<!--@if ($sub_sub_category->Status == 1) -->
                        														<!--		<a href="{{route('admin.category.inactive', $sub_sub_category->id)}}" class="btn-action" title="Inactive"><i class="fas fa-toggle-on"></i></a>-->
                        														<!--@else -->
                        														<!--	   <a href="{{route('admin.category.active',  $sub_sub_category->id)}}" class="btn-action" title="Active"><i class="fas fa-toggle-off"></i></a>-->
                        														<!--@endif-->
                        														<!--	<a href="{{route('admin.category.edit', $sub_sub_category->id)}}" class="btn-action" title="Edit"><i class="fas fa-pen-to-square"></i></a>-->
                        														<!--	<a href="{{route('admin.category.delete', $sub_sub_category->id)}}" class="btn-action" title="Delete"><i class="fas fa-trash-alt"></i></a>-->

                        														<form method="POST" action="{{route('admin.category.delete', $sub_sub_category->id)}}">
                                                                                @csrf
                                                                                    <input name="_method" type="hidden" value="GET">
                                                                                    @if ($sub_sub_category->Status == 1)


                                                                                        <a href="{{route('admin.category.inactive', $sub_sub_category->id)}}" class="btn-action" title="Inactive"><i class="fas fa-toggle-on"></i></a>
                                                                                    @else
                                                                                           <a href="{{route('admin.category.active',  $sub_sub_category->id)}}" class="btn-action" title="Active"><i class="fas fa-toggle-off"></i></a>
                                                                                    @endif

                                                                                    <!--<a href="{{route('admin.category.delete', $category->id)}}" class="btn-action" title="Delete"><i class="fas fa-trash-alt"></i></a>-->

                                                                                        <a href="{{route('admin.category.edit', $sub_sub_category->id)}}" class="btn-action" title="Edit"><i class="fas fa-pen-to-square"></i></a>

                                            										    <a href="#" class="show_confirm" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                            									</form>
                        													</td>
                        												</tr>
                        											</tbody>
                        											@endforeach
                        										</table>
                        									</td>
                        									@else
                        									<td>No sub sub Categpries Found </td>
                    									@endif
                    									<td>
                    										<!--@if ($sub_category->Status == 1) -->
                    										<!--		<a href="{{route('admin.category.inactive', $sub_category->id)}}" class="btn-action" title="Inactive"><i class="fas fa-toggle-on"></i></a>-->
                    										<!--@else -->
                    										<!--	   <a href="{{route('admin.category.active',  $sub_category->id)}}" class="btn-action" title="Active"><i class="fas fa-toggle-off"></i></a>-->
                    										<!--@endif-->
                    										<!--	<a href="{{route('admin.category.edit', $sub_category->id)}}" class="btn-action" title="Edit"><i class="fas fa-pen-to-square"></i></a>-->
                    										<!--	<a href="{{route('admin.category.delete', $sub_category->id)}}" class="btn-action" title="Delete"><i class="fas fa-trash-alt"></i></a>-->

                											<form method="POST" action="{{route('admin.category.delete', $sub_category->id)}}">
                                                            @csrf
                                                                <input name="_method" type="hidden" value="GET">
                                                                @if ($sub_category->Status == 1)


                                                                    <a href="{{route('admin.category.inactive', $sub_category->id)}}" class="btn-action" title="Inactive"><i class="fas fa-toggle-on"></i></a>
                                                                @else
                                                                       <a href="{{route('admin.category.active',  $sub_category->id)}}" class="btn-action" title="Active"><i class="fas fa-toggle-off"></i></a>
                                                                @endif

                                                                <!--<a href="{{route('admin.category.delete', $category->id)}}" class="btn-action" title="Delete"><i class="fas fa-trash-alt"></i></a>-->

                                                                    <a href="{{route('admin.category.edit', $sub_category->id)}}" class="btn-action" title="Edit"><i class="fas fa-pen-to-square"></i></a>

                        										    <a href="#" class="show_confirm" title="Delete"><i class="fas fa-trash-alt"></i></a>
                        									</form>
                    									</td>

                                                    </tr>
                                                </tbody>
                                                @endforeach

                                    </table>
                                </td>

                                @else
                                <td>No Subcategory Found</td>

                                @endif
                                <td>
                                    <form method="POST" action="{{route('admin.category.delete', $category->id)}}">
                                    @csrf
                                        <input name="_method" type="hidden" value="GET">
                                        @if ($category->Status == 1)


                                            <a href="{{route('admin.category.inactive', $category->id)}}" class="btn-action" title="Inactive"><i class="fas fa-toggle-on"></i></a>
                                        @else
                                               <a href="{{route('admin.category.active',  $category->id)}}" class="btn-action" title="Active"><i class="fas fa-toggle-off"></i></a>
                                        @endif

                                        <!--<a href="{{route('admin.category.delete', $category->id)}}" class="btn-action" title="Delete"><i class="fas fa-trash-alt"></i></a>-->

                                            <a href="{{route('admin.category.edit', $category->id)}}" class="btn-action" title="Edit"><i class="fas fa-pen-to-square"></i></a>

										    <a href="#" class="show_confirm" title="Delete"><i class="fas fa-trash-alt"></i></a>
									</form>
                                </td>

                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->
    @push('post_scripts')

        <script src="{{asset('backend/js/admin/datatables/category.js')}}"></script>
        <!-- Page level custom scripts -->
    @endpush
@endsection
