<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Hash;
use Auth;

class VendorAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data['vendors'] = User::where('role',1)->where('is_deleted', 0)->get();
        return view('admin.vendors.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data  = new User();
        $data->name  = $request->name;
        $data->email  = $request->email;
        $data->password  = Hash::make($request->password);
        $data->role  = 1;
        $data->dob  = $request->dob;
        $data->phone  = $request->phone;
        $data->shop_name  = $request->shop_name;
        $data->gst_number  = $request->gst_number;
        $data->state  = $request->state;
        $data->city  = $request->city;
        $data->address  = $request->address;
        $data->status = $request->status ?? 0;

        if ($request->hasFile('profile')) {
            $profileImage = $request->file('profile');
            $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('profile'), $imageName);
            $data->profile = 'profile/' . $imageName;
        }
        
        $data->save();
        return  redirect()->route('vendors.index')->with('success', 'Vendor Added Successfull');
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
        $data['vendor'] = User::find($id);
        return view('admin.vendors.edit', $data);
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
        //  dd($request->all());

        $data  = User::find($id);
        $data->name  = $request->name;
        $data->email  = $request->email;
        if($request->password){
            $data->password  = Hash::make($request->password);
        }
        $data->role  = 1;
        $data->dob  = $request->dob;
        $data->phone  = $request->phone;
        $data->shop_name  = $request->shop_name;
        $data->gst_number  = $request->gst_number;
        $data->state  = $request->state;
        $data->city  = $request->city;
        $data->address  = $request->address;
        $data->status = $request->status ?? 0;

        if ($request->hasFile('profile')) {
            $profileImage = $request->file('profile');
            $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('profile'), $imageName);
            $data->profile = 'profile/' . $imageName;
        }

        $data->update();
        return  redirect()->route('vendors.edit',$id)->with('success', 'Vendor Added Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $data = User::where('role', 1)->find($id);
        if ($data) {
            $data->update(['is_deleted' => 1]);
            return $data;
            return redirect()->route('vendors.index')->with('success', 'Vendor deleted successfully');
        }
        return redirect()->route('vendors.index')->with('error', 'Vendor not found');
    }

    
    public function vendor_delete($id)
    {
        $data = User::where('role', 1)->find($id);
        if ($data) {
            $data->update(['is_deleted' => 1]);
            return redirect()->route('vendors.index')->with('success', 'Vendor deleted successfully');
        }
        return redirect()->route('vendors.index')->with('error', 'Vendor not found');
    }
    

    public function update_status($id)
    {
        $status = User::find($id);
        if ($status->status == 1) {
            $status->status = 0;
        } else {
            $status->status = 1;
        }
        $status->save();
        return $status->status;
    }

    
    public function vendor_password($id)
    {
        $data['vendor'] = User::find($id);
        return view('admin.vendors.password', $data);
    }

    public function vendor_update_password(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);
        $vendor = User::findOrFail($id);
        $vendor->password = Hash::make($request->input('password'));
        $vendor->save();
        return redirect()->route('vendor.password', $id)->with('success', 'Password updated successfully!');
    }


    public function vendor_mobile_count()
    {
        // $today = Carbon::today();
        $today = date('Y-m-d');

        //  new mobiles vendor count
        $data['vendor_new_mobiles'] = Product::with(['user:id,name'])
            ->selectRaw('vender_id, count(id) as total_mobiles, MAX(mobile_id) as mobile_id')
            ->where('mobile_type', 0)
            ->where('is_deleted', 0)
            ->whereDate('created_at', $today)
            ->groupBy('vender_id')
            ->get();

        //  refurbished mobiles vendor count
        $data['vendor_refurbnished_mobiles'] = Product::with(['user:id,name'])
            ->selectRaw('vender_id, count(id) as total_mobiles, MAX(mobile_id) as mobile_id')
            ->where('mobile_type', 1)
            ->where('is_deleted', 0)
            ->whereDate('created_at', $today)
            ->groupBy('vender_id')
            ->get();

        // total new mobiles vendor
        $data['total_new_mobiles']   = Product::with(['user:id,name'])
            ->selectRaw('vender_id, count(id) as total_mobiles, MAX(mobile_id) as mobile_id')
            ->where('mobile_type', 0)
            ->where('is_deleted', 0)
            ->groupBy('vender_id')
            ->get();

        // total refurbished mobiles vendor
        $data['total_refurbnished_mobiles']   = Product::with(['user:id,name'])
            ->selectRaw('vender_id, count(id) as total_mobiles, MAX(mobile_id) as mobile_id')
            ->where('mobile_type', 1)
            ->where('is_deleted', 0)
            ->groupBy('vender_id')
            ->get();

        return view('admin.vendors.mobile_count', $data);
    }





    
}
