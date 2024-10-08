<?php
use App\Models\User;
use App\Models\Product;
use App\Models\Mobile;
use App\Models\Trending;
use App\Models\StoreViews;
use App\Models\Accessory;

use Illuminate\Support\Facades\DB;

if (!function_exists('productHelper')) {
    function productHelper($category, $product_count = null ,$mobile_type = null) {
        $geoLocationVender = geoLocation();

        $mobiles = Product::join('mobiles', 'products.mobile_id', '=', 'mobiles.id')
            ->select('products.*', 'mobiles.hits') 
            ->where('products.mobile_type', $mobile_type)
            ->orderBy('mobiles.hits', 'DESC'); 
        
        if ($geoLocationVender) {
            $mobiles = $mobiles->whereIn('products.vender_id', $geoLocationVender)
                               ->where('products.category', $category)
                               ->where('products.is_deleted', 0);
        } else {
            $mobiles = $mobiles->where('products.category', $category)
                               ->where('products.is_deleted', 0);
        }
        
        if ($product_count) {
            $data = $mobiles->limit($product_count)->get();
        } else {
            $data = $mobiles->get();
        }
        
        $data->load('Mobile', 'User');
        $data = $data->unique('mobile_id');
        
        return $data;
        

    }
}

if (!function_exists('accessories')) {
    function accessories($type = null) {
        $geoLocationVender = geoLocation();
        if($geoLocationVender){
            $products = Product::with('accessory')->where('model',$type)->where('vender_id',$geoLocationVender)->where('category','accessory')->where('is_deleted','0')->orderBy('created_at', 'DESC')->limit(5)->get();
        }
        else{
            $products = Product::with('accessory')->where('model',$type)->where('category','accessory')->where('is_deleted','0')->orderBy('created_at', 'DESC')->limit(5)->get();
        }
        if(!count($products)>0){
            $products = Product::with('accessory')->where('model',$type)->where('category','accessory')->where('is_deleted','0')->orderBy('created_at', 'DESC')->limit(5)->get();

        }
       return $products;
    }
}

if (!function_exists('productFeaturedHelper')) {
    function productFeaturedHelper($category,$product_count=null) {

        $geoLocationVender = geoLocation();

        $mobiles = Product::where('is_featured',1)->with(['Mobile' => function($query) {
            $query->select('id', 'phone', 'brand','status','picture_url_small','picture_url_big'); 
         }]);
        $mobiles = $mobiles->with(['User' => function($query) {
            $query->select('id','name','shop_name'); 
        }]);
        if($geoLocationVender){
              $mobiles = $mobiles->whereIn('vender_id',$geoLocationVender)->where('category',$category)->where('is_deleted', 0)->orderBy('created_at','DESC');
        }
        else{
             $mobiles = $mobiles->where('category',$category)->where('is_deleted', 0)->orderBy('created_at','DESC');
        }
        if($product_count){
            $data = $mobiles->limit($product_count)->get()->unique('mobile_id');
         }
         else{
            $data = $mobiles->get();
         }
            
        return $data;

    }
}


if (!function_exists('under_fifteen_thousand')) {
    function under_fifteen_thousand($category,$product_count=null,$money =null) {

        $geoLocationVender = geoLocation();

        $mobiles = Product::join('mobiles', 'products.mobile_id', '=', 'mobiles.id')
            ->select('products.*', 'mobiles.hits') 
            ->where('products.mobile_type','0')
            ->where('mobiles.status','!=','Cancelled;')
            ->orderBy('mobiles.status', 'DESC'); 
        
        if ($geoLocationVender) {
            $mobiles = $mobiles->whereIn('products.vender_id', $geoLocationVender)
                               ->where('products.category', $category)
                               ->where('products.is_deleted', 0);
        } else {
            $mobiles = $mobiles->where('products.category', $category)
                               ->where('products.is_deleted', 0);
        }
        
        if ($product_count) {
            $data = $mobiles->limit($product_count)->get();
        } else {
            $data = $mobiles->get();
        }
        
        $data->load('Mobile', 'User');
        $data = $data->unique('mobile_id');
        
        return $data;

    }
}

