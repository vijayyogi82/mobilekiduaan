<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Socialmedia;

class SocialmediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $socialmedias = Socialmedia::all();
        return view('admin.socialmedia.index', compact('socialmedias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $platform_name = "abc";
        return view('admin.socialmedia.create', compact('platform_name'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $socialmedia = new Socialmedia();
        $socialmedia->platform_name = $request->platform_name;
        $socialmedia->platform_url = $request->platform_url;
        $socialmedia->save();
        return redirect()->route('socialmedia.index')->with('success', 'Social Media Created Successfully');
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
        $socialmedia = Socialmedia::find($id);
        return view('admin.socialmedia.edit', compact('socialmedia'));
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
        $socialmedia = Socialmedia::find($id);
        $socialmedia->platform_name = $request->platform_name;
        $socialmedia->platform_url = $request->platform_url;
        $socialmedia->update();
        return redirect()->route('socialmedia.index')->with('success', 'Social Media Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

    }

    public function delete($id)
    {
        $socialmedia = Socialmedia::where('id', $id)->delete();
        return redirect()->route('socialmedia.index')->with('sucess', 'Social Media Deleted successfully');
    }
    
}