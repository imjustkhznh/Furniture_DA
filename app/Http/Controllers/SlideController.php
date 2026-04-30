<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Redirect;
use Session;

class SlideController extends Controller
{
    public function slide_manager()
    {
        $slide_list = Slide::orderby('SlideID', 'DESC')->get();

        return view('admin.slider.slide-manager')->with(compact('slide_list'));
    }

    public function add_slide()
    {
        return view('admin.slider.add-slide');
    }

    public function add_slide_data(Request $request)
    {
        $data = $request->all();
        $slide = new Slide;
        $slide->SlideName = $data['SlideName'];
        $slide->SlideTitle = $data['SlideContent'];
        $slide->SlideContent = $data['SlideDes'];
        $slide->SlideStatus = $data['SlideStatus'];
        $GetImage = $request->file('SlideImage');
        if ($GetImage != null) {
            $Name = 'Slide-'.rand(0, 2000).'.'.$GetImage->getClientOriginalExtension();
            $GetImage->store($Name);
            $GetImage->move('public/Upload/Slide', $Name);
            $data['SlideImage'] = $Name;
            $slide->SlideImage = $data['SlideImage'];
            $slide->save();
            Session::put('message', 'Thêm slide thành công');

            return Redirect::to('/add-slide');
        } else {
            Session::put('message', 'Thêm slide thất bại');

            return Redirect::to('/add-slide');
        }
    }

    public function edit_slide($slideID)
    {
        $slide_ed = Slide::where('SlideID', $slideID)->first();

        return view('admin.slider.edit-slide')->with(compact('slide_ed'));
    }

    public function edit_slide_data(Request $request)
    {
        $data = $request->all();
        $slide = new Slide;
        $slide->SlideName = $data['SlideName'];
        $slide->SlideTitle = $data['SlideContent'];
        $slide->SlideContent = $data['SlideDes'];
        $slide->SlideStatus = $data['SlideStatus'];
        $GetImage = $request->file('SlideImage');
        if ($GetImage != null) {
            $Name = 'Slide-'.rand(0, 2000).'.'.$GetImage->getClientOriginalExtension();
            $GetImage->store($Name);
            $GetImage->move('public/Upload/Slide', $Name);
            $data['SlideImage'] = $Name;
            $slide->SlideImage = $data['SlideImage'];
        }
        $slide->update();
        Session::put('message', 'Thêm slide thành công');

        return Redirect::to('/slide-manager');
    }

    public function delete_slide($slideID)
    {
        $slide_del = Slide::where('SlideID', $slideID)->first();
        $slide_del->delete();
        Session::put('message', 'Xóa slide thành công');

        return Redirect::to('/slide-manager');
    }
}
