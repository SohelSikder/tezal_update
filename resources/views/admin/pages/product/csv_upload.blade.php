@extends('admin.master', ['menu' => 'products', 'submenu' => 'product'])
@section('title', isset($title) ? $title : '')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{ __('Product Bulk Upload') }}</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Product') }}</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="gallery__area bg-style">
                <div class="gallery__content">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                            <form enctype="multipart/form-data" method="POST" action="{{ route('admin.physical.product_import') }}">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-vertical__item bg-style">

                                            <input type="hidden" name="product_type" value="{{ PRODUCT_PHYSICAL }}">
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Category Name') }} @required</label>
                                                <select required class="form-control" id="category" name="en_category_name" onclick="subCategory()">
                                                    @php
                                                        $categories = App\Models\Admin\Category::where('parent_id', 0)->orderBy('position', 'asc')->get();
                                                    @endphp
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->en_Category_Name }}
                                                        </option>
                                                        @php
                                                            $subcategories = App\Models\Admin\Category::where('parent_id', $category->id)->get();
                                                        @endphp
                                                        @if (count($subcategories) > 0)
                                                            @foreach ($subcategories as $subCategory)
                                                                <option value="{{ $subCategory->id }}">-->{{ $subCategory->en_Category_Name }}</option>
                                                                @php
                                                                    $sub_subCategories = App\Models\Admin\Category::where('parent_id', $subCategory->id)->get();
                                                                @endphp
                                                                @if (count($sub_subCategories) > 0)
                                                                    @foreach ($sub_subCategories as $subSubCategory)
                                                                        <option value="{{ $subSubCategory->id }}">--->{{ $subSubCategory->en_Category_Name }}</option>
                                                                        @php
                                                                            $sub_sub_sub_categories = App\Models\Admin\Category::where('parent_id', $subSubCategory->id)->get();
                                                                        @endphp
                                                                        @if (count($sub_sub_sub_categories) > 0)
                                                                            @foreach ($sub_sub_sub_categories as $subsubsubCategory)
                                                                                <option value="{{ $subsubsubCategory->id }}">------>{{ $subsubsubCategory->en_Category_Name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="item-top mb-30">
                                                <h2>Upload CSV File @required</h2>
                                            </div>
                                            <div class="input__group mb-25">
                                            <input type="file" name="import_file" id="myDropify" class="@error('import_file') is-invalid @enderror dropify  mt-6">
                                            @error('import_file')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                            </div>

                                            <div class="input__button">
                                                <button type="submit" class="btn btn-blue">{{ __('Submit') }}</button>
                                            </div>

                                        </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@push('post_scripts')
    <script src="{{ asset('backend/js/admin/products/physical-add.js') }}"></script>
    <script>
        "use strict";
        $(document).ready(function() {
            $("#summernote").summernote({
                placeholder: 'Description',
                height: 300
            });
            $('.dropdown-toggle').dropdown();
        });

        $(document).ready(function() {
            $("#summernote2").summernote({
                placeholder: 'Shipping Return',
                height: 300
            });
            $('.dropdown-toggle').dropdown();
        });
        $(document).ready(function() {
            $("#summernote3").summernote({
                placeholder: 'Additional Information',
                height: 300
            });
            $('.dropdown-toggle').dropdown();
        });
        $(document).ready(function() {
            $("#summernote4").summernote({
                placeholder: 'Description',
                height: 300
            });
            $('.dropdown-toggle').dropdown();
        });

        $(document).ready(function() {
            $("#summernote5").summernote({
                placeholder: 'Shipping Return',
                height: 300
            });
            $('.dropdown-toggle').dropdown();
        });
        $(document).ready(function() {
            $("#summernote6").summernote({
                placeholder: 'Additional Information',
                height: 300
            });
            $('.dropdown-toggle').dropdown();
        });
    </script>

    <script>
        // Add event listener to category select element
        function subCategory() {
            var categoryId = $('#category').val();
            // console.log(categoryId);
            $.ajax({
                url: '/admin/product/physical/create/sub_cat_data',
                type: 'GET',
                data: {
                    categoryId: categoryId
                },
                success: function(response) {
                    // Populate subcategory select element with the returned subcategories
                    var subcategories = response.subcategories;
                    var subcategorySelect = $('#sub_category');

                    // Clear previous options
                    subcategorySelect.empty();

                    // Append new options
                    $.each(subcategories, function(index, subcategory) {
                        subcategorySelect.append('<option value="' + subcategory.id + '"  >' +
                            subcategory.en_Category_Name + '</option>');
                    });

                    // Show the subcategory select element
                    $('.subcategories').show();
                }

            });
        }

        function subSubCategory(){
            var subCategoryId = $('#sub_category').val();
            // console.log(subCategoryId);

            // $.ajax({
            //     url: '/admin/product/physical/create/sub_sub_cat_data',
            //     type: 'GET',
            //     data: {
            //         subCategoryId: subCategoryId
            //     },
            //     success: function(response) {
            //         // Populate subcategory select element with the returned subcategories
            //         var subcategories = response.subsubcategories;
            //         // console.log(subcategories);
            //         var subsubcategorySelect = $('#sub_sub_category');

            //         // Clear previous options
            //         subsubcategorySelect.empty();

            //         // Append new options
            //         $.each(subsubcategories, function(index, subsubcategories) {
            //             subsubcategorySelect.append('<option value="' + subsubcategories.id + '"  >' +
            //                 subsubcategories.en_Category_Name + '</option>');
            //         });

            //         // Show the subcategory select element
            //         $('.subsubcategories').show();
            //     }

            // });
            $.ajax({
    url: '/admin/product/physical/create/sub_sub_cat_data',
    type: 'GET',
    data: {
        subCategoryId: subCategoryId
    },
    success: function(response) {
        // Populate subcategory select element with the returned subcategories
        var subsubcategories = response.subsubcategories;
        var subsubcategorySelect = $('#sub_sub_category');

        // Clear previous options
        subsubcategorySelect.empty();

        // Append new options
        $.each(subsubcategories, function(index, subsubcategory) {
            subsubcategorySelect.append('<option value="' + subsubcategory.id + '">' + subsubcategory.en_Category_Name + '</option>');
        });

        // Show the subsubcategory select element
        $('.subsubcategories').show();
    }
});

        }
    </script>
@endpush
