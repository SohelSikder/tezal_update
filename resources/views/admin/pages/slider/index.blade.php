@extends('admin.master', ['menu' => 'slider_banner', 'submenu' => 'slider'])
@section('title', isset($title) ? $title : '')
@section('content')


    <div id="table-url" data-url="{{ route('admin.slider') }}"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{__('Slider')}}</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('Slider')}}</li>
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
                        <a href="{{route('admin.slider.create')}}" class="btn btn-md btn-info">{{ __('Add Slider')}}</a>
                    </div>
                </div>
                <!--<div class="customers__table">-->
                <!--    <table id="SliderTable" class="row-border data-table-filter table-style">-->
                <!--        <thead>-->
                <!--        <tr>-->
                <!--            <th>{{ __('Background Image')}}</th>-->
                <!--            <th>{{ __('Thumbnail')}}</th>-->
                <!--            <th>{{ __('Title')}}</th>-->
                <!--            <th>{{ __('Sub Title')}}</th>-->
                <!--            <th>{{ __('Description')}}</th>-->
                <!--            <th>{{ __('Button Text')}}</th>-->
                <!--            <th>{{ __('Action')}}</th>-->
                <!--        </tr>-->
                <!--        </thead>-->
                <!--        <tbody>-->
                <!--        </tbody>-->
                <!--    </table>-->
                <!--</div>-->
                <div class="customers__table">
                    <table id="" class="table table-responsive">
                        <thead>
                        <tr>
                            <th>{{ __('Background Image')}}</th>
                           
                            <th>{{ __('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $slider)
                                <tr>
                                    <td><img src="{{asset(SliderImage() . $slider->Background_Image)}}"></td>
                                    <td>
                                        <a href="{{route('admin.slider.edit', $slider->id)}}" class="btn-action"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{ route('admin.slider.delete', $slider->id) }}" class="btn-action delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr></tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
    <!--Row-->
    @push('post_scripts')
        <script src="{{asset('backend/js/admin/datatables/slider.js')}}"></script>
        <!-- Page level custom scripts -->
    @endpush
@endsection
