<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Visitor;
use App\Models\Subscription;
use App\Models\Mobile;
use App\Models\Contact;
use App\Models\LaravelSession;
use App\Models\Wishlist;
use App\Models\Plan;
use App\Models\StoreViews;
use App\Mail\EmailVerification;
use App\Models\Trending;
use App\Models\Accessory;
use App\Models\VendorBanner;
use App\Models\Blog;
use Mail;
use Illuminate\Support\Facades\Session;
use Http;
use Auth;
use Log;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $sessionExists = LaravelSession::where('laravel_session', $request->session()->getId())->first();
        if (!$sessionExists) {
            $LaravelSession = new LaravelSession();
            $LaravelSession->laravel_session = $request->session()->getId();
            $LaravelSession->save();
        }
        
        $mobiles = productHelper('Mobile',12,0);
        // Mobile Under ₹15K
        $under_fifteen_thousand = under_fifteen_thousand('Mobile',12,'14,000');
        // Refurbished Mobile
        $onsale_mobiles = productOnsaleHelper('Mobile',8);

        // Accessories
        $powerbanks = accessories('Power Bank');
        $headphones = accessories('Headphone');
        $earbuds = accessories('Earbuds');
        $on_sale_footer_mobile = productOnsaleHelper('Mobile',3);
        $featured_footer_mobile = productFeaturedHelper('Mobile',3);

        $Trending_mobile = productTrendingHelper('Mobile',3);
        $refurbished_mobiles = productHelper('Mobile',8,1);

        return view('user.index',compact('mobiles','under_fifteen_thousand','onsale_mobiles','on_sale_footer_mobile','featured_footer_mobile','Trending_mobile','refurbished_mobiles','powerbanks','headphones','earbuds'));
    }

    public function product(Request $request, $name,$id){
        $geoLocationDistance = geoLocationDistance();
        
        $previousUrl = url()->previous();
        $path = parse_url($previousUrl, PHP_URL_PATH);
        // Extract the last segment from the path
        $URlName = trim(basename($path));
        $URlName = urldecode($URlName);
        // Convert the URL segment to a more readable format
        $URlName = ucwords(strtolower(str_replace('-', ' ', $URlName)));
        if ($URlName ) {
            if($URlName == 'Mobile'){
                $vendorId = null;
            }
            else{
                $vendorName = User::where('role',1)->where('is_deleted',0)->where('shop_name', 'LIKE', "%{$URlName}%")->first();
                $vendorId = $vendorName->id??0;
            }
            
        } 
        else{
            $vendorId = null;
        }
        // tending product save
        $sessionId = $request->session()->getId();

        $LaravelSession = LaravelSession::where('laravel_session', $sessionId)->first();
        if(!$LaravelSession){
            return redirect()->route('user.index');
        }
        $existingTrending = Trending::where('session_id', $LaravelSession->id)->where('product_id', $id)->first();
        if (!$existingTrending) {
            $trending = new Trending();
            $trending->session_id = $LaravelSession->id;
            $trending->product_id = $id;
            $trending->save();
        }

        $product = productDetails($id);
        if($product){
          $geoLocationVender = geoLocation();
          if($vendorId){
              $venders = Product::where('mobile_id',$product->mobile_id)->with(['Mobile' => function($query) {
                  $query->select('id', 'phone', 'brand','status'); 
               },'User'=> function($user) {
                   $user->select('id','name','shop_name','address');
               }])->where('is_deleted',0)->orderBy('memory_price','ASC');

              $venders = $venders->where('vender_id',$vendorId)->get()->unique('vender_id');
          }
          else{
              $venders = Product::where('mobile_id',$product->mobile_id)->with(['Mobile' => function($query) {
                  $query->select('id', 'phone', 'brand','status'); 
               },'User'=> function($user) {
                   $user->select('id','name','shop_name','address');
               }])->where('is_deleted',0)->orderBy('memory_price','ASC');

              $venders = $venders->get()->unique('vender_id');
          }
        }
        else{
          return redirect()->route('user.index');
        }
        
        
        //  visitor Cookie
         if (isset($_COOKIE['visitor'])) {
            $visitor = json_decode($_COOKIE['visitor']);
            $user = Visitor::where('phone',$visitor->phone)->first();
            if($user){
                $visitor_status = 1;
            }
            else{
                $visitor_status = 0;
            }
         }else{
            $visitor_status = 0;
         }    

        return view('user.product',compact('product','venders','visitor_status','geoLocationDistance'));
    }

    public function login()
    {
        $plans = Plan::get();
        return view('user.login',compact('plans'));
    }

    public function loginchange(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);
        $admin_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );

        $user = User::where('email',$request->email)->first();
        // return  $user;
        
        if($user && $user->is_deleted == 0){
            if (Auth::guard('web')->attempt($admin_data)) {
                return redirect()->route('user.index')->with('success', 'Login Succesfully');
            } else {
                return back()->with('error', 'Wrong Login Details');
            }
        }else {
            return back()->with('error', 'This user disabled by Admin');
        }

            
    }

    public function register(Request $request){

        // dd($request->all());

        $this->validate($request, [
            'email'   => 'unique:users,email',
            // 'password'  => 'required|alphaNum|min:3'
        ]);
        

        $state = $request->state;
        $city = $request->city;
        $address1 = $request->address;

        $address = 'india' . ', ' . $state . ', ' . $city. ', ' . $address1;
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



        $User = new User();
        $User->name= $request->name;
        $User->email= $request->email;
        $User->phone= $request->phone;
        $User->shop_name= $request->shop_name;
        $User->gst_number= $request->gst_number;
        $User->role= $request->usertype ?? 1;
        $User->city= $city;
        $User->state= $state;
        $User->address= $address1;
        // $User->password= Hash::make($request->password);
        $User->latitude= $latitude;
        $User->longitude= $longitude;
        $User->save();

        $generateOtp = generateOtp(6);
        $mobileNumber = $request->phone;
        Session::put('otp', $generateOtp);
        if($generateOtp){
            $SmsApi = SmsApi($generateOtp,$mobileNumber);
        }

        $admin_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );
        if (Auth::guard('web')->attempt($admin_data)) {
            if($request->usertype){
                return redirect()->route('user.index')->with('success', 'Login Succesfully');
            }
            else{
                return redirect()->route('user.index')->with('success', 'Please wait for the administrator to review and approve!');
            }
            
        } else {
            return back()->with('error', 'Wrong Login Details');
        }
    }

    public function smsOtpCheck(Request $request){
        $storedOtp = Session::get('otp');
        $otp = $request->otp;
        if($otp){
            if($storedOtp == $otp){
                return true;
            }
            else{
                return false;
            }
        }
    }

    public function smsOtpResend(){
        $user  = User::orderBy('created_at','DESC')->first();
        $generateOtp = generateOtp(6);
        $mobileNumber = $user->phone;
        Session::forget('otp');
        if($generateOtp){
            Session::put('otp', $generateOtp);
            $SmsApi = SmsApi($generateOtp,$mobileNumber);
            return true;
        }
        else{
            return false;
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }


    public function visiterSave(Request $request){
        $generateOtp = generateOtp(6);

        Session::put('visitor_otp', $generateOtp);
        Session::put('visitor_data', $request->all());
    
        if ($generateOtp){
            $SmsApi = SmsApi($generateOtp, $request->phone);
        }
        return response()->json([
            'message' => 'OTP has been sent to your mobile number. Please verify it.',
            'otp_required' => true,
        ]);
    }
    
    
    public function visitorOtpCheck(Request $request){
        // $storedOtp = Session::get('visitor_otp');
        // $otp = $request->otp;

        $storedOtp = (string) Session::get('visitor_otp');
        Log::info('Stored OTP: ' . Session::get('visitor_otp'));

        $otp = (string) $request->otp;
    
        if ($otp && $storedOtp == $otp) {
            $visitorData = Session::get('visitor_data');
            $visitor = new Visitor();
            $visitor->name = $visitorData['name'];
            $visitor->email = $visitorData['email'];
            $visitor->phone = $visitorData['phone'];
            $visitor->visit_date = date('Y-m-d');
            $visitor->product_id = $visitorData['product_id'];
            $visitor->vender_id = $visitorData['vender_id'];
            $visitor->save();
    
            Session::forget('visitor_otp');
            Session::forget('visitor_data');
    
            $user = User::find($visitorData['vender_id']);
    
            return response()->json([
                'success' => true,
                'message' => 'OTP verified. Visitor details saved.',
                'user' => $user,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid OTP. Please try again.',
            ]);
        }
    }
    

    
    public function visitorOtpResend(Request $request){
        $mobileNumber = $request->phone;
        $generateOtp = generateOtp(6);
        if ($generateOtp) {
            Session::put('visitor_otp', $generateOtp); 
            $SmsApi = SmsApi($generateOtp, $mobileNumber);
            return response()->json(['message' => 'OTP has been resent to your mobile number.']);
        } else {
            return response()->json(['message' => 'Failed to resend OTP.'], 400);
        }
    }



    // ------------------------
    // call Now and  Call Now
    // ------------------------
    
    public function orderNowSave(Request $request){
        $generateOtp = generateOtp(6);
        Session::put('visitor_otp', $generateOtp);
        Session::put('visitor_data', $request->all());
        if ($generateOtp){
            $SmsApi = SmsApi($generateOtp, $request->phone);
        }
        return response()->json([
            'message' => 'OTP has been sent to your mobile number. Please verify it.',
            'otp_required' => true,
        ]);
    }

    public function orderOtpCheck(Request $request) {
        $storedOtp = Session::get('visitor_otp');
        $otp = $request->otp;
        if ($otp && $storedOtp == $otp) {
            $visitorData = Session::get('visitor_data');
            if ($visitorData) {
                $visitor = new Visitor();
                $visitor->name = $visitorData['name'];
                $visitor->email = $visitorData['email'];
                $visitor->phone = $visitorData['phone'];
                $visitor->visit_date = date('Y-m-d');
                $visitor->product_id = $visitorData['product_id'];
                $visitor->vender_id = $visitorData['vender_id'];
                $visitor->save();
                Session::forget('visitor_otp');
                Session::forget('visitor_data');
                $user = User::find($visitorData['vender_id']);
                if ($user) {
                    return response()->json([
                        'success' => true,
                        'message' => 'OTP verified. Visitor details saved.',
                        'user' => $user,
                        'phone' => $user->phone,
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Vendor not found.',
                    ], 404);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Visitor data is missing.',
                ], 400);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid OTP. Please try again.',
            ]);
        }
    }

    public function orderOtpResend(Request $request){
        $mobileNumber = $request->phone;
        $generateOtp = generateOtp(6);
        if ($generateOtp) {
            Session::put('visitor_otp', $generateOtp); 
            $SmsApi = SmsApi($generateOtp, $mobileNumber);
            return response()->json(['message' => 'OTP has been resent to your mobile number.']);
        } else {
            return response()->json(['message' => 'Failed to resend OTP.'], 400);
        }
    }
    



    public function vendorDetail($name){
        
        $vendorname = str_replace('-', ' ', $name);
        $user_verdor = User::where('shop_name',$vendorname)->first();
        if($user_verdor){
            $ids = $user_verdor->id;

            $storeviews = new StoreViews();
            $storeviews->vendor_id = $ids;
            $storeviews->views = 1;
            $storeviews->save();

            $user = User::where('id',$ids)->first();
            $products =  Product::where('category','Mobile')->where('mobile_type',0)->with(['Mobile' => function($query) {
                $query->select('id', 'phone', 'brand','status','picture_url_small','picture_url_big'); 
             },'User'=> function($user){
                $user->select('id','name','shop_name','address');
             }])->where('vender_id',$ids)->where('is_deleted',0)->orderBy('created_at','DESC')->get();
            
             $products_featued =  Product::where('category','Mobile')->where('is_featured',1)->with(['Mobile' => function($query) {
                $query->select('id', 'phone', 'brand','status','picture_url_small','picture_url_big'); 
             },'User'=> function($user){
                $user->select('id','name','shop_name','address');
             }])->where('vender_id',$ids)->where('is_deleted',0)->orderBy('created_at','DESC')->get();
             
             $products_onsale =  Product::where('category','Mobile')->where('is_onsale',1)->with(['Mobile' => function($query) {
                $query->select('id', 'phone', 'brand','status','picture_url_small','picture_url_big'); 
             },'User'=> function($user){
                $user->select('id','name','shop_name','address');
             }])->where('vender_id',$ids)->where('is_deleted',0)->orderBy('created_at','DESC')->get();

             $refurbisheds =  Product::where('category','Mobile')->where('mobile_type',1)->with(['Mobile' => function($query) {
                $query->select('id', 'phone', 'brand','status','picture_url_small','picture_url_big'); 
             },'User'=> function($user){
                $user->select('id','name','shop_name','address');
             }])->where('vender_id',$ids)->where('is_deleted',0)->orderBy('created_at','DESC')->get();

            $banners  = VendorBanner::where('vendor_id',$ids)->where('is_deleted', 0)->orderBy('created_at','desc')->first();
            //  return $banners;

            // accessory
            $accessory = Product::with('accessory')->where('vender_id',$ids)->where('category','accessory')->where('is_deleted','0')->orderBy('created_at', 'DESC')->get();
            return view('user.vendor_detail',compact('user','products','products_onsale','products_featued','refurbisheds','banners','accessory'));
        }
        else{
            return redirect()->back()->with('success', ''.$vendorname.' Verdor Not Fount');
        }
        
    }

    public function vendor(){
        $geoLocationVender = geoLocation();
        $geoLocationDistance = geoLocationDistance();
        if($geoLocationVender){
          $vendors = User::where('role','1')->where('status','1')->where('is_deleted',0)->whereIn('id',$geoLocationVender)->get();
        }
        else{
          $vendors = User::where('role','1')->where('status','1')->where('is_deleted',0)->get();
        }
        
        if(!count($vendors)>0){
            $vendors = User::where('role','1')->where('status','1')->where('is_deleted',0)->get();
        }
        return view('user.vendor',compact('vendors','geoLocationDistance'));
    }

    public function visitor(Request $request){
        $user = User::where('id',$request->vender_id)->first();
        return $user;
    }

    public function contact(){
        return view('user.contact');
    }

    public function contactSave(Request $request){
        $contact  = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->content = $request->content;
        $contact->save();
        return redirect()->route('user.contact')->with('error', 'Send message successfully!');
    }


    public function productCategories(Request $request, $category) {
        $geoLocationVender = geoLocation();
        $type = $request->type == 'used' ? 1 : 0;
        $search = $request->q;
        $size_search = $request->input('size', []); 
        $brands_search = $request->input('brands', []); 
        $jack = $request->jack;
        $camara = $request->input('camara', []); 
        $sim = $request->input('sim', []); 
        $diaplay = $request->input('display', []); 
        
        $products = productFilterHelper($category, [], $brands_search, $type, $search, $size_search,$jack,$camara,$sim,$diaplay);
        if ($request->ajax()) {
            $html = view('user.product_search', compact('products', 'category'))->render();
            return response()->json(['html' => $html]);
        }
        if($geoLocationVender){
            $product_go = Product::where('category','Mobile')->whereIn('vender_id', $geoLocationVender)->pluck('mobile_id')->toArray();
            $brands = Product::where('category', $category)->whereIn('vender_id', $geoLocationVender)->where('is_deleted', 0)->get()->unique('brand');
            $product_memory_id = Product::where('category', $category)->whereIn('vender_id', $geoLocationVender)->where('is_deleted', 0)->pluck('mobile_id')->toArray();
            $memory_internals = Mobile::select('id', 'memory_internal')->where('id',$product_go)->whereIn('id', $product_memory_id)->get()->unique('memory_internal');
            $selfie_cameras = Mobile::select('id', 'selfie_camera_single')->where('id',$product_go)->whereIn('id', $product_memory_id)->get()->unique('selfie_camera_single');
            $display_sizes = Mobile::select('id', 'display_size')->where('id',$product_go)->whereIn('id', $product_memory_id)->get()->unique('display_size');
        }
        else{
            $brands = Product::where('category', $category)->where('is_deleted', 0)->get()->unique('brand');
            $product_memory_id = Product::where('category', $category)->where('is_deleted', 0)->pluck('mobile_id')->toArray();
            $memory_internals = Mobile::select('id', 'memory_internal')->whereIn('id', $product_memory_id)->get()->unique('memory_internal');
            $selfie_cameras = Mobile::select('id', 'selfie_camera_single')->whereIn('id', $product_memory_id)->get()->unique('selfie_camera_single');
            $display_sizes = Mobile::select('id', 'display_size')->whereIn('id', $product_memory_id)->get()->unique('display_size');
        }
        
        return view('user.product_categories', compact('products','type','category', 'brands', 'brands_search', 'memory_internals', 'size_search','selfie_cameras','display_sizes','jack','camara','sim','diaplay'));
    }


    public function Subscription(Request $request){
       $subscription = new Subscription(); 
       $subscription->email = $request->email;
       $subscription->save();
       return redirect()->route('user.index')->with('error', 'Send message successfully!');
    }

    // --------------
    // Search filter
    // --------------
    public function search(Request $request){
        $search = $request->search;
        $products = productSearchHelper($search);
        $html = view('user.search', compact('products'))->render();
        echo $html;
    }

    // search by submit
    public function searchBySubmit(Request $request, $category){ 
        $search = $request->search;
        $products = productFilterSearchHelper($search);
        return view('user.search_all_products', compact('products'));
    }

    public function wishlist(Request $request) {
        $sessionId = $request->session()->getId();
        $wishlistItems = LaravelSession::where('laravel_session', $sessionId)->first();
        $wishlists = Wishlist::where('session_id', $wishlistItems->id)->get();
        $products  = productWishlistHelper($wishlists);
        $wishlistCount = wishlistCountHelper($wishlists);
        // return $products;
        return view('user.wishlist', compact('products','wishlistCount'));
    }
    
    public function wishlistSave(Request $request){
        $product = Product::find($request->product_id);

        $sessionId = $request->session()->getId();
        $LaravelSession = LaravelSession::where('laravel_session', $sessionId)->first();
        // return $LaravelSession;

        $wishlist = new Wishlist();
        $wishlist->session_id = $LaravelSession->id;
        $wishlist->product_id = $product->id;
        $wishlist->save();


        return redirect()->back()->with('success', 'Product added to wishlist successfully!');
    }


    public function sharchPrice(Request $request){
        $side_ram = $request->side_ram;
        $key_id = $request->key_id;
        $price_verdor = [];
        $products = Product::where('mobile_id',$request->mobile_id)->where('is_deleted',0)->get();
        $productData = [];
        foreach ($products as $product){
            foreach(explode(";", $product->memory_price) as $key=>$price){
                if($key == $key_id){
                        $productData[] = [
                            'id' => $product->vender_id,
                            'price' => $price == null ? explode(";", $product->memory_price)[0] :$price  ,
                        ]; 
                }
                             
            }
        }
         return $productData;
    }

    public  function cookiePolicy(){
        return  view('user.cookie_polocy');
    }

    public  function termsAndConditions(){
        return  view('user.terms_and_conditions');
    }

    public  function termsAndConditionsVendor(){
        return  view('user.terms_and_conditions_vendor');
    }
     

    public  function userLogin(){
        return  view('user.user_login');
    }

    public  function vendorRegister(){
        $plans = Plan::get();
        return  view('user.vendor_register',compact('plans'));
    }

    public  function userRegister(){
        return  view('user.user_register');
    }

    private function generate_uuid_v4() {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    public  function vendorGSTValidate(Request $request){
        $task_id = $this->generate_uuid_v4();
        $group_id = $this->generate_uuid_v4();
        
        $account_id = 'da1b12984889/be4cf7b8-73fc-4ab0-949c-fa630a0196cd';
        $api_key = 'ff187c4a-573b-4dd8-a3f8-052b90c5ca3b';
        
        $GSTN = $request->gst;

        if($GSTN){
            $User = User::where('gst_number',$GSTN)->first();
            if(!$User){
                    // Data to be sent in the POST request
                    $data = [
                        "task_id" => $task_id,
                        "group_id" => $group_id,
                        "data" => [
                            "gstin" => $GSTN
                        ]
                    ];
                    $ch = curl_init();

                    curl_setopt($ch, CURLOPT_URL, "https://eve.idfy.com/v3/tasks/async/verify_with_source/ind_gst_certificate");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, [
                        'Content-Type: application/json',
                        'account-id: ' . $account_id,
                        'api-key: ' . $api_key
                    ]);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

                    // Execute the cURL request and get the response
                    $response = curl_exec($ch);

                    $log = PHP_EOL.'-----------------'.date('d-m-Y H:i:s').'-----------------'.PHP_EOL;
                    $log .= 'Data Post: '.print_r(json_decode($response, true), true);

                    file_put_contents('gst-log.txt', $log, FILE_APPEND);

                    // Check for errors
                    if (curl_errno($ch)) {
                        echo 'Error:' . curl_error($ch);
                    } else {
                        $request = json_decode($response, true);
                        return $request;
                    }
                    curl_close($ch);
            }
            else{
                return response()->json(['mess' => $GSTN.'  GST Already Requested','status'=>1]);
            }
        }
        
       
        
    }

    public  function vendorGSTValidateRequestID(Request $request){
        $task_id = $this->generate_uuid_v4();
        $group_id = $this->generate_uuid_v4();
        $account_id = 'da1b12984889/be4cf7b8-73fc-4ab0-949c-fa630a0196cd';
        $api_key = 'ff187c4a-573b-4dd8-a3f8-052b90c5ca3b';
        
        if(isset($request)){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://eve.idfy.com/v3/tasks?request_id=".$request->request_id);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'account-id: ' . $account_id,
                'api-key: ' . $api_key
            ]);
            $response = curl_exec($ch);

            $log = PHP_EOL.'-----------------'.date('d-m-Y H:i:s').'-----------------'.PHP_EOL;
            $log .= 'Request: '.print_r(json_decode($response, true), true);

            file_put_contents('gst-log.txt', $log, FILE_APPEND);

            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            } else {
                $request = json_decode($response, true);
                return $request;
                
            }
            curl_close($ch);
        }
        
    }

    public function savePassword(Request $request){
        $User = User::where('gst_number',$request->gst_number)->first();
        $User->password= Hash::make($request->password);
        if ($request->hasFile('profile')) {
            $profileImage = $request->file('profile');
            $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('profile'), $imageName);
            $User->profile = 'profile/' . $imageName;
        }
        $User->update();

        Mail::send('user.vendor_email', ['user' => $User], function ($message) use ($User) {
            $message->to($User->email)
                    ->cc('Info@mobilekidukaan.in')
                    ->subject('Registration');
        });
 
        $admin_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );
        
       return redirect()->route('login')->with('success', 'Congratulations Your Registration Process Done');
    }


    public function assessries($name,$id){
        $previousUrl = url()->previous();
         $pattern = "/vendor\/([\w-]+)\/(\d+)/";

        if (preg_match($pattern, parse_url($previousUrl, PHP_URL_PATH), $matches)) {
            $vendorName = $matches[1];
            $vendorId = $matches[2];
        }
        else{
            $vendorId = null;
        }
        $product = Product::with('accessory')->where('id',$id)->where('category','accessory')->where('is_deleted','0')->orderBy('created_at', 'DESC')->first();
        $geoLocationVender = geoLocation();
          if($vendorId){
              $venders = Product::where('mobile_id',$product->mobile_id)->with(['Mobile' => function($query) {
                  $query->select('id', 'phone', 'brand','status'); 
               },'User'=> function($user) {
                   $user->select('id','name','shop_name','address');
               }])->where('is_deleted',0)->orderBy('memory_price','ASC');

              $venders = $venders->where('vender_id',$vendorId)->get()->unique('vender_id');
          }
          else{
              $venders = Product::where('mobile_id',$product->mobile_id)->with(['Mobile' => function($query) {
                  $query->select('id', 'phone', 'brand','status'); 
               },'User'=> function($user) {
                   $user->select('id','name','shop_name','address');
               }])->where('is_deleted',0)->orderBy('memory_price','ASC');

              $venders = $venders->get()->unique('vender_id');
          }

          //  visitor Cookie
         if (isset($_COOKIE['visitor'])) {
            $visitor = json_decode($_COOKIE['visitor']);
            $user = Visitor::where('phone',$visitor->phone)->first();
            if($user){
                $visitor_status = 1;
            }
            else{
                $visitor_status = 0;
            }
         }else{
            $visitor_status = 0;
         }  
        return  view('user.accessories',compact('product','venders','visitor_status'));
    }


   public function mobileAssessries(Request $request,$category){
        $geoLocationVender = geoLocation();
        $brands_search = $request->input('brands', []);
        $type = $request->input('type', []); 
        $type_search =$type;
        $products = accessoryFilterHelper($category,$brands_search,$type);
        if ($request->ajax()) {
            $html = view('user.accessory_search', compact('products', 'category'))->render();
            return response()->json(['html' => $html]);
        }
        if($geoLocationVender){
            $product_go = Product::where('category','accessory')->whereIn('vender_id',$geoLocationVender)->pluck('mobile_id')->toArray();
            $types = Accessory::select('id','type')->whereIn('id',$product_go)->get()->unique('type');
            $brands = Accessory::select('id','brand')->whereIn('id',$product_go)->get()->unique('brand');
        }
        else{
            $types = Accessory::select('id','type')->get()->unique('type');
            $brands = Accessory::select('id','brand')->get()->unique('brand');
        }
        
        // $products = Product::with('accessory')->where('category','accessory')->where('is_deleted','0')->orderBy('created_at', 'DESC')->get();
        return  view('user.mobile_accessories',compact('types','brands','products','category','brands_search','type_search'));
   }

    public function whatsappSendOTP(){
            $user = whatsappApi();
            return $user;
    }


    public function blog(){
        $data['blogs'] = Blog::where('is_deleted','0')->orderBy('created_at', 'DESC')->get();
        return view('user.blog',$data);
    }

    public function blog_detail($id){
        $data['blog'] = Blog::find($id);
        return view('user.blog_detail',$data);
    }
    
    
}
