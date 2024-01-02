<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoryRequest;
use App\Models\Admin\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function story(Request $request)
    {
        if ($request->ajax()) {
            
            $data = Story::latest()->get();
            
            return DataTables::of($data)->make(true);
        }
        
        // $data = Story::all();
        $data = Story::paginate(5);

        // dd($data);
        // $data['title'] = __('Category List');
        return view('admin.pages.story.index',compact('data'));
    }

    public function create()
    {
        return view('admin.pages.story.create');
    }

    public function store(StoryRequest $request)
    {
        $story_image = '';
        if (!empty($request->image)) {
            $story_image = fileUpload($request->image, StoryImage());
        }
        // dd($story_image);
        $story_image ;
        $fileName = null;
        if ($request->hasFile('video') && $request->file('video')->isValid()) {
            $file = $request->file('video');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploaded_files/videos'), $fileName);

            // Additional logic, such as storing the file path in the database, can be added here
        }
        // dd($story_image);
        // $story = Story::create([
        //     'title' => $request->title,
        //     'image' => $story_image,
        //     'video' => $fileName,
        // ]);
        $story = new Story;
        $story['title'] = $request->title;
        $story['image'] = $story_image;
        $story['video'] = $fileName;
        $story['product_url'] = $request->product_url;
        $story->save();

        if ($story) {
            return redirect()->route('admin.story.index')->with('success', __('Successfully Stored !'));
        }
        return redirect()->back()->with('error', __('Does not insert  !'));
    }

    public function datashow($id){
        
        $story = Story::findOrFail($id); 
        // $story = Story::all();
        return $story;

        
    }

    public function edit($id){
        $story = Story::findorFail($id);
        return view('admin.pages.story.edit', compact('story'));

    }

    public function delete($id){
        
        $delete = Story::Where('id', $id)->delete();
        if ($delete) {
            return redirect()->route('admin.story.index')->with('success', __('Successfully Deleted !'));
        }
        return redirect()->route('admin.story.index')->with('error', __('Does Not Delete!'));
    }


    public function update(Request $request){
        // dd($request->id);
        // $story_image = '';
        if (!empty($request->image)) {
            $story_image = fileUpload($request->image, StoryImage());
        }
        // dd($story_image);
        // $story_image ;
        $fileName = null;
        
        
        // $story = new Story;
        $story= Story::find($request->id);
        $pre_image= $story->image;
        // dd($pre_image);
        // dd($story);
        $story->title = $request->title;
        $story->image = $story_image ?? $pre_image;
        // $story->video = $fileName;
        $story->product_url = $request->product_url;
        $story->save();
        return redirect()->route('admin.story.index')->with('success', __('Successfully updated !'));

    }
    public function status($id){
        $story= Story::findorFail($id);
        // dd($story->status);
        if($story->status==1){
            $story->status = 0;
            $story->save();
        }else{
            $story->status = 1;
            $story->save();
        }
        // dd($story->status);
        return redirect()->route('admin.story.index')->with('success', __('Successfully change status !'));

    }
}
