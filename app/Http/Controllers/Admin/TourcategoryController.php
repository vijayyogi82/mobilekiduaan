<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tourcategory;

class TourcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $Tourcategorys =  Tourcategory::get();
        return view('admin.tourcategory.index', compact('Tourcategorys'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "abc";
        return view('admin.tourcategory.create', compact('title'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tourcategory = new Tourcategory();
        $tourcategory->title = $request->title;
        $tourcategory->description = $request->description;
        if ($request->hasFile('image')) {
            $request->file('image')->store('public/tourcategory');
            $tourcategory->image = $request->file('image')->hashName();
        }
        $tourcategory->save();
        return redirect()->route('tourcategory.index')->with('success', 'Tour Category Created Successfully');
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
        $tourcategory = Tourcategory::find($id);
        return view('admin.tourcategory.edit', compact('tourcategory'));
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
        $tourcategory = Tourcategory::find($id);
        $tourcategory->title = $request->title;
        $tourcategory->description = $request->description;
        if ($request->hasFile('image')) {
            $request->file('image')->store('public/tourcategory');
            $tourcategory->image = $request->file('image')->hashName();
        }
        $tourcategory->update();
        return redirect()->route('tourcategory.index')->with('success', 'Tour Category  Updated Successfully');
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



    public function update_status($id)
    {



        $Tourcategory = Tourcategory::find($id);

        if ($Tourcategory->Status == 1) {

            $Tourcategory->Status = 0;
        } else {

            $Tourcategory->Status = 1;
        }

        $Tourcategory->Save();

        return $Tourcategory->Status;
    }



    public function delete($id)
    {

        $tourcategory = Tourcategory::find($id)->delete();

        return redirect()->route('tourcategory.index')->with('success', 'Tour Category Delete successfully');
    }
}
