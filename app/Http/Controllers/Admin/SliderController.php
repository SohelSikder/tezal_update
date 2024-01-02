<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function slider(Request $request)
    {
        $data = Slider::latest()->get();
        // if ($request->ajax()) {
        //     $data = Slider::latest()->get();
        //     return DataTables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('action', function ($data) {
        //             $btn = '<div class="action__buttons">';
        //             $btn = $btn . '<a href="' . route('admin.slider.edit', $data->id) . '" class="btn-action"><i class="fa-solid fa-pen-to-square"></i></a>';
        //             $btn = $btn . '<a href="' . route('admin.slider.delete', $data->id) . '" class="btn-action delete"><i class="fas fa-trash-alt"></i></a>';
        //             $btn = $btn . '</div>';
        //             return $btn;
        //         })
        //         ->editColumn('Background_Image', function ($data) {
        //             $url = asset(SliderImage() . $data->Background_Image);
        //             return '<img src=' . $url . ' border="0" width="80"class="img-rounded" align="center" />';
        //         })
        //         ->editColumn('Thumbnail', function ($data) {
        //             $url = asset(SliderImage() . $data->Thumbnail);
        //             return '<img src=' . $url . ' border="0" width="25" class="img-rounded" align="center" />';
        //         })
        //         ->editColumn('Title', function ($data) {
        //             return Str::limit($data->en_Title, 15);
        //         })
        //         ->editColumn('Sub_Title', function ($data) {
        //             return Str::limit($data->en_Sub_Title, 15);
        //         })
        //         ->editColumn('Description', function ($data) {
        //             return Str::limit($data->en_Description, 15);
        //         })
        //         ->editColumn('Button_Text', function ($data) {
        //             return Str::limit($data->en_Button_Text, 15);
        //         })
        //         ->rawColumns(['action', 'Background_Image', 'Thumbnail', 'Description', 'Title', 'Sub_Title', 'Button_Text'])
                
        //         ->make(true);
        // }
        // $data['title'] = __('Slider');
        // return view('admin.pages.slider.index', $data);
        
        return view('admin.pages.slider.index', compact('data'));
    }

    public function sliderCreate()
    {
        return view('admin.pages.slider.create');
    }

    public function sliderStore(SliderRequest $request)
    {
        //       return $request->all();
        if (!empty($request->background_image)) {
            $background_image = fileUpload($request['background_image'], SliderImage());
        } else {
            return redirect()->back()->with('error', __('Image is  required'));
        }
        
        if (!empty($request->background_image_mobile)) {
            $background_image_mobile = fileUpload($request['background_image_mobile'], SliderImage());
        }
        // if (!empty($request->thumbnail)) {
        //     $thumbnail = fileUpload($request['thumbnail'], SliderImage());
        // } else {
        //     return redirect()->back()->with('error', __('Image is  required'));
        // }
        $slider = Slider::create([
            // 'en_Title' => $request->en_title,
            // 'en_Sub_Title' => $request->en_sub_title,
            // 'en_Description' => $request->en_description,
            // 'en_Button_Text' => $request->en_btn_text,

            // 'fr_Title' => $request->fr_title,
            // 'fr_Sub_Title' => $request->fr_sub_title,
            // 'fr_Description' => $request->fr_description,
            // 'fr_Button_Text' => $request->fr_btn_text,

            
            'Background_Image' => $background_image,
            'background_image_mobile' => $background_image_mobile,
            'link' => $request->link
        ]);
        if ($slider) {
            return redirect()->route('admin.slider')->with('success', __('Successfully Stored !'));
        }
        return redirect()->back()->with('error', __('Does not insert  !'));
    }
    public function sliderEdit($id)
    {
        $edit = Slider::where('id', $id)->first();
        return view('admin.pages.slider.edit', compact('edit'));
    }
    public function sliderUpdate(Request $request)
    {
        
        $id = $request->id;
        $slider = Slider::where('id', $id)->first();
        if (!empty($request->background_image)) {
            $background_image = fileUpload($request['background_image'], SliderImage());
        } else {
            $background_image = $slider->Background_Image;
        }
         if (!empty($request->background_image_mobile)) {
            $background_image_mobile = fileUpload($request['background_image_mobile'], SliderImage());
            
        }else{
            $background_image_mobile = $slider->background_image_mobile;
        }
        if (!empty($request->thumbnail)) {
            $thumbnail = fileUpload($request['thumbnail'], SliderImage());
        } else {
            $thumbnail = $slider->Thumbnail;
        }
        $update = $slider->update([
            'Background_Image' => $background_image,
            'background_image_mobile' => $background_image_mobile,
            'link'=> $request->link,
            
        ]);
        if (!empty($update)) {
            return redirect()->route('admin.slider')->with('success', __('Successfully Update !'));
        }
        return redirect()->back()->with('error', __('Does not Update  !'));
    }
    public function sliderDelete($id)
    {
        $delete = Slider::Where('id', $id);
        if ($delete) {
            $delete->delete();
            return redirect()->route('admin.slider')->with('success', __('Successfully Deleted !'));
        }
        return redirect()->route('admin.about.us')->with('error', __('Does Not Delete!'));
    }
}
