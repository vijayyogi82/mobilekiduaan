<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mobile;
use App\Models\VendorBanner;
use App\Models\Product;
use App\Models\Accessory;
use Auth;
use Hash;
use Validator,Http;
use App\Models\LaravelSession;
use App\Models\Trending;
use App\Models\StoreViews;
use Illuminate\Support\Facades\Session;
use DB;

class VendorController extends Controller
{

    public function dashboard(){
        $vender_id = Auth::user()->id;
        $data['mobiles'] = Product::where('is_deleted', 0)->where('vender_id', $vender_id)->get();
        $data['refurbishedmobiles'] = Product::where('mobile_type', 1)->where('is_deleted', 0)->where('vender_id', $vender_id)->get();
    
        $storeViews = StoreViews::where('vendor_id', $vender_id)->get();
        $data['storeviews'] = StoreViews::where('vendor_id', $vender_id)->get();
    
        // $storeviewsData = [];

        $storeviewsData = [
            'labels' => [],
            'data' => []
        ];

        foreach ($storeViews as $view) {
            $storeviewsData['labels'][] = $view->created_at->format('Y-m-d');
            $storeviewsData['data'][] = (int) $view->views; 
        }
    
        $data['storeviewsJson'] = json_encode($storeviewsData);

        // echo '<pre>'; print_r($data['storeviewsJson']); echo '</pre>';
        // exit();

        return view('user.vendor.dashboard', $data);
    }


    public function account(){
        $user = Auth::user();
        return view('user.vendor.account_setting',compact('user'));
    }

    public function changePassword(){
        $user = Auth::user();
        return view('user.vendor.change_password',compact('user'));
    }

