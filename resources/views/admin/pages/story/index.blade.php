@extends('admin.master', ['menu' => 'story', 'submenu' => 'storylist'])
@section('title', isset($title) ? $title : '')
@section('content')
    <div id="table-url" data-url="{{ route('admin.category') }}"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{__('Story')}}</h2>
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
            <div class="customers__area bg-style mb-30">
                <div class="item-title">
                    <div class="col-xs-6">
                        <a href="{{route('admin.story.create')}}" class="btn btn-md btn-info">{{ __('Add New Story')}}</a>
                    </div>
                </div>
                <div class="customers__table">
                    

                    {{-- <table id="StoryTable" class="row-border data-table-filter table-style">
                        <thead>
                        <tr>
                            <th>{{ __('Story Title')}}</th>
                            <th>{{ __('Image')}}</th>
                            <th>{{ __('Video ')}}</th>
                           
                            <th>{{ __('Status')}}</th>
                            <th>{{ __('Action')}}</th>
                        </tr>
                        
                        </thead>
                        <tbody>
                        </tbody>
                    </table> --}}

                    <table>
                        <tr>
                            <th>title</th>
                            <th>Image</th>
                            <th>Video </th>
                            {{-- <th>Status</th> --}}
                            <th>Action</th>
                        </tr>
                        
                        @foreach ($data as $story)
                        <tr>
                            <td>{{$story->title}}</td>
                            <td><img src="{{asset('uploaded_files/story/'.$story->image)}}" style="height:100px;width:100px;"alt="This is video story"></td>
                            <td>
                                <video  type='video/mp4' src="{{asset('uploaded_files/videos/'.$story->video)}}" style="width: 100px; height: 100px;"></video>
                            </td>
                           
                            <td>
                                <a href="{{route('admin.story.edit', $story->id) }}" class="btn-action" title="Edit"><i class="fas fa-pen-to-square"></i></a>
                                @if ($story->status==1)
                                <a href="{{route('admin.story.status', $story->id) }}" class="btn-action" title="Status"><i class="fas fa-toggle-on"></i></a>
                                @else
                                <a href="{{route('admin.story.status', $story->id) }}" class="btn-action" title="Status"><i class="fas fa-toggle-off"></i></a>
                                @endif
                                <a href="{{route('admin.story.delete', $story->id) }}" class="btn-action delete" title="Delete"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </table>
                    
                </div>
                <div class="d-flex justify-content-end mb-2 mt-2">
                    {{ $data->links() }}
                </div>
            </div>
            
        </div>
    </div>
    <!--Row-->
    @push('post_scripts')

        <script src="{{asset('backend/js/admin/datatables/story.js')}}"></script>
        <script src="">
            (function($) {
    "use strict";
    $(document).ready(function () {
        $('#StoryTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: $('#table-url').data("url"),
            columns: [
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'video',
                    name: 'video'
                },
               
                {
                    data: 'Status',
                    name: 'Status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
            ]
          
        });
    });
})(jQuery)


        </script>
        <!-- Page level custom scripts -->
    @endpush
@endsection