if (!function_exists('productOnsaleHelper')) {
    function productOnsaleHelper($category,$product_count=null) {

        $geoLocationVender = geoLocation();

        $mobiles = Product::where('is_onsale',1)->with(['Mobile' => function($query) {
            $query->select('id', 'phone', 'brand','status','picture_url_small','picture_url_big'); 
         }]);
        $mobiles = $mobiles->with(['User' => function($query) {
            $query->select('id','name','shop_name'); 
        }]);
        if($geoLocationVender){
              $mobiles = $mobiles->whereIn('vender_id',$geoLocationVender)->where('category',$category)->where('is_deleted', 0)->orderBy('created_at','DESC');
        }
        else{
             $mobiles = $mobiles->where('category',$category)->where('is_deleted', 0)->orderBy('created_at','DESC');
        }
        if($product_count){
            $data = $mobiles->limit($product_count)->get()->unique('mobile_id');
         }
         else{
            $data = $mobiles->get();
         }

        return $data;

    }
}


if (!function_exists('productFilterHelper')) {
    function productFilterHelper($category, $filter, $brands, $type = null, $search = null, $size_search = null,$jack = null,$camara = null,$sim = null,$diaplay=null) {
        $getAllProduct = Product::pluck('mobile_id')->toArray();
        
        if ($size_search ) {
            $getMobileSize = Mobile::whereIn('id', $getAllProduct);
            $getMobileSize->where(function ($query) use ($size_search)  {
                foreach ($size_search as $size) {
                    $query->orWhere('memory_internal', 'LIKE', '%' . $size . '%');
                }
            });
            $getMobileSize = $getMobileSize->pluck('id')->toArray();
        }
        elseif($jack){
            if($jack == 1){
                $valuejack = 'Yes;';
                $getMobileSize = Mobile::whereIn('id', $getAllProduct)
                        ->orWhere(DB::raw('`sound_3.5mm_jack`'), 'LIKE', '%' . $valuejack . '%')
                        ->pluck('id')
                        ->toArray();
            }
        }
        else {
            $getMobileSize = null;
        }

        // camara
        if($camara){
            $getMobileCamara = Mobile::whereIn('id', $getAllProduct);
            $getMobileCamara->where(function ($query) use ($camara)  {
                foreach ($camara as $selfie) {
                    $query->orWhere('selfie_camera_single', 'LIKE', '%' . $selfie . '%');
                }
            });
            $getMobileCamara = $getMobileCamara->pluck('id')->toArray();
        }
        else{
            $getMobileCamara = null;
        }

        // sim
        if($sim){
            $getMobileSim = Mobile::whereIn('id', $getAllProduct);
            $getMobileSim->where(function ($query) use ($sim)  {
                    foreach ($sim as $s) {
                        $query->orWhere('body_sim', 'LIKE', '%' . $s . '%');
                    }
            });
            $getMobileSim = $getMobileSim->pluck('id')->toArray();
        }
        else{
            $getMobileSim = null;
        }

        // $diaplay

        if($diaplay){
            $getMobileDisplay = Mobile::whereIn('id', $getAllProduct);
            $getMobileDisplay->where(function ($query) use ($diaplay)  {
                    foreach ($diaplay as $diapla) {
                        $query->orWhere('display_size', 'LIKE', '%' . $diapla . '%');
                    }
            });
            $getMobileDisplay = $getMobileDisplay->pluck('id')->toArray();
        }
        else{
            $getMobileDisplay = null;
        }


        $geoLocationVender = geoLocation();

        $mobiles = Product::where('mobile_type', $type)->with(['Mobile' => function($query) {
            $query->select('id', 'phone', 'brand', 'status', 'picture_url_small', 'picture_url_big', 'memory_internal'); 
        }]);
        $mobiles = $mobiles->with(['User' => function($query) {
            $query->select('id', 'name', 'shop_name'); 
        }]);
        if ($geoLocationVender) {
            $mobiles = $mobiles->whereIn('vender_id', $geoLocationVender)->where('category', $category)->where('is_deleted', 0)->orderBy('created_at', 'DESC');
        } else {
            $mobiles = $mobiles->where('category', $category)->where('is_deleted', 0)->orderBy('created_at', 'DESC');
        }
        if ($brands && $getMobileSize) {
            $data = $mobiles->whereIn('mobile_id', $getMobileSize)->whereIn('brand', $brands);
        } 
        elseif($brands && $getMobileCamara){
            $data = $mobiles->whereIn('mobile_id', $getMobileCamara)->whereIn('brand', $brands);
        }elseif($brands && $getMobileSim){
            $data = $mobiles->whereIn('mobile_id', $getMobileSim)->whereIn('brand', $brands);
        }elseif($brands && $getMobileDisplay){
            $data = $mobiles->whereIn('mobile_id', $getMobileDisplay)->whereIn('brand', $brands);
        }
        elseif ($getMobileSim) {
            $data = $mobiles->whereIn('mobile_id', $getMobileSim);
        }
        elseif ($brands) {
            $data = $mobiles->whereIn('brand', $brands);
        } elseif ($getMobileSize) {
            $data = $mobiles->whereIn('mobile_id', $getMobileSize);
        } elseif ($getMobileCamara) {
            $data = $mobiles->whereIn('mobile_id', $getMobileCamara);
        }elseif ($getMobileDisplay) {
            $data = $mobiles->whereIn('mobile_id', $getMobileDisplay);
        }
         else {
            $data = $mobiles;
        }

        return $data->get()->unique('mobile_id');
    }
}