    public function accountSave(Request $request){
       $user = Auth::user();
       $user->name = $request->name;
       $user->phone = $request->phone;
       $user->dob = $request->dob;
       $user->city = $request->city;
       $user->state = $request->state;
       $user->address = $request->address;

       $address = 'india' . ', ' . $request->state . ', ' . $request->city. ', ' . $request->address;
       $apiKey = 'AIzaSyDiLSBLfNnZfHdLlDOzM75CiM9LyfY-XvY';
       $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
           'address' => $address,
           'key' => $apiKey
       ]);

       $data = $response->json();

       if ($response->successful() && $data['status'] == 'OK') {
           $location = $data['results'][0]['geometry']['location'];
           $latitude = $location['lat'];
           $longitude = $location['lng'];
       }
       else{
           $latitude = '';
           $longitude = '';
       }
       $user->latitude = $latitude;
       $user->longitude = $longitude;

       if ($request->hasFile('profile')) {
            $profileImage = $request->file('profile');
            $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('profile'), $imageName);
            $user->profile = 'profile/' . $imageName;
        }

       $user->update();
       return back()->with('success', 'Update successfully!');
    }

    public function changePasswordUpdate(Request $request){
        
        $user = Auth::user();
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return back()->with('success', 'Password changed successfully!');
        } else {
            return back()->with('error', 'Incorrect current password!');
        }

    }


    public function mobile(){
        $brands = Mobile::where('status','!=','Discontinued;')->where('is_deleted','0')->where('type','0')->select('brand')->distinct()->get();
        return view('user.vendor.mobile.create',compact('brands'));
    }

    public function mobileModelSearch(Request $request){
        $search = $request->brand;
        $mobiles = Mobile::where('brand',$search)->where('type','0')->where('is_deleted','0')->select('phone')->distinct()->get();
        $html = view('user.vendor.mobile.sreach_model',compact('mobiles'));
        return $html;
    }

    public function mobileModelSearchRefurbnished(Request $request){
        $search = $request->brand;
        $mobiles = Mobile::where('brand',$search)->where('type','0')->select('phone')->distinct()->get();
        $html = view('user.vendor.mobile.sreach_model',compact('mobiles'));
        return $html;
    }

    public function moblieData(Request $request){
        $search = $request->model;
        $type = $request->type;
        $mobiles = Mobile::where('phone',$search)->first();
        $vendor_id = Auth::user()->id;
        $chackMobile = Product::where('mobile_id',$mobiles->id)->where('is_deleted','0')->where('vender_id',$vendor_id)->first();
        $brands = Mobile::where('status','!=','Discontinued;')->where('type','0')->where('is_deleted','0')->select('brand')->distinct()->get();
        if($chackMobile){
           return response()->json(['mess' => 'this Model Already Add']);
        }
        else{
            $html = view('user.vendor.mobile.mobile_data',compact('mobiles','brands'));
            return $html;
        }
    }


    public function RefurbnishedmoblieData(Request $request){
        $search = $request->model;
        $type = $request->type;
        $mobiles = Mobile::where('phone',$search)->first();
        $vendor_id = Auth::user()->id;
        $chackMobile = Product::where('mobile_id',$mobiles->id)->where('is_deleted','0')->where('vender_id',$vendor_id)->first();
        $brands = Mobile::where('status','!=','Discontinued;')->where('is_deleted','0')->select('brand')->distinct()->get();
        if($chackMobile){
           return response()->json(['mess' => 'this Model Already Add']);
        }
        else{
            $html = view('user.vendor.mobile.used_mobile_data',compact('mobiles','brands'));
            return $html;
        }
    }

    public function moblieDataEdit(Request $request) {
        $search = $request->model;
        $type = $request->type;
        $mobiles = Mobile::where('phone', $search)->first();
        $vendor_id = Auth::user()->id;
        $chackMobile = Product::where('mobile_id',$mobiles->id)->where('vender_id',$vendor_id)->first();
        if($chackMobile){
           return response()->json(['mess' => 'this Model Already Add']);
        }
        else{
            if ($type == 'new') {
                $html = view('user.vendor.mobile.mobile_data_edit', compact('mobiles'));
            } else {
                $html = view('user.vendor.mobile.used_mobile_data_edit', compact('mobiles'));
            }
            return $html;
        }
    }
    

    public function mobileSave(Request $request){

        // return $request->all();

        $type = $request->type;
        if($type == 'used'){
            $list = Mobile::where('id',$request->mobile)->first();
            if($list){
                $Mobile =  new Mobile();
                $Mobile->phone = $request->model;
                $Mobile->brand = $request->brand;
                $Mobile->memory_internal = implode(';',$request->attribute);
                $allImages = [];
                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $key=>$imageFile) {
                        $profileImage = $imageFile;
                        $imageName = $key.time() . '.'. $profileImage->getClientOriginalExtension();
                        $profileImage->move(public_path('refubished'), $imageName);
                        $allImages[] = 'refubished/' . $imageName;
                    }
                }
                $Mobile->picture_url_big = implode(';',$allImages);
                $Mobile->network_techology = $list->network_techology;
                $Mobile->body_dimensions = $list->body_dimensions;
                $Mobile->body_weight = $list->body_weight;
                $Mobile->body_sim = $list->body_sim;
                $Mobile->display_type = $list->display_type;
                $Mobile->display_size = $list->display_size;
                $Mobile->main_camera_dual = $list->main_camera_dual;
                $Mobile->main_camera_features = $list->main_camera_features;
                $Mobile->battery_stand_by = $list->battery_stand_by;
                $Mobile->battery_talk_time = $list->battery_talk_time;
                $Mobile->misc_colors = $list->misc_colors;
                $Mobile->display_resolution = $list->display_resolution;
                $Mobile->display_protection = $list->display_protection;
                $Mobile->platform_chipset = $list->platform_chipset;
                $Mobile->platform_cpu = $list->platform_cpu;
                $Mobile->main_camera_single = $list->main_camera_single;
                $Mobile->features_sensors = $list->features_sensors;
                $Mobile->battery_other = $list->battery_other;
                $Mobile->main_camera_video = $list->main_camera_video;
                $Mobile->selfie_camera_single = $list->selfie_camera_single;
                $Mobile->selfie_camera_single = $list->selfie_camera_single;
                $Mobile->comms_bluetooth = $list->comms_bluetooth;
                $Mobile->type = '1';
                $Mobile->save();

                $Product = new Product();
                $Product->mobile_id = $Mobile->id;
                $Product->vender_id = Auth::user()->id;
                $Product->price = $request->price;
                $Product->brand = $request->brand;
                $Product->price_sale = $request->price_sale;
                $Product->is_featured = $request->has('is_featured') ;
                $Product->is_onsale = $request->has('is_onsale');
                $Product->memory_price = implode(';',$request->memory_price);
                $Product->memory_mrp = implode(';',$request->memory_mrp);
                $Product->category = 'Mobile';
                $Product->mobile_type = 1;
                $Product->save();
                return redirect()->route('vendor.used.mobile');
            }
        }
        else{
            $Product = new Product();
            $Product->mobile_id = $request->mobile;
            $Product->vender_id = Auth::user()->id;
            $Product->price = $request->price;
            $Product->brand = $request->brand;
            $Product->price_sale = $request->price_sale;
            $Product->is_featured = $request->has('is_featured') ;
            $Product->is_onsale = $request->has('is_onsale');

            $Product->memory_price = implode(';',$request->memory_price);
            $Product->memory_mrp = implode(';',$request->memory_mrp);

            $Product->category = 'Mobile';
            $Product->phone_offer = $request->phone_offer;
            $Product->save();
            return redirect()->route('vendor.mobileIndex');
        }

        
    }

    public function mobileIndex(){
        $vender_id = Auth::user()->id;
        $mobiles = Product::with(['Mobile' => function($query) {
            $query->select('id', 'phone', 'brand','status'); 
        }])
        ->where('vender_id', $vender_id)
        ->where('category','Mobile')
        ->where('mobile_type', 0)
        ->where('is_deleted', 0)
        ->orderBy('created_at','DESC')
        ->get();

        foreach ($mobiles as $mobile) {
            $mobile->views = Trending::where('product_id', $mobile->id)->count();
        }
            
        return view('user.vendor.mobile.index',compact('mobiles'));
    }

    public function mobileEdit($id){
        $vender_id = Auth::user()->id;
        $mobiles = Product::with(['Mobile' => function($query) {
            $query->select('id', 'phone', 'brand','status','memory_internal');
            }])
            ->where('vender_id', $vender_id)
            ->where('mobile_type', 0)
            ->find($id);
                                                                                                                                 
            if (!$mobiles) {
                return redirect()->back()->with('error', 'Mobile not found');
            }
            $brands = Mobile::where('status','!=','Discontinued;')->select('brand')->distinct()->get();
            $models = Mobile::where('brand', $mobiles->brand)->where('type', '0')->select('phone','id')->distinct()->get();
            
            // return ['mobiles'=>$mobiles,'models'=>$models];
            
            return view('user.vendor.mobile.new_mobile_edit',compact('mobiles','brands','models'));
    }

    public function mobileUpdate(Request $request, $id){
        
        // return $request->all();

        $vender_id = Auth::user()->id;
        $mobiles = Product::where('id',$id)->where('vender_id', $vender_id)->where('mobile_type', 0)->find($id);
        if (!$mobiles) {
            return redirect()->back()->with('error', 'Mobile not found');
        }
        $mobiles->memory_price = implode(';',$request->memory_price);
        $mobiles->memory_mrp = implode(';',$request->memory_mrp);
        $mobiles->phone_offer = $request->phone_offer;
        $mobiles->update();
    
        return redirect()->route('vendor.mobileIndex')->with('success', 'Mobile updated successfully');
        
    }

    public function mobileDelete($id){
        $vender_id = Auth::user()->id;
        $mobile = Product::where('vender_id', $vender_id)->where('mobile_type', 0)->find($id);
        // return  $mobile;
        if($mobile) {
            $mobile->update(['is_deleted' => 1]);
            return redirect()->route('vendor.mobileIndex')->with('success','Mobile deleted successfully');
        } else {
            return redirect()->route('vendor.mobileIndex')->with('error','Mobile not found');
        }
    }

    public function refurbishedMbile(){
        $vender_id = Auth::user()->id;
        $mobiles = Product::with(['Mobile' => function($query) {
            $query->select('id', 'phone', 'brand','status'); 
        }])
        ->where('vender_id', $vender_id)
        ->where('mobile_type', 1)
        ->where('is_deleted', 0)
        ->orderBy('created_at','DESC')
        ->get();

        foreach ($mobiles as $mobile) {
            $mobile->views = Trending::where('product_id', $mobile->id)->count();
        }
        
        return view('user.vendor.mobile.refurbished_mobile',compact('mobiles'));
    }

    public function refurbishedMobileEdit($id){
        $vender_id = Auth::user()->id;
        $mobiles = Product::with(['Mobile' => function($query) {
            $query->select('id', 'phone', 'brand','status','memory_internal');
            }])
            ->where('vender_id', $vender_id)
            ->where('mobile_type', 1)
            ->find($id);
            // return $mobiles;
            
            if (!$mobiles) {
                return redirect()->back()->with('error', 'Mobile not found');
            }
            $brands = Mobile::where('status','!=','Discontinued;')->select('brand')->distinct()->get();
            $models = Mobile::where('brand', $mobiles->brand)->where('type', '1')->select('phone','id')->distinct()->get();
            return view('user.vendor.mobile.refurbished_mobile_edit',compact('mobiles','brands','models'));
    }

    public function refurbishedMobileUpdate(Request $request, $id)
    {
        $vender_id = Auth::user()->id;
        $mobiles = Product::where('id',$id)->where('vender_id', $vender_id)->where('mobile_type', 1)->find($id);

        // return $mobiles;

        if (!$mobiles) {
            return redirect()->back()->with('error', 'Mobile not found');
        }

        $mobiles->memory_price = implode(';',$request->memory_price);
        $mobiles->memory_mrp = implode(';',$request->memory_mrp);
        $mobiles->phone_offer = $request->phone_offer;
        $mobiles->save();
    
        return redirect()->route('vendor.refurbished_mobile')->with('success', 'Mobile updated successfully');
        
    }

    public function refurbishedMobileDelete($id){
        $vender_id = Auth::user()->id;
        $mobile = Product::where('vender_id', $vender_id)->where('mobile_type', 1)->find($id);
        // return  $mobile;  
        if($mobile) {
            $mobile->update(['is_deleted' => 1]);
            return redirect()->route('vendor.refurbished_mobile')->with('success','Mobile deleted successfully');
        } else {
            return redirect()->route('vendor.refurbished_mobile')->with('error','Mobile not found');
        }
    }
    


    
    public function usedMobile(){
        $brands = Mobile::where('status','!=','Discontinued;')->where('is_deleted','0')->select('brand')->distinct()->get();
        return view('user.vendor.mobile.used_create',compact('brands'));
    }

    public  function viewProducts(){
        
        $vender_id = Auth::user()->id;

        $mobiles = Product::with(['Mobile' => function($query) {
            $query->select('id', 'phone', 'brand','status'); 
        }])  
        ->where('vender_id', $vender_id)
        ->where('mobile_type', 1)
        ->get();

        return view('user.vendor.mobile.view_products',compact('mobiles'));
    }

    public function  bannerCreate(){
        $vendor_id = Auth::user()->id;
        $banners = VendorBanner::where('vendor_id',$vendor_id)->where('is_deleted',0)->get();
        return view('user.vendor.banner.banner-create',compact('banners'));
    }

    public function bannerSave(Request $request)
    {
        if ($request->hasFile('croppedImage')) {
            $croppedImage = $request->file('croppedImage');
            $imageName = time() . '.' . $croppedImage->getClientOriginalExtension();
            $croppedImage->move(public_path('vendor-banner'), $imageName);
            $imagePath = 'vendor-banner/' . $imageName;
            $vendorBanner = VendorBanner::where('vendor_id', Auth::user()->id)
                        ->where('is_deleted', 0)
                        ->first();
            if ($vendorBanner) {
                $vendorBanner->img = $imagePath;
                $vendorBanner->update();
            } else {
                $newVendorBanner = new VendorBanner();
                $newVendorBanner->img = $imagePath;
                $newVendorBanner->vendor_id = Auth::user()->id;
                $newVendorBanner->save();
            }
        }
        return response()->json(['success' => true]);
    }

    public function  bannerDelete($id){
        $vendor_id = Auth::user()->id;
        $banners = VendorBanner::where('id',$id)->where('vendor_id',$vendor_id)->first();
        $banners->is_deleted = 1;
        $banners->update();
        return redirect()->back();
    }


    // Accessories
    public function  accessories(){
        $vender_id = Auth::user()->id;
        $products = Product::with('accessory')->where('vender_id', $vender_id)->where('category','accessory')->where('is_deleted','0')->orderBy('created_at', 'DESC')->get();
        return view('user.vendor.accessories.index',compact('products'));
    }

    public function  accessoriesCreate(){
        $accessories = Accessory::select('id','type')->get()->unique('type');
        return view('user.vendor.accessories.create',compact('accessories'));
    } 

    public function  accessoriesGetType(Request $request){
        $accessories = Accessory::select('type','brand','id')->where('type',$request->accrssory)->get()->unique('brand');
        $option = ['<option >Select Brand</option>'];
        foreach($accessories as $brand){
             $option [] = '<option value="'.$brand->brand.'">'.$brand->brand.'</option>';
             
        } 
        return $option;
    }

    public function  accessoriesGetBrand(Request $request){
        $accessories = Accessory::select('type','model_name','brand','id')->where('type',$request->accrssory)->where('brand',$request->brand)->get()->unique('model_name');
        $option = ['<option >Select Model</option>'];
        foreach($accessories as $model){
             $option [] = '<option value="'.$model->id.'">'.$model->model_name.'</option>';
        } 
        return $option;
    }

    public function accessoriesGetModel(Request $request){
        $accessories = Accessory::select('*')->where('id',$request->model)->first();
        $html =  view('user.vendor.accessories.accessories',compact('accessories'))->render();
        return $html;
    }

    public function accessoriesSave(Request $request){
        $Product = new Product();
        $Product->mobile_id = $request->mobile;
        $Product->vender_id = Auth::user()->id;
        $Product->brand = $request->brand;
        $Product->memory_price = $request->price;
        $Product->memory_mrp = $request->mrp;
        $Product->category = 'accessory';
        $Product->model = $request->accrssory;
        $Product->save();
        return redirect()->route('vendor.accessories');
    }

    public function accessoriesEdit($id){
        $products = Product::with('accessory')->where('id',$id)->where('category','accessory')->where('is_deleted','0')->orderBy('created_at', 'DESC')->first();
        return view('user.vendor.accessories.edit',compact('products'));
    }

    public function accessoriesUpdate(Request $request,$id){
        $vender_id = Auth::user()->id;
        $mobiles = Product::where('id',$id)->where('vender_id', $vender_id)->where('mobile_type', 0)->find($id);
        if (!$mobiles) {
            return redirect()->back()->with('error', 'Mobile not found');
        }
        $mobiles->memory_price = implode(';',$request->memory_price);
        $mobiles->memory_mrp = implode(';',$request->memory_mrp);
        $mobiles->update();
        return redirect()->route('vendor.accessories')->with('success', 'accessories updated successfully');
    }

    
    public function vendor_delete_image(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'key' => 'required|integer',
        ]);

        $user = User::find($request->id);
        if ($user) {
            $imagePath = public_path($user->profile);
            if (file_exists($imagePath)) {
                unlink($imagePath);
                $user->profile = null;
                $user->save();
                return response()->json(['success' => true, 'message' => 'Image deleted successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Image file not found'], 400);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'User record not found'], 404);
        }
    }



    // ------------
    // bulk mobiles
    // ------------
    public function bulk_mobiles_add(){
        $brands = Mobile::where('status','!=','Discontinued;')->where('is_deleted','0')->where('type','0')->select('brand')->distinct()->get();
        return view('user.vendor.bulkmobile.create',compact('brands'));
    }

    public function bulk_mobile_model_search(Request $request) {
        $search = $request->brand;
        $mobiles = Mobile::where('brand', $search)
            ->where('type', '0')
            ->where('is_deleted', '0')
            ->select('id', 'phone', 'memory_internal','picture_url_big')
            ->distinct()
            ->get();
        $html = view('user.vendor.bulkmobile.search_model', compact('mobiles'))->render();
        return response()->json($html);
    }


    public function bulk_mobiles_save(Request $request) {
        $data = $request->all();
        $vender_id = Auth::user()->id;
        $brand = isset($data['brand'][0]) ? $data['brand'][0] : '';
        
        foreach ($data['mobile'] as $key => $mobile) {
            if (is_array($mobile) && isset($mobile['mobile'])) {
                try {
                    $exists_mobile = Product::where('is_deleted',0)->where('vender_id', $vender_id)
                        ->where('mobile_id', (int) $mobile['mobile'])
                        ->first();
                        // dd($exists_mobile);

                        // i can insert who product which is_deleted 1 
                    if ($exists_mobile) {
                        continue; 
                    }
    
                    $memory_price_valid = $this->isValidMemoryArray($mobile['memory_price']);
                    $memory_mrp_valid = $this->isValidMemoryArray($mobile['memory_mrp']);
                    
                    if (!$memory_price_valid && !$memory_mrp_valid) {
                        continue; 
                    }
                    
                    $filtered_memory_price = $memory_price_valid ? array_filter($mobile['memory_price'], function($value) {
                        return !is_null($value) && $value !== '';
                    }) : [];
                    
                    $filtered_memory_mrp = $memory_mrp_valid ? array_filter($mobile['memory_mrp'], function($value) {
                        return !is_null($value) && $value !== '';
                    }) : [];
                    
                    $Product = new Product();
                    $Product->mobile_id = $mobile['mobile'];
                    $Product->vender_id = $vender_id;
                    $Product->brand = $brand;
                    $Product->memory_price = !empty($filtered_memory_price) ? implode(';', $filtered_memory_price) : '';
                    $Product->memory_mrp = !empty($filtered_memory_mrp) ? implode(';', $filtered_memory_mrp) : '';
                    $Product->category = 'Mobile';
                    $Product->phone_offer = !empty($data['phone_offer'][$key]) ? $data['phone_offer'][$key] : null;
    
                    // dd($Product); 
                    $Product->save();
                    return redirect()->route('vendor.mobileIndex')->with('success', 'Mobiles saved successfully.');
                } catch (\Exception $e) {
                    return redirect()->back()->withErrors(['message' => 'Error saving product: ' . $e->getMessage()])->withInput();
                }
            } else {
                return redirect()->back()->withErrors(['message' => 'Mobile ID is required for this type.']);
            }
        }
        return redirect()->route('vendor.mobileIndex')->with('success', 'Mobiles saved successfully.');
    }
    
    


    // ---------------------------
    // bulk refurbnished mobiles
    public function refurbnished_bulk_mobiles_add(){
        $brands = Mobile::where('status','!=','Discontinued;')->where('is_deleted','0')->where('type','0')->select('brand')->distinct()->get();
        return view('user.vendor.bulkmobile.refurbnished_create',compact('brands'));
    }

    public function refurbnished_bulk_mobile_model_search(Request $request) {
        $search = $request->brand;
        $mobiles = Mobile::where('brand', $search)
            ->where('type', '0')
            ->where('is_deleted', '0')
            ->select('id','phone','memory_internal','picture_url_big')
            ->distinct()
            ->get();
        $html = view('user.vendor.bulkmobile.refurbnished_search_model', compact('mobiles'))->render();
        return response()->json($html);
    }

    
    public function refurbnished_bulk_mobiles_save(Request $request)
    {   
        // dd($request->all());

        $data = $request->all();
        $mobiles = [];
        $brand = isset($data['brand'][0]) ? $data['brand'][0] : '';

        foreach ($data['mobile'] as $key => $mobile) {
            if (is_array($mobile) && isset($mobile['mobile'])) {
                
                $memory_price_valid = $this->isValidMemoryArray($mobile['memory_price']);
                $memory_mrp_valid = $this->isValidMemoryArray($mobile['memory_mrp']);
                
                if (!$memory_price_valid && !$memory_mrp_valid) {
                    continue; 
                }

                // Filter out empty values before imploding
                $filtered_memory_price = $memory_price_valid ? array_filter($mobile['memory_price'], function($value) {
                    return !is_null($value) && $value !== '';
                }) : [];

                $filtered_memory_mrp = $memory_mrp_valid ? array_filter($mobile['memory_mrp'], function($value) {
                    return !is_null($value) && $value !== '';
                }) : [];


                $list = Mobile::where('id', $data['mobile'])->first();
                // dd($list);

                if ($list) {
                    $Mobile = new Mobile();
                    $Mobile->phone = $mobile['model'];

                    // images
                    $allImages = [];
                    if ($request->hasFile("mobile.$key.image")) {
                        foreach ($request->file("mobile.$key.image") as $imageFile) {
                            $imageName = time() . '_' . uniqid() . '.' . $imageFile->getClientOriginalExtension();
                            $imageFile->move(public_path('refubished'), $imageName);
                            $allImages[] = 'refubished/' . $imageName;
                        }
                    }
                    $Mobile->picture_url_big = implode(';', $allImages);

                    $Mobile->network_techology = $list->network_techology;
                    $Mobile->body_dimensions = $list->body_dimensions;
                    $Mobile->body_weight = $list->body_weight;
                    $Mobile->body_sim = $list->body_sim;
                    $Mobile->display_type = $list->display_type;
                    $Mobile->display_size = $list->display_size;
                    $Mobile->main_camera_dual = $list->main_camera_dual;
                    $Mobile->main_camera_features = $list->main_camera_features;
                    $Mobile->battery_stand_by = $list->battery_stand_by;
                    $Mobile->battery_talk_time = $list->battery_talk_time;
                    $Mobile->misc_colors = $list->misc_colors;
                    $Mobile->display_resolution = $list->display_resolution;
                    $Mobile->display_protection = $list->display_protection;
                    $Mobile->platform_chipset = $list->platform_chipset;
                    $Mobile->platform_cpu = $list->platform_cpu;
                    $Mobile->main_camera_single = $list->main_camera_single;
                    $Mobile->features_sensors = $list->features_sensors;
                    $Mobile->battery_other = $list->battery_other;
                    $Mobile->main_camera_video = $list->main_camera_video;
                    $Mobile->selfie_camera_single = $list->selfie_camera_single;
                    $Mobile->comms_bluetooth = $list->comms_bluetooth;
                    $Mobile->type = '1';
                    $Mobile->save();

                    $Product = new Product();
                    $Product->mobile_id = $Mobile->id;
                    $Product->vender_id = Auth::user()->id;
                    $Product->price = $mobile['price'] ?? '';
                    $Product->brand = $brand; 
                    $Product->price_sale = $mobile['price_sale'] ?? '';
                    $Product->is_featured = $mobile['is_featured'] ?? 0;
                    $Product->is_onsale = $mobile['is_onsale'] ?? 0;

                    // Now implode after filtering
                    $Product->memory_price = !empty($filtered_memory_price) ? implode(';', $filtered_memory_price) : '';
                    $Product->memory_mrp = !empty($filtered_memory_mrp) ? implode(';', $filtered_memory_mrp) : '';

                    $Product->category = 'Mobile';
                    $Product->mobile_type = 1;
                    $Product->phone_offer = !empty($data['phone_offer'][$key]) ? $data['phone_offer'][$key] : null;
                    $Product->save();
                }
            } else {
                return redirect()->back()->withErrors(['message' => 'Mobile ID is required for this type.']);
            }
        }
        return redirect()->route('vendor.refurbished_mobile');
    }

    private function isValidMemoryArray($memoryArray) {
        if (!is_array($memoryArray)) {
            return false;
        }
        foreach ($memoryArray as $value) {
            if (!is_null($value) && strtolower(trim($value)) !== 'n.a' && strtolower(trim($value)) !== 'none') {
                return true;
            }
        }
        return false; 
    }
    




}