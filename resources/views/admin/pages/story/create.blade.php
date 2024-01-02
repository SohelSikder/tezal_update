@extends('admin.master', ['menu' => 'story', 'submenu' => 'storylist'])
@section('title', isset($title) ? $title : '')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{__('Add Story')}}</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('Story')}}</li>
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
                                        <form enctype="multipart/form-data" method="POST" action="{{route('admin.story.store')}}">
                                            @csrf
                                            <div class="input__group mb-25">
                                                <label>{{ __('Story Title ')}}</label>
                                                <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Story title ">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label>{{ __('Upload image')}}</label>
                                                <input type="file" id="image" name="image" value="{{ old('image') }}" placeholder="Story image ">
                                            </div>
                                            {{--<div class="input__group mb-25">
                                                <label>{{ __('Upload video')}}</label>
                                                <input type="file" id="video" name="video" value="{{ old('video') }}" placeholder="Story video ">
                                            </div>--}}
                                            <div class="input__group mb-25">
                                                <label>{{ __('Product Url ')}}</label>
                                                <input type="text" id="url" name="product_url" value="{{ old('product_url') }}" placeholder="Product url for this story ">
                                            </div>
                                            {{-- <div class="input__group mb-25">
                                                <label>{{ __('Category Name '.langString('fr'))}}</label>
                                                <input type="text" id="fr_category_name" name="fr_category_name"  value="{{ old('fr_category_name') }}" placeholder="Name (Arabic)">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label>{{ __('Icon Class')}}</label>
                                                <input type="text" id="icon_class" name="icon_class" value="{{ old('icon_class') }}" placeholder="Icon">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label>{{__('Description '.langString('en'))}}</label>
                                                <textarea name="en_description" id="en_description" placeholder="Description (English)">{{ old('en_description') }}</textarea>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label>{{__('Description '.langString('fr'))}}</label>
                                                <textarea name="fr_description" id="fr_description" placeholder="Description (Arabic)">{{ old('fr_description') }}</textarea>
                                            </div> --}}
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