if (!function_exists('accessoryFilterHelper')) {
    function accessoryFilterHelper($category=null,$brands_search=null,$type=null) {
        $geoLocationVender = geoLocation();
        if($geoLocationVender){
            $products = Product::with('accessory')->where('vender_id', $geoLocationVender)->where('category','accessory')->where('is_deleted','0')->orderBy('created_at', 'DESC');
        }
        else{
            $products = Product::with('accessory')->where('category','accessory')->where('is_deleted','0')->orderBy('created_at', 'DESC');
        }
        if ($brands_search) {
            $data = $products->whereIn('brand', $brands_search);
        } 
        elseif($type){
            $data = $products->whereIn('model', $type);
        }
        elseif($brands_search && $type  ){
            $data = $products->whereIn('model',$type)->whereIn('brand', $brands_search);
        }
        else{
            $data = $products;
        }
        
        return $data->get()->unique('mobile_id');
    }
}

if (!function_exists('productDetails')) {
    function productDetails($id) {
        $mobiles = Product::with(['Mobile' => function($query) {
            $query->select('id', 'phone', 'brand','status','picture_url_small','picture_url_big','memory_internal','misc_colors','main_camera_triple','selfie_camera_single','main_camera_features','battery_other','display_size','display_type','body_sim','platform_os','comms_bluetooth'); 
         },'User'=> function($user){
            $user->select('id','name','shop_name');
         }])->where('id',$id)->where('is_deleted', 0)->orderBy('created_at','DESC');
         
        $data = $mobiles->first();
        return $data;

    }
}

if (!function_exists('formatPrice')) {
    function formatPrice($price) {
        // Ensure the price is converted to a float
        $price = (float) $price;
        return number_format($price, 2, '.', ',');
    }
}

if (!function_exists('geoLocation')) {
    function geoLocation() {

        if (isset($_COOKIE['Latitude'])  && isset($_COOKIE['Longitude'])  ){
            $latitude = $_COOKIE['Latitude'];
            $longitude = $_COOKIE['Longitude'];

            $lati = (float)$latitude;
            $longt = (float)$longitude;
            $rad = 3.5;

            $distance_result = "(6371 * acos(cos(radians($lati))
                * cos(radians(latitude))
                * cos(radians(longitude) - radians($longt))
                + sin(radians($lati))
                * sin(radians(latitude))))";

            $getAllProduct = Product::pluck('vender_id')->toArray();
            $user  = User::whereIn('id',$getAllProduct)->whereRaw("{$distance_result} < ?", [$rad])->pluck('id')->toArray(); 
        }
        else{
            $user = null;
        }
        return $user;
    }
}


if (!function_exists('geoLocationDistance')) {
    function geoLocationDistance() {
        $geoLocationVender = geoLocation();

        if (isset($_COOKIE['Latitude'])  && isset($_COOKIE['Longitude'])  ){
                // Extract user's coordinates from cookies
                $latitude = $_COOKIE['Latitude'];
                $longitude = $_COOKIE['Longitude'];

                $earthRadius = 6371; 
                $radiusKm = 100;
                $userDistances = User::where('role','1')->where('is_deleted',0)
                    ->select(
                        'id',
                        DB::raw("(
                            $earthRadius * acos(
                                cos(radians($latitude)) * cos(radians(latitude)) * 
                                cos(radians(longitude) - radians($longitude)) + 
                                sin(radians($latitude)) * sin(radians(latitude))
                            )
                        ) AS distance")
                    )
                    ->get();
                    $distancesData  = [];
                    foreach ($userDistances as $user){
                       $distancesData [$user->id] = [
                            'distance' => round($user->distance, 2) . 'Km'
                        ];
                    }

                    return $distancesData ;
        }
        else{
            $distancesData = null;
            return  $distancesData;
        }
    }
}




