@extends('admin.master', ['menu' => 'subcatbad', 'submenu' => 'category'])
@section('title', isset($title) ? $title : '')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{__('Add Sub Sub Category')}}</h2>
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
                                        <form enctype="multipart/form-data" method="POST" action="{{route('admin.category.store')}}">
                                            @csrf
                                            <div class="input__group mb-25">
                                                <label>{{ __(' Select Sub Category '.langString('en'))}}</label>
                                                <select class="form-select" aria-label="Default select example" name="parent_id">
                                                  <option value="0"> Open this select menu</option>
                                                  @foreach($categories as $category)
                                                  <option value="{{$category->id}}">{{$category->en_Category_Name}}</option>
                                                  @endforeach
                                                
                                                </select>
                                    
                                            </div>
                                            <div class="input__group mb-25">
                                                <label>{{ __('Sub Sub Category Name '.langString('en'))}}</label>
                                                <input type="text" id="en_category_name" name="en_category_name" value="{{ old('en_category_name') }}" placeholder="Name (English)">
                                            </div>
                                            {{-- <div class="input__group mb-25">
                                                <label>{{ __('Category Name '.langString('fr'))}}</label>
                                                <input type="text" id="fr_category_name" name="fr_category_name"  value="{{ old('fr_category_name') }}" placeholder="Name (Arabic)">
                                            </div> --}}
                                            <input type="hidden" name="is_featured" value="0">
                                            
                                            <!--<div class="input__group mb-25">-->
                                            <!--    <label>{{ __('Icon Class')}}</label>-->
                                            <!--    <input type="text" id="icon_class" name="icon_class" value="{{ old('icon_class') }}" placeholder="Icon">-->
                                            <!--</div>-->
                                            
                                            <!--<div class="input__group mb-25">-->
                                            <!--    <label>{{__('Description '.langString('en'))}}</label>-->
                                            <!--    <textarea name="en_description" id="en_description" placeholder="Description (English)">{{ old('en_description') }}</textarea>-->
                                            <!--</div>-->
                                            
                                            {{-- <div class="input__group mb-25">
                                                <label>{{__('Description '.langString('fr'))}}</label>
                                                <textarea name="fr_description" id="fr_description" placeholder="Description (Arabic)">{{ old('fr_description') }}</textarea>
                                            </div> --}}
                                            <div class="input__group mb-25">
                                                <label>{{ __('Category Image') }}</label>
                                                <input type="file" class="putImage2" name="categroy_image"
                                                    id="categoryimage">
                                                <img src="" id="target2" />
                                            </div>
                                            <div class="input__button">
                                                <button type="submit" class="btn btn-blue">{{ __('Add')}}</button>
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

