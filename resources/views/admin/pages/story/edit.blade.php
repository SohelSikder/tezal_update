@extends('admin.master', ['menu' => 'story', 'submenu' => 'storylist'])
@section('title', isset($title) ? $title : '')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{__('Edit Story')}}</h2>
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
                                        <form enctype="multipart/form-data" method="POST" action="{{route('admin.story.update')}}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$story->id}}">
                                            <div class="input__group mb-25">
                                                <label>{{ __('Story Title ')}}</label>
                                                <input type="text" id="story_title" name="title" value="{{$story->title}}" placeholder="Title (English)">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label>{{ __('Product Url ')}}</label>
                                                <input type="text" id="product_url" name="product_url" value="{{$story->product_url}}" placeholder="">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label>{{ __('Image ')}}</label>
                                                <input type="file" id="story_image" name="image" value="{{$story->image}}" placeholder="Image (English)">
                                                <img src="{{asset('uploaded_files/story/'.$story->image)}}" style="height:100px;width:100px;" alt="No image found">
                                            </div>
                                            {{--<div class="input__group mb-25">
                                                <label>{{ __('Video ')}}</label>
                                                <input type="file" id="story_video" name="video" value="{{$story->video}}" placeholder="Video (English)">
                                                <video src="{{asset('uploaded_files/videos/'.$story->video)}}" style="height:100px;width:100px;"></video>
                                            </div>--}}

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

