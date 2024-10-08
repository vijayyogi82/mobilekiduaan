<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Page;
use App\Models\BannerLocation;
use App\Models\Slider;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data['banners'] = Banner::with('page','location')->where('is_deleted',0)->get();
        $data['pages'] = Page::where('status',0)->get();
        $data['locations'] = BannerLocation::with('page')->where('status',0)->get();
        return view('admin.homes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.homes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $data  = new Banner();
        $data->page_id = $request->page_id;
        $data->location_id = $request->location_id;
        $data->status = $request->status ?? 0;
        if ($request->hasFile('image')) {
            $profileImage = $request->file('image');
            $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('banner'), $imageName);
            $data->image = 'banner/' . $imageName;
        }
        $data->save();
        return  redirect()->route('homes.index')->with('success', 'Banner Added Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['banner'] = Banner::find($id);
        $data['pages'] = Page::where('status',0)->get();
        $data['locations'] = BannerLocation::with('page')->where('status',0)->get();
        return view('admin.homes.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());

        $data  = Banner::find($id);
        $data->page_id = $request->page_id;
        $data->location_id = $request->location_id;
        $data->status = $request->status ?? 0;
        if ($request->hasFile('image')) {
            $profileImage = $request->file('image');
            $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('banner'), $imageName);
            $data->image = 'banner/' . $imageName;
        }
        $data->update();
        return  redirect()->route('homes.index')->with('success', 'Banner Added Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function banner_delete($id)
    {
        $data = Banner::find($id);
        if ($data) {
            $data->update(['is_deleted' => 1]);
            return redirect()->route('homes.index')->with('success', 'Banner deleted successfully');
        }
        return redirect()->route('homes.index')->with('error', 'Banner not found');
    }
    

    public function update_status($id)
    {
        $status = Banner::find($id);
        if ($status->status == 1) {
            $status->status = 0;
        } else {
            $status->status = 1;
        }
        $status->save();
        return $status->status;
    }


    public function banner_setting(){
        $data['pages'] = Page::where('status',0)->get();
        $data['locations'] = BannerLocation::with('page')->where('status',0)->get();
        return  view('admin.homes.banner_setting', $data);
    }

    public function banner_page_store(){
        $data = new Page();
        $data->name = request('name');
        $data->save();
        return redirect()->route('admin.banner.setting')->with('success', 'Page Added Successfull');
    }

    public function banner_location_store(){
        $data = new BannerLocation();
        $data->name = request('name');
        $data->page_id = request('page_id');
        $data->save();
        return redirect()->route('admin.banner.setting')->with('success', 'Location Added Successfull');
    }

    public function get_page(Request $request){
        $page_id = $request->page_id;
        $data['locations'] = BannerLocation::with('page')->where('page_id',$page_id)->get();
        $html = view('admin.homes.ajax_locations',$data)->render();
        echo $html;
    }


    // ------------------
    // sliders
    // ------------------
    public function banner_slider(){
        $data['sliders'] = Slider::where('status',0)->where('is_deleted',0)->get();
        return  view('admin.homes.slider', $data);
    }

    public function banner_slider_store(Request $request){
        $data  = new Slider();
        $data->status = $request->status ?? 0;
        if ($request->hasFile('image')) {
            $profileImage = $request->file('image');
            $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('banner'), $imageName);
            $data->image = 'banner/' . $imageName;
        }
        $data->save();
        return  redirect()->route('admin.banner.slider')->with('success', 'Slider Added Successfull');
    }

    public function banner_slider_edit($id)
    {
        $data['slider'] = Slider::find($id);
        // return $data['slider'];
        return view('admin.homes.slider_edit', $data);
    }

    public function banner_slider_update(Request $request, $id){
        $data  = Slider::find($id);
        $data->status = $request->status ?? 0;
        if ($request->hasFile('image')) {
            $profileImage = $request->file('image');
            $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('banner'), $imageName);
            $data->image = 'banner/' . $imageName;
        }
        $data->update();
        return  redirect()->route('admin.banner.slider')->with('success', 'Slider Added Successfull');
    }

    public function banner_slider_delete($id){
        $data = Slider::find($id);
        if ($data) {
            $data->update(['is_deleted' => 1]);
            return redirect()->route('admin.banner.slider')->with('success', 'Slider deleted successfully');
        }
        return redirect()->route('admin.banner.slider')->with('error', 'Slider not found');
    }

}
