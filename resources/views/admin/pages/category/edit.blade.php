@extends('admin.master', ['menu' => 'catbad', 'submenu' => 'category'])
@section('title', isset($title) ? $title : '')
@section('content')
@php

$parent_categories = App\Models\Admin\Category::where('parent_id',0)->latest()->get();

@endphp
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{__('Edit Category')}}</h2>
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
            <div class="gallery__area bg-style">
                <div class="gallery__content">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-vertical__item bg-style">
                                        <form enctype="multipart/form-data" method="POST" action="{{route('admin.category.update')}}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$edit->id}}" >
                                            
                                            <div class="input__group mb-25">
                                                <label>{{ __(' Select Category ')}}</label>
                                                <select class="form-select" aria-label="Default select example" name="parent_id">
                                                  <option value="0">-- Select Category --</option>
                                                  @foreach($parent_categories as $category)
                                                  <option @if(optional($edit)->parent_id == $category->id) selected class="bg-success text-light" @endif value="{{$category->id}}"><b class="text-danger">{{$category->en_Category_Name}}</b></option>
                                                      @php
                                                        	$sub_categories = App\Models\Admin\Category::where('parent_id',$category->id)->get();
                                                      @endphp
                                                      @if(count($sub_categories) > 0)
                                                        @foreach($sub_categories as $subCategory)
                                                        <option @if(optional($edit)->parent_id == $subCategory->id) selected class="bg-success text-light" @endif value="{{$subCategory->id}}">-->{{$subCategory->en_Category_Name}}</option>
                                                         @php
                                                        	$sub_sub_categories = App\Models\Admin\Category::where('parent_id',$subCategory->id)->get();
                                                      @endphp
                                                        
                                                         @if(count($sub_sub_categories) > 0)
                                                            @foreach($sub_sub_categories as $subsubCategory)
                                                            <option @if(optional($edit)->parent_id == $subsubCategory->id) selected class="bg-success text-light" @endif value="{{$subsubCategory->id}}">---->{{$subsubCategory->en_Category_Name}}</option>
                                                            @endforeach
                                                        @endif
                                                        @endforeach
                                                      @endif
                                                  @endforeach
                                                </select>
                                            </div>
                                            
                                            <div class="input__group mb-25">
                                                <label>{{ __('Category Name ')}}</label>
                                                <input type="text" id="en_category_name" name="en_category_name" value="{{$edit->en_Category_Name}}" placeholder="Name">
                                            </div>
                                           <!-- <div class="input__group mb-25">
                                                <label>{{ __('Category Name '.langString('fr'))}}</label>
                                                <input type="text" id="fr_category_name" name="fr_category_name" value="{{$edit->fr_Category_Name}}" placeholder="Name (Bangla)">
                                            </div> -->
                                            <div class="input__group mb-25">
                                                <label>{{ __('Position ')}}</label>
                                                <input type="number" id="position" name="position" value="{{$edit->position}}" placeholder=" ">
                                            </div>
                                             
                                            <!--<div class="input__group mb-25">-->
                                            <!--    <label>{{ __('Icon Class')}}</label>-->
                                            <!--    <input type="text" id="icon_class" name="icon_class" value="{{$edit->Category_Icon}}" placeholder="Icon">-->
                                            <!--</div>-->
                                            <!--<div class="input__group mb-25">-->
                                            <!--    <label>{{__('Description '.langString('en'))}}</label>-->
                                            <!--    <textarea name="en_description" id="en_description" placeholder="Description (English)">{{$edit->en_Description}}</textarea>-->
                                            <!--</div>-->
                                            {{-- <div class="input__group mb-25">
                                                <label>{{__('Description '.langString('fr'))}}</label>
                                                <textarea name="fr_description" id="fr_description" placeholder="Description (Arabic)">{{$edit->fr_Description}}</textarea>
                                            </div> --}}
                                            <div class="input__group mb-25">
                                                <label>{{__('Is featured ')}}</label>
                                                <div class="custom-control custom-switch">
                                                    <input type="radio" value="1" name="is_featured" class="custom-control-input" id="customSwitch5"
                                                        {{ $edit->is_featured == 1 ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="customSwitch5">{{ __('Yes') }}</label>
                                                    <input type="radio" value="0" name="is_featured" class="custom-control-input" id="customSwitch6"
                                                        {{ $edit->is_featured == 0 ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="customSwitch6">{{ __('No') }}</label>
                                                </div>
                                            </div>
                                            
                                            <div class="input__group mb-25">
                                                <label>Is Active Home Products</label>
                                                <div class="custom-control custom-switch">
                                                    <input type="radio" value="1" {{ $edit->is_home_page_product == 1 ? 'checked' : '' }} name="is_home_page_product" class="custom-control-input" id="is_home_page_product_yes" >
                                                    <label class="custom-control-label"
                                                        for="is_home_page_product_yes">{{ __('Yes') }}</label>
                                                    <input type="radio" value="0" {{ $edit->is_home_page_product == 0 ? 'checked' : '' }} name="is_home_page_product" class="custom-control-input" id="is_home_page_product_no">
                                                    <label class="custom-control-label"
                                                        for="is_home_page_product_no">{{ __('No') }}</label>
                                                </div>
                                            </div>
                                            
                                            <div class="input__group mb-25">
                                                <label>{{ __('Category Image') }}</label>
                                                <input type="file" class="putImage2" name="categroy_image"
                                                    id="categoryimage">
                                                <img style="height:100px;width:100px;" src="{{ asset('uploaded_files/category/' . optional($edit)->CategoryImage) }}" id="target2" />
                                            </div>
                                            
                                            <div class="input__group mb-25">
                                                <label>{{ __('Category Banner') }}</label>
                                                <input type="file" class="putImage3" name="category_banner" id="categorybanner">
                                                <img style="height:100px;width:100px;" src="{{ asset('uploaded_files/category/' . optional($edit)->CategoryBanner) }}" id="target3" />
                                            </div>

                                            <div class="input__button">
                                                <button type="submit" class="btn btn-blue">{{ __('Update')}}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