if (!function_exists('productSearchHelper')) {
    function productSearchHelper($search = '') {
        $geoLocationVender = geoLocation();
            // Search in Accessory table
            $accessoryIds = Accessory::where('brand', 'LIKE', "%{$search}%")
                             ->orWhere('model_name', 'LIKE', "%{$search}%")
                             ->orWhere('model', 'LIKE', "%{$search}%")
                             ->orWhere('type', 'LIKE', "%{$search}%")
                             ->orWhere('battery_life', 'LIKE', "%{$search}%")
                             ->orWhere('capacity', 'LIKE', "%{$search}%")
                             ->pluck('id')->toArray();
        
            // Search in Mobile table
            $mobileIds = Mobile::where('phone', 'LIKE', "%{$search}%")
                             ->orWhere('brand', 'LIKE', "%{$search}%")
                             ->orWhere('network_techology', 'LIKE', "%{$search}%")
                             ->orWhere('announced', 'LIKE', "%{$search}%")
                             ->orWhere('platform_cpu', 'LIKE', "%{$search}%")
                             ->orWhere('battery_other', 'LIKE', "%{$search}%")
                             ->orWhere('selfie_camera_single', 'LIKE', "%{$search}%")
                             ->orWhere('selfie_camera_dual', 'LIKE', "%{$search}%")
                             ->orWhere('selfie_camera_triple', 'LIKE', "%{$search}%")
                             ->orWhere('main_camera_single', 'LIKE', "%{$search}%")
                             ->orWhere('main_camera_dual', 'LIKE', "%{$search}%")
                             ->orWhere('main_camera_triple', 'LIKE', "%{$search}%")
                             ->pluck('id')->toArray();
        
            // Get matching Mobile products
            if($geoLocationVender){
                $mobiles = Product::with('Mobile')
                ->whereIn('mobile_id', $mobileIds)->whereIn('vender_id',$geoLocationVender)
                ->where('category', 'Mobile')
                ->get();

                // Get matching Accessory products
                $accessories = Product::with('Accessory')
                        ->whereIn('mobile_id', $accessoryIds)->whereIn('vender_id',$geoLocationVender)
                        ->where('category', 'accessory')
                        ->get();
            }
            else{
                $mobiles = Product::with('Mobile')
                ->whereIn('mobile_id', $mobileIds)
                ->where('category', 'Mobile')
                ->get();

                // Get matching Accessory products
                $accessories = Product::with('Accessory')
                    ->whereIn('mobile_id', $accessoryIds)
                    ->where('category', 'accessory')
                    ->get();
            }
            
        
            // Return the data as a JSON response
            return [
                'mobiles' => $mobiles,
                'accessories' => $accessories,
            ];
    }
}



if (!function_exists('productWishlistHelper')) {
    function productWishlistHelper($wishlists) {
        $geoLocationVender = geoLocation();

        $productIds = $wishlists->pluck('product_id');

        $mobiles = Product::whereIn('id', $productIds)->with(['Mobile' => function($query) {
            $query->select('id', 'phone', 'brand', 'status', 'picture_url_small', 'picture_url_big'); 
        }]);

        $mobiles = $mobiles->with(['User' => function($query) {
            $query->select('id', 'name', 'shop_name'); 
        }]);

        if ($geoLocationVender) {
            $mobiles = $mobiles->whereIn('vender_id', $geoLocationVender)->orderBy('created_at', 'DESC');
        } else {
            $mobiles = $mobiles->where('is_deleted', 0)->orderBy('created_at', 'DESC');
        }

        $data = $mobiles->get();

        return $data;
    }
}


