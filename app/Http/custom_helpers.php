<?php
use App\Models\User;
use App\Models\Product;
use App\Models\Mobile;
use App\Models\Trending;

if (!function_exists('productHelper')) {
    function productHelper($category, $product_count = null ) {

        $geoLocationVender = geoLocation();

        $mobiles = Product::with(['Mobile' => function($query) {
            $query->select('id', 'phone', 'brand','status','picture_url_small','picture_url_big'); 
         }]);
        $mobiles = $mobiles->with(['User' => function($query) {
            $query->select('id','name','shop_name'); 
        }]);
        if($geoLocationVender){
              $mobiles = $mobiles->whereIn('vender_id',$geoLocationVender)->where('category',$category)->orderBy('created_at','DESC');
        }
        else{
             $mobiles = $mobiles->where('category',$category)->orderBy('created_at','DESC');
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
              $mobiles = $mobiles->whereIn('vender_id',$geoLocationVender)->where('category',$category)->orderBy('created_at','DESC');
        }
        else{
             $mobiles = $mobiles->where('category',$category)->orderBy('created_at','DESC');
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
              $mobiles = $mobiles->whereIn('vender_id',$geoLocationVender)->where('category',$category)->orderBy('created_at','DESC');
        }
        else{
             $mobiles = $mobiles->where('category',$category)->orderBy('created_at','DESC');
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
    function productFilterHelper($category,$filter,$brands,$type=null,$search=null,$size_search=null) {
        $getAllProduct = Product::pluck('mobile_id')->toArray();
        $mobile_dataId = Mobile::whereIn('id', $getAllProduct)
        ->where('brand', 'LIKE', "%{$search}%")
        ->where(function ($query) use ($size_search) {
            foreach ($size_search as $size) {
                $query->orWhere('memory_internal', 'LIKE', "%{$size}%");
            }
        })
        ->pluck('id')
        ->toArray();
        $geoLocationVender = geoLocation();

        $mobiles = Product::where('mobile_type',$type)->with(['Mobile' => function($query) {
            $query->select('id', 'phone', 'brand','status','picture_url_small','picture_url_big','memory_internal'); 
         }]);
        $mobiles = $mobiles->with(['User' => function($query)  {
            $query->select('id','name','shop_name'); 
        }]);
        if($geoLocationVender){
           if(count($mobile_dataId)>0){
              $mobiles = $mobiles->whereIn('mobile_id',$mobile_dataId)->whereIn('vender_id',$geoLocationVender)->where('category',$category)->orderBy('created_at','DESC');

           }
           else{
               $mobiles = $mobiles->whereIn('vender_id',$geoLocationVender)->where('category',$category)->orderBy('created_at','DESC');
           }
        }
        else{
             $mobiles = $mobiles->where('category',$category)->orderBy('created_at','DESC');
        }
        $min_price = $filter['min_price'];
        $max_price = $filter['max_price'];
         if($min_price !=null && $max_price !=null){
            if($brands){
                $data = $mobiles->whereIn('brand',$brands)->whereBetween('price',[$min_price, $max_price])->get();
            }
            else{
                $data = $mobiles->whereBetween('price',[$min_price, $max_price])->get();
            }
             
         }
         else{
            $data = $mobiles->get();
         }
        return $data;

    }
}

if (!function_exists('productDetails')) {
    function productDetails($name= null, $id = null ) {
        $mobiles = Product::with(['Mobile' => function($query) {
            $query->select('id', 'phone', 'brand','status','picture_url_small','picture_url_big','memory_internal','misc_colors','main_camera_triple','selfie_camera_single','main_camera_features','battery_other','display_size','display_type','body_sim','platform_os','comms_bluetooth'); 
         },'User'=> function($user){
            $user->select('id','name','shop_name');
         }])->where('id',$id)->orderBy('created_at','DESC');
         
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
            $rad = 2;

            $distance_result = "(6371 * acos(cos(radians($lati))
                * cos(radians(latitude))
                * cos(radians(longitude) - radians($longt))
                + sin(radians($lati))
                * sin(radians(latitude))))";

            $user  = User::whereRaw("{$distance_result} < ?", [$rad])->pluck('id')->toArray(); 
        }
        else{
            $user = null;
        }
        return $user;
    }
}


if (!function_exists('productSearchHelper')) {
    function productSearchHelper($search = '') {
        $geoLocationVender = geoLocation();

        $mobiles = Product::where('brand', 'LIKE', "%{$search}%")
            ->orWhere('price', 'LIKE', "%{$search}%")
            ->orWhere('price_sale', 'LIKE', "%{$search}%")
            ->orWhere('category', 'LIKE', "%{$search}%")
            ->with(['Mobile' => function($query) {
                $query->select('id', 'phone', 'brand', 'status', 'picture_url_small', 'picture_url_big');
            }])
            ->with(['User' => function($query) {
                $query->select('id', 'name', 'shop_name');
            }]);

        if ($geoLocationVender) {
            $mobiles = $mobiles->whereIn('vender_id', $geoLocationVender)->orderBy('created_at', 'DESC');
        } else {
            $mobiles = $mobiles->orderBy('created_at', 'DESC');
        }

        $data = $mobiles->get();
        
        return $data;
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
            $mobiles = $mobiles->orderBy('created_at', 'DESC');
        }

        $data = $mobiles->get();

        return $data;
    }
}


if (!function_exists('productFilterSearchHelper')) {
    function productFilterSearchHelper($category, $filter, $brands, $type = null, $search = '')
    {
        $geoLocationVender = geoLocation();

        $mobiles = Product::where('mobile_type', $type)
            ->with(['Mobile' => function ($query) use ($search) {
                $query->where('phone', 'LIKE', "%{$search}%")
                    ->select('id', 'phone', 'brand', 'status', 'picture_url_small', 'picture_url_big');
            }])
            ->with(['User' => function ($query) {
                $query->select('id', 'name', 'shop_name');
            }])
            ->where(function ($query) use ($search) {
                $query->where('brand', 'LIKE', "%{$search}%")
                    ->orWhere('price', 'LIKE', "%{$search}%")
                    ->orWhere('price_sale', 'LIKE', "%{$search}%")
                    ->orWhere('category', 'LIKE', "%{$search}%")
                    ->orWhereHas('Mobile', function ($query) use ($search) {
                        $query->where('phone', 'LIKE', "%{$search}%");
                    });
            });

        if ($geoLocationVender) {
            $mobiles = $mobiles->whereIn('vender_id', $geoLocationVender)->where('category', $category)->orderBy('created_at', 'DESC');
        } else {
            $mobiles = $mobiles->where('category', $category)->orderBy('created_at', 'DESC');
        }

        $min_price = $filter['min_price'];
        $max_price = $filter['max_price'];

        if ($min_price != null && $max_price != null) {
            if ($brands) {
                $data = $mobiles->whereIn('brand', $brands)->whereBetween('price', [$min_price, $max_price])->get();
            } else {
                $data = $mobiles->whereBetween('price', [$min_price, $max_price])->get();
            }
        } else {
            $data = $mobiles->get();
        }

        return $data;
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
              $mobiles = $mobiles->whereIn('vender_id',$geoLocationVender)->where('category',$category)->orderBy('created_at','DESC');
        }
        else{
             $mobiles = $mobiles->where('category',$category)->orderBy('created_at','DESC');
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









