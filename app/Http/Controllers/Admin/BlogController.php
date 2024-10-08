<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data['blogs'] = Blog::where('status',0)->where('is_deleted',0)->get();
        return view('admin.blogs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.blogs.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Blog();
        $data->title = $request->title;
        $data->description = $request->description;
        if ($request->hasFile('image')) {
            $profileImage = $request->file('image');
            $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('blog'), $imageName);
            $data->image = 'blog/' . $imageName;
        }
        $data->save();
        return redirect()->route('blogs.index')->with('success', 'Created Successfully');
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
        $data['data'] = Blog::find($id);
        return view('admin.blogs.edit',$data);
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
        $data = Blog::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        if ($request->hasFile('image')) {
            $profileImage = $request->file('image');
            $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('blog'), $imageName);
            $data->image = 'blog/' . $imageName;
        }
        $data->update();
        return redirect()->route('blogs.index')->with('success', 'Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $data = Blog::find($id);
        if ($data) {
            $data->update(['is_deleted' => 1]);
        }
        return redirect()->route('blogs.index')->with('success', 'deleted successfully');
    }
    
}