if (!function_exists('productFilterSearchHelper')) {
    function productFilterSearchHelper($search = '')
    {
        $geoLocationVender = geoLocation();
        // Search in Accessory table
        $accessoryIds = Accessory::where('brand', 'LIKE', "%{$search}%")
                         ->orWhere('model_name', 'LIKE', "%{$search}%")
                         ->orWhere('model', 'LIKE', "%{$search}%")
                         ->orWhere('type', 'LIKE', "%{$search}%")
                         ->orWhere('battery_life', 'LIKE', "%{$search}%")
                         ->orWhere('capacity', 'LIKE', "%{$search}%")
                         ->pluck('id')->toArray();
    
        // Search in Mobile table
        $mobileIds = Mobile::where('phone', 'LIKE', "%{$search}%")
                         ->orWhere('brand', 'LIKE', "%{$search}%")
                         ->orWhere('network_techology', 'LIKE', "%{$search}%")
                         ->orWhere('announced', 'LIKE', "%{$search}%")
                         ->orWhere('platform_cpu', 'LIKE', "%{$search}%")
                         ->orWhere('battery_other', 'LIKE', "%{$search}%")
                         ->orWhere('selfie_camera_single', 'LIKE', "%{$search}%")
                         ->orWhere('selfie_camera_dual', 'LIKE', "%{$search}%")
                         ->orWhere('selfie_camera_triple', 'LIKE', "%{$search}%")
                         ->orWhere('main_camera_single', 'LIKE', "%{$search}%")
                         ->orWhere('main_camera_dual', 'LIKE', "%{$search}%")
                         ->orWhere('main_camera_triple', 'LIKE', "%{$search}%")
                         ->pluck('id')->toArray();
    
        // Get matching Mobile products
        if($geoLocationVender){
            $mobiles = Product::with('Mobile')
            ->whereIn('mobile_id', $mobileIds)->whereIn('vender_id',$geoLocationVender)
            ->where('category', 'Mobile')
            ->get();

            // Get matching Accessory products
            $accessories = Product::with('Accessory')
                    ->whereIn('mobile_id', $accessoryIds)->whereIn('vender_id',$geoLocationVender)
                    ->where('category', 'accessory')
                    ->get();
        }
        else{
            $mobiles = Product::with('Mobile')
            ->whereIn('mobile_id', $mobileIds)
            ->where('category', 'Mobile')
            ->get();

            // Get matching Accessory products
            $accessories = Product::with('Accessory')
                ->whereIn('mobile_id', $accessoryIds)
                ->where('category', 'accessory')
                ->get();
        }
        
    
        // Return the data as a JSON response
        return [
            'mobiles' => $mobiles,
            'accessories' => $accessories,
        ];
        

    }
}


if (! function_exists('wishlistCountHelper')) {
    function wishlistCountHelper($wishlists) {
        return count($wishlists);
    }
}

if (!function_exists('productTrendingHelper')) {
    function productTrendingHelper($category,$product_count=null) {
        
         $trending = Trending::select('product_id', DB::raw('count(*) as count'))
        ->groupBy('product_id')
        ->orderBy('count', 'DESC')
        ->pluck('product_id')->toArray();
        $geoLocationVender = geoLocation();

        $mobiles = Product::whereIN('id',$trending)->with(['Mobile' => function($query) {
            $query->select('id', 'phone', 'brand','status','picture_url_small','picture_url_big'); 
         }]);
        $mobiles = $mobiles->with(['User' => function($query) {
            $query->select('id','name','shop_name'); 
        }]);
        if($geoLocationVender){
              $mobiles = $mobiles->whereIn('vender_id',$geoLocationVender)->where('is_deleted', 0)->where('category',$category)->orderBy('created_at','DESC');
        }
        else{
             $mobiles = $mobiles->where('category',$category)->where('is_deleted', 0)->orderBy('created_at','DESC');
        }
        if($product_count){
            $data = $mobiles->limit($product_count)->get()->unique('mobile_id');
         }
         else{
            $data = $mobiles->get();
         }
            
        return $data;


    }
}


// if (!function_exists('storeViewschart')) {
//     function storeViewschart() {
//         $date_m = date('m');
//         $date_Y = date('Y');
//         $data = StoreViews::whereMonth('created_at','<=',$date_m)->whereYear('created_at',$date_Y)->get();
//         return  $data;
         
//     }
// }


