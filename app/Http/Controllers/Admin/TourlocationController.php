<?php



namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Tourlocation;



class TourlocationController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $tourlocations =  Tourlocation::all();

        return view('admin.tourlocation.index', compact('tourlocations'));
    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $title = "abc";

        return view('admin.tourlocation.create', compact('title'));
    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $tourlocation = new Tourlocation();

        $tourlocation->title = $request->title;

        $tourlocation->description = $request->description;

        if ($request->hasFile('image')) {

            $request->file('image')->store('public/tourlocation');

            $tourlocation->image = $request->file('image')->hashName();
        }

        $tourlocation->save();

        return redirect()->route('tourlocation.index')->with('success', 'tourlocation created successfully');
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

        $tourlocation = Tourlocation::find($id);

        return view('admin.tourlocation.edit', compact('tourlocation'));
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

        $tourlocation = Tourlocation::find($id);

        $tourlocation->title = $request->title;

        $tourlocation->description = $request->description;

        if ($request->hasFile('image')) {

            $request->file('image')->store('public/tourlocation');

            $tourlocation->image = $request->file('image')->hashName();
        }

        $tourlocation->update();

        return redirect()->route('tourlocation.index')->with('success', 'tourlocation updated successfully');
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



    public function update_status($id)
    {



        $Tourlocation = Tourlocation::find($id);

        if ($Tourlocation->Status == 1) {

            $Tourlocation->Status = 0;
        } else {

            $Tourlocation->Status = 1;
        }

        $Tourlocation->save();

        return $Tourlocation->Status;
    }



    public function delete($id)

    {

        $Tourlocation = Tourlocation::where('id', $id)->delete();

        return redirect()->route('tourlocation.index')->with('sucess', 'Tour tourlocation deleted successfully');
    }
}