if (!function_exists('storeViewschart')) {
    function storeViewschart() {
        // Get current year
        $date_Y = date('Y');

        // Retrieve data from StoreViews
        $data = StoreViews::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as views')
            )
            ->whereYear('created_at', $date_Y)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

        // Prepare result array with all months initialized to 0
        $result = [];
        for ($i = 1; $i <= 12; $i++) {
            $result[$i] = 0;
        }

        // Fill the result array with actual data from the query
        foreach ($data as $row) {
            $result[$row->month] = $row->views;
        }

        // Map month numbers to month names
        $monthNames = [
            1 => 'January', 2 => 'February', 3 => 'March',
            4 => 'April', 5 => 'May', 6 => 'June',
            7 => 'July', 8 => 'August', 9 => 'September',
            10 => 'October', 11 => 'November', 12 => 'December'
        ];

        // Prepare final output with month names and view counts
        $finalResult = [];
        foreach ($result as $month => $views) {
            $finalResult[] = [
                'month' => $monthNames[$month],
                'views' => $views
            ];
        }

        return $finalResult;
    }
}

if (! function_exists('whatsappApi')) {
    function whatsappApi() {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->post('https://wapi.sandeshservices.in/api/create-message', [
            'appkey' => 'fb9e7b09-2a59-42e4-a539-452acc2b082a',
            'authkey' => 'BEyyTyJu0VhQdPPNeqWHIhNHiiRk3D8x33ZCE0tzrMR6h1Iu1a',
            'to' => '917073310859', 
            'template_id' => 'auto_reply',
            'type' => '1',
            'language' => 'en_us',
            // 'variables' => [
            //     '{{1}}' => '123456',
            //     '{{2}}' => '123456',
            // ]
        ]);
    
        if ($response->successful()) {
            echo 'OTP sent successfully!';
        } else {
            echo 'Failed to send OTP: ' . $response->status();
            echo ' Response: ' . $response->body(); 
        }
    }
}

if (! function_exists('getPresent')) {
    function getPresent($data) {
        $price_key = null;
        $mrp_key = null;

        // Process memory prices
        foreach (explode(';', $data->memory_price) as $key => $m_price) {
            if ($m_price !== 'N.A' && $m_price !== null && $m_price !== 'N.A.') {
                $price_key = $key;
            }
        }

        // Process memory MRPs
        foreach (explode(';', $data->memory_mrp) as $key => $m_mrp) {
            if ($m_mrp !== 'N.A' && $m_mrp !== null && $m_mrp !== 'N.A.') {
                $mrp_key = $key;
            }
        }

        // Get the price and MRP based on the found keys or default to the first element
        $price = explode(';', $data->memory_price)[$price_key ?? 0];
        $mrp = explode(';', $data->memory_mrp)[$mrp_key ?? 0];
        // Remove commas from price and MRP
        $price_mop = str_replace(',', '', $price);
        $price_mrp = str_replace(',', '', $mrp);
        
        // Ensure both are numeric
        $price_mop = is_numeric($price_mop) ? $price_mop : 0;
        $price_mrp = is_numeric($price_mrp) ? $price_mrp : 0;

        if ($price_mop > 0 && $price_mrp > 0) {
            // Calculate percentage
            $price_diff = $price_mrp - $price_mop;
            $percentage = ($price_diff / $price_mrp) * 100;
            $percentage = number_format($percentage, 1);

            return ['present' => $percentage, 'price' => $price, 'mrp' => $mrp];
        } else {
            return ['present' => 0, 'price' => 0, 'mrp' => 0];
        }

        
    }


    if (! function_exists('SmsApi')) {
        function SmsApi($otp, $mobileNumber) {
            $baseUrl = 'http://inbox.bulksmswale.in/sendsms.jsp';
            
            $params = [
                'user'      => env('BULK_SMS_USER'),
                'password'  => env('BULK_SMS_PASSWORD'),
                'senderid'  => env('BULK_SMS_SENDER_ID'),
                'entityid'  => '1701172491713647797',
                'tempid'    => '1707172492887088854',
                'mobiles'   => '+91' .$mobileNumber,
                'sms'       => "{$otp} is your Mobile Ki Dukaan Registration Login OTP. Please do not share it with anyone.",
            ];
            
            // Send the request
            try {
                $response = Http::get($baseUrl, $params);
                
                if ($response->successful()) {
                    return response()->json(['message' => 'SMS sent successfully.']);
                } else {
                    return response()->json(['message' => 'Failed to send SMS.'], 500);
                }
            } catch (\Exception $e) {
                return response()->json(['message' => 'An error occurred: ' . $e->getMessage()], 500);
            }
        }
    }

    function generateOtp($length = 6) {
        $otp = '';
        for ($i = 0; $i < $length; $i++) {
            $otp .= mt_rand(0, 9);
        }
        return $otp;
    }
}






