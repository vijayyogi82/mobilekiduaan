<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Plan;
use App\Models\Discount;
use App\Models\Mobile;
use App\Models\SeoMeta;
use App\Models\Accessory;
use Auth;
use DB;

class AdminController extends Controller
{

    public function dashboard(Request $request)
    {
        $title = 'abc';
        return view('admin.dashboard', compact('title'));
    }

    public function setting(Request $request)
    {   
        $data['setting'] = Setting::first();
        return view('admin.setting', $data);
    }

    public function settingUpdate(Request $request)
    {
        $id = $request->id;
        $data = Setting::where('id', $id)->first();
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->status = $request->status ?? 0;
        if ($request->hasFile('logo')) {
            $profileImage = $request->file('logo');
            $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('logo'), $imageName);
            $data->logo = 'logo/' . $imageName;
        }
        $data->update();
        return  redirect()->route('admin.setting')->with('success', 'Updated Successfull');
    }

    public function plans(){
        $data['plans'] = Plan::get();
        return view('admin.plans.index', $data);
    }

    public function plan_edit($id){
        $data['plan'] = Plan::find($id);
        return view('admin.plans.edit', $data);
    }

    public function plan_update(Request $request, $id)
    {
        $request->validate([
            'price' => 'required|numeric',
        ]);
        $plan = Plan::find($id);
        if ($plan) {
            $plan->price = $request->price;
            $plan->save();
            return redirect()->back()->with('success', 'Plan updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Plan not found!');
        }
    }

    public function discount_code(){
        $data['plans'] = Discount::where('is_deleted', 0)->get();
        return view('admin.discount.index', $data);
    }

    public function discount_add(){
        return view('admin.discount.create');
    }

    public function discount_code_save(Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'code' => 'required'
        ]);
        $exists = Discount::where('start_date', $request->start_date)->where('end_date', $request->end_date)->where('code', $request->code)->first();
        if ($exists) {
            return redirect()->back()->with('error', 'Discount code already exists!');
        }
        $discount = new Discount();
        $discount->start_date = $request->start_date;
        $discount->end_date = $request->end_date;
        $discount->code = $request->code;
        $discount->discount = $request->discount;
        $discount->save();
        return redirect()->route('admin.discount.index')->with('success', 'Discount code added successfully!');
    }
    
    public function discount_edit($id){
        $data['discount'] = Discount::find($id);
        return view('admin.discount.edit', $data);
    }
        
    public function discount_update(Request $request, $id){
        $discount = Discount::find($id);
        $discount->start_date = $request->start_date;
        $discount->end_date = $request->end_date;
        $discount->code = $request->code;
        $discount->discount = $request->discount;
        $discount->save();
        return redirect()->route('admin.discount.index')->with('success', 'Discount code updated successfully!');
    }
            
    public function discount_delete($id){
        $discount = Discount::find($id);
        if ($discount) {
            $discount->update(['is_deleted' => 1]);
            return redirect()->route('admin.discount.index')->with('success', 'Banner deleted successfully');
        }
        return redirect()->route('admin.discount.index')->with('success', 'Discount code deleted successfully!');
    }
    
    public function mobile_index(){
        $mobiles = Mobile::where('type','0')->where('is_deleted', 0)->get();
        // return $mobiles;
        return view('admin.mobiles.index',compact('mobiles'));
    }

    public function refurbnished_mobile(Request $request){
        $mobiles = Mobile::where('type','1')->get();

        if($request->submit == 'edit'){
            $mobile = Mobile::where('id', $request->id)->where('type','1')->first();
            return view('admin.mobiles.refurbnished_mobile_edit',compact('mobile'));
        }

        if($request->submit == 'update'){
            $this->update_refunbnished_mobile($request);
            return redirect()->route('admin.refurbnished.index')->with('success', 'Mobile Updated successfully');
        }

        if($request->submit == 'delete'){
            $mobile = Mobile::where('id', $request->id)->first();
            $mobile->update(['is_deleted' => 1]);
            return redirect()->route('admin.refurbnished.index')->with('success', 'Mobile deleted successfully');
        }
        // return $mobiles;
        return view('admin.mobiles.refurbnished_mobile',compact('mobiles'));
    }



    private function update_refunbnished_mobile(Request $request){
        // dd($request->all());

        $Mobile = Mobile::where('id', $request->id)->where('type','1')->first();
        $id = $request->id;

        if (!$Mobile) {
            return redirect()->route('admin.refurbnished.index')->with('error', 'Mobile not found');
        }

        // PHONE
        $Mobile->brand = $request->brand;
        $Mobile->phone = $request->phone;
        $Mobile->notes = $request->notes;
        $Mobile->fans = $request->fans;
        $Mobile->hits = $request->hits;
        $Mobile->hits_percent = $request->hits_percent;
        $Mobile->memory_internal = $request->memory_internal;

        // NETWORK
        $Mobile->network_techology = $request->network_techology;
        $Mobile->network_2g_bands = $request->network_2g_bands;
        $Mobile->network_3g_bands = $request->network_3g_bands;
        $Mobile->network_4g_bands = $request->network_4g_bands;
        $Mobile->network_5g_bands = $request->network_5g_bands;
        $Mobile->network_speed = $request->network_speed;
        $Mobile->network_gprs = $request->network_gprs;
        $Mobile->network_edge = $request->network_edge;

        // LAUNCH
        $Mobile->launch_announced = $request->launch_announced;
        $Mobile->launch_status = $request->launch_status;
        $Mobile->launch_other = $request->launch_other;

        // BODY
        $Mobile->body_dimensions = $request->body_dimensions;
        $Mobile->body_weight = $request->body_weight;
        $Mobile->body_built = $request->body_built;
        $Mobile->body_keyboard = $request->body_keyboard;
        $Mobile->body_sim = $request->body_sim;
        $Mobile->body_other = $request->body_other;

        // DISPLAY
        $Mobile->display_type = $request->display_type;
        $Mobile->display_size = $request->display_size;
        $Mobile->display_resolution = $request->display_resolution;
        $Mobile->display_protection = $request->display_protection;
        $Mobile->display_other = $request->display_other;

        // PLATFORM
        $Mobile->announced = $request->announced;
        $Mobile->platform_os = $request->platform_os;
        $Mobile->platform_chipset = $request->platform_chipset;
        $Mobile->platform_cpu = $request->platform_cpu;
        $Mobile->platform_gpu = $request->platform_gpu;
        $Mobile->platform_other = $request->platform_other;

        // MEMORY
        $Mobile->memory_card_slot = $request->memory_card_slot;
        $Mobile->memory_phonebook = $request->memory_phonebook;
        $Mobile->memory_call_records = $request->memory_call_records;
        $Mobile->memory_other = $request->memory_other;

        // MAIN CAMERA
        $Mobile->main_camera_dual = $request->main_camera_dual;
        $Mobile->main_camera_triple = $request->main_camera_triple;
        $Mobile->main_camera_quad = $request->main_camera_quad;
        $Mobile->main_camera_five = $request->main_camera_five;
        $Mobile->main_camera_penta = $request->main_camera_penta;
        $Mobile->main_camera_features = $request->main_camera_features;
        $Mobile->main_camera_video = $request->main_camera_video;
        $Mobile->main_camera_single = $request->main_camera_single;
        $Mobile->main_camera_other = $request->main_camera_other;

        // SELFIE CAMERA
        $Mobile->selfie_camera_single = $request->selfie_camera_single;
        $Mobile->selfie_camera_dual = $request->selfie_camera_dual;
        $Mobile->selfie_camera_triple = $request->selfie_camera_triple;
        $Mobile->selfie_camera_quad = $request->selfie_camera_quad;
        $Mobile->selfie_camera_features = $request->selfie_camera_features;
        $Mobile->selfie_camera_video = $request->selfie_camera_video;
        $Mobile->selfie_camera_other = $request->selfie_camera_other;

        // SOUND
        $Mobile->sound_alert_types = $request->sound_alert_types;
        $Mobile->sound_loudspeaker = $request->sound_loudspeaker;
        DB::statement("UPDATE `mobiles` SET `sound_3.5mm_jack` = ? WHERE `id` = ?", [$request->input('sound_3_5mm_jack'), $id]);
        $Mobile->sound_other = $request->sound_other;

        // COMMS
        $Mobile->comms_wlan = $request->comms_wlan;
        $Mobile->comms_gps = $request->comms_gps;
        $Mobile->comms_positioning = $request->comms_positioning;
        $Mobile->comms_nfc = $request->comms_nfc;
        $Mobile->comms_radio = $request->comms_radio;
        $Mobile->comms_usb = $request->comms_usb;
        $Mobile->comms_bluetooth = $request->comms_bluetooth;
        $Mobile->comms_other = $request->comms_other;
        

        // FEATURES
        $Mobile->features_sensors = $request->features_sensors;
        $Mobile->features_messaging = $request->features_messaging;
        $Mobile->features_browser = $request->features_browser;
        $Mobile->features_clock = $request->features_clock;
        $Mobile->features_alarm = $request->features_alarm;
        $Mobile->features_games = $request->features_games;
        $Mobile->features_languages = $request->features_languages;
        $Mobile->features_java = $request->features_java;
        $Mobile->features_other = $request->features_other;

        // BATTERY
        $Mobile->battery_other = $request->battery_other;
        $Mobile->battery_stand_by = $request->battery_stand_by;
        $Mobile->battery_talk_time = $request->battery_talk_time;
        $Mobile->battery_music_play = $request->battery_music_play;
        $Mobile->battery_charging = $request->battery_charging;
        $Mobile->battery_type = $request->battery_type;

        // MISC
        $Mobile->misc_colors = $request->misc_colors;
        $Mobile->misc_models = $request->misc_models;
        $Mobile->misc_sar_us = $request->misc_sar_us;
        $Mobile->misc_sar_eu = $request->misc_sar_eu;
        $Mobile->misc_price_group = $request->misc_price_group;
        $Mobile->misc_other = $request->misc_other;
        
        // TESTS
        $Mobile->tests_performance = $request->tests_performance;
        $Mobile->tests_display = $request->tests_display;
        $Mobile->tests_camera = $request->tests_camera;
        $Mobile->tests_loudspeaker = $request->tests_loudspeaker;
        $Mobile->tests_audio_quality = $request->tests_audio_quality;
        $Mobile->tests_battery_life = $request->tests_battery_life;
        $Mobile->date_updated = $request->date_updated;
        $Mobile->tests_performance = $request->tests_performance;

        $Mobile->update();
    }

    public function mobile_add(Request $request){

        // return $request->user();
        return view('admin.mobiles.create');
    }

    public function mobile_edit($id){
        $mobile = Mobile::where('type','0')->where('iS_deleted','0')->find($id);
        return view('admin.mobiles.edit',compact('mobile'));
    }

    public function mobile_store(Request $request){
        // dd($request->all());

        $Mobile = new Mobile();
        
        // PHONE
        $Mobile->brand = $request->brand;
        $Mobile->phone = $request->phone;
        $Mobile->notes = $request->notes;
        $Mobile->fans = $request->fans;
        $Mobile->hits = $request->hits;
        $Mobile->hits_percent = $request->hits_percent;
        $Mobile->memory_internal = $request->memory_internal;

        $allImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $imageFile) {
                $imageName = $key . time() . '.' . $imageFile->getClientOriginalExtension();
                $imageFile->move(public_path('refubished'), $imageName);
                $allImages[] = 'refubished/' . $imageName;
            }
        }
        $Mobile->picture_url_big = implode(';', $allImages);

        // NETWORK
        $Mobile->network_techology = $request->network_techology;
        $Mobile->network_2g_bands = $request->network_2g_bands;
        $Mobile->network_3g_bands = $request->network_3g_bands;
        $Mobile->network_4g_bands = $request->network_4g_bands;
        $Mobile->network_5g_bands = $request->network_5g_bands;
        $Mobile->network_speed = $request->network_speed;
        $Mobile->network_gprs = $request->network_gprs;
        $Mobile->network_edge = $request->network_edge;

        // LAUNCH
        $Mobile->launch_announced = $request->launch_announced;
        $Mobile->launch_status = $request->launch_status;
        $Mobile->launch_other = $request->launch_other;

        // BODY
        $Mobile->body_dimensions = $request->body_dimensions;
        $Mobile->body_weight = $request->body_weight;
        $Mobile->body_sim = $request->body_sim;
        $Mobile->body_other = $request->body_other;

        // DISPLAY
        $Mobile->display_type = $request->display_type;
        $Mobile->display_size = $request->display_size;
        $Mobile->display_resolution = $request->display_resolution;
        $Mobile->display_protection = $request->display_protection;
        $Mobile->platform_chipset = $request->platform_chipset;
        $Mobile->platform_cpu = $request->platform_cpu;
        $Mobile->platform_gpu = $request->platform_gpu;
        
        // PLATFORM
        $Mobile->announced = $request->announced;
        $Mobile->body_built = $request->body_built;
        $Mobile->body_keyboard = $request->body_keyboard;
        $Mobile->display_other = $request->display_other;

        // MEMORY
        $Mobile->platform_os = $request->platform_os;
        $Mobile->platform_other = $request->platform_other;
        $Mobile->memory_card_slot = $request->memory_card_slot;
        $Mobile->memory_phonebook = $request->memory_phonebook;
        $Mobile->memory_call_records = $request->memory_call_records;
        $Mobile->memory_other = $request->memory_other;

        // MAIN CAMERA
        $Mobile->main_camera_dual = $request->main_camera_dual;
        $Mobile->main_camera_triple = $request->main_camera_triple;
        $Mobile->main_camera_quad = $request->main_camera_quad;
        $Mobile->main_camera_five = $request->main_camera_five;
        $Mobile->main_camera_penta = $request->main_camera_penta;
        $Mobile->main_camera_features = $request->main_camera_features;
        $Mobile->main_camera_video = $request->main_camera_video;
        $Mobile->main_camera_single = $request->main_camera_single;
        $Mobile->main_camera_other = $request->main_camera_other;

        // SELFIE CAMERA
        $Mobile->selfie_camera_single = $request->selfie_camera_single;
        $Mobile->selfie_camera_dual = $request->selfie_camera_dual;
        $Mobile->selfie_camera_triple = $request->selfie_camera_triple;
        $Mobile->selfie_camera_quad = $request->selfie_camera_quad;
        $Mobile->selfie_camera_features = $request->selfie_camera_features;
        $Mobile->selfie_camera_video = $request->selfie_camera_video;
        $Mobile->selfie_camera_other = $request->selfie_camera_other;
        

        // SOUND
        $Mobile->sound_alert_types = $request->sound_alert_types;
        $Mobile->sound_loudspeaker = $request->sound_loudspeaker;
        $Mobile->sound_other = $request->sound_other;
        
        // COMMS
        $Mobile->comms_wlan = $request->comms_wlan;
        $Mobile->comms_gps = $request->comms_gps;
        $Mobile->comms_positioning = $request->comms_positioning;
        $Mobile->comms_nfc = $request->comms_nfc;
        $Mobile->comms_radio = $request->comms_radio;
        $Mobile->comms_usb = $request->comms_usb;
        $Mobile->comms_bluetooth = $request->comms_bluetooth;
        $Mobile->comms_other = $request->comms_other;
        
        // FEATURES
        $Mobile->features_sensors = $request->features_sensors;
        $Mobile->features_messaging = $request->features_messaging;
        $Mobile->features_browser = $request->features_browser;
        $Mobile->features_clock = $request->features_clock;
        $Mobile->features_alarm = $request->features_alarm;
        $Mobile->features_games = $request->features_games;
        $Mobile->features_languages = $request->features_languages;
        $Mobile->features_java = $request->features_java;
        $Mobile->features_other = $request->features_other;
        
        // BATTERY
        $Mobile->battery_other = $request->battery_other;
        $Mobile->battery_stand_by = $request->battery_stand_by;
        $Mobile->battery_talk_time = $request->battery_talk_time;
        $Mobile->battery_music_play = $request->battery_music_play;
        $Mobile->battery_charging = $request->battery_charging;
        $Mobile->battery_type = $request->battery_type;
        
        // MISC
        $Mobile->misc_colors = $request->misc_colors;
        $Mobile->misc_models = $request->misc_models;
        $Mobile->misc_sar_us = $request->misc_sar_us;
        $Mobile->misc_sar_eu = $request->misc_sar_eu;
        $Mobile->misc_price_group = $request->misc_price_group;
        $Mobile->misc_other = $request->misc_other;
        
        
        // TESTS
        $Mobile->tests_performance = $request->tests_performance;
        $Mobile->tests_display = $request->tests_display;
        $Mobile->tests_camera = $request->tests_camera;
        $Mobile->tests_loudspeaker = $request->tests_loudspeaker;
        $Mobile->tests_audio_quality = $request->tests_audio_quality;
        $Mobile->tests_battery_life = $request->tests_battery_life;
        $Mobile->date_updated = $request->date_updated;
        $Mobile->tests_performance = $request->tests_performance;
        
        $Mobile->save();

        DB::statement("UPDATE `mobiles` SET `sound_3.5mm_jack` = ? WHERE `id` = ?", [$request->input('sound_3_5mm_jack'), $Mobile->id]);
        return redirect()->back()->with('success', 'Added successfully!');
    }


    public function mobile_update(Request $request, $id){

        // dd($request->all());

        $Mobile = Mobile::find($id);

        // PHONE
        $Mobile->brand = $request->brand;
        $Mobile->phone = $request->phone;
        $Mobile->notes = $request->notes;
        $Mobile->fans = $request->fans;
        $Mobile->hits = $request->hits;
        $Mobile->hits_percent = $request->hits_percent;
        $Mobile->memory_internal = $request->memory_internal;

        // NETWORK
        $Mobile->network_techology = $request->network_techology;
        $Mobile->network_2g_bands = $request->network_2g_bands;
        $Mobile->network_3g_bands = $request->network_3g_bands;
        $Mobile->network_4g_bands = $request->network_4g_bands;
        $Mobile->network_5g_bands = $request->network_5g_bands;
        $Mobile->network_speed = $request->network_speed;
        $Mobile->network_gprs = $request->network_gprs;
        $Mobile->network_edge = $request->network_edge;

        // LAUNCH
        $Mobile->launch_announced = $request->launch_announced;
        $Mobile->launch_status = $request->launch_status;
        $Mobile->launch_other = $request->launch_other;

        // BODY
        $Mobile->body_dimensions = $request->body_dimensions;
        $Mobile->body_weight = $request->body_weight;
        $Mobile->body_built = $request->body_built;
        $Mobile->body_keyboard = $request->body_keyboard;
        $Mobile->body_sim = $request->body_sim;
        $Mobile->body_other = $request->body_other;

        // DISPLAY
        $Mobile->display_type = $request->display_type;
        $Mobile->display_size = $request->display_size;
        $Mobile->display_resolution = $request->display_resolution;
        $Mobile->display_protection = $request->display_protection;
        $Mobile->display_other = $request->display_other;

        // PLATFORM
        $Mobile->announced = $request->announced;
        $Mobile->platform_os = $request->platform_os;
        $Mobile->platform_chipset = $request->platform_chipset;
        $Mobile->platform_cpu = $request->platform_cpu;
        $Mobile->platform_gpu = $request->platform_gpu;
        $Mobile->platform_other = $request->platform_other;

        // MEMORY
        $Mobile->memory_card_slot = $request->memory_card_slot;
        $Mobile->memory_phonebook = $request->memory_phonebook;
        $Mobile->memory_call_records = $request->memory_call_records;
        $Mobile->memory_other = $request->memory_other;

        // MAIN CAMERA
        $Mobile->main_camera_dual = $request->main_camera_dual;
        $Mobile->main_camera_triple = $request->main_camera_triple;
        $Mobile->main_camera_quad = $request->main_camera_quad;
        $Mobile->main_camera_five = $request->main_camera_five;
        $Mobile->main_camera_penta = $request->main_camera_penta;
        $Mobile->main_camera_features = $request->main_camera_features;
        $Mobile->main_camera_video = $request->main_camera_video;
        $Mobile->main_camera_single = $request->main_camera_single;
        $Mobile->main_camera_other = $request->main_camera_other;

        // SELFIE CAMERA
        $Mobile->selfie_camera_single = $request->selfie_camera_single;
        $Mobile->selfie_camera_dual = $request->selfie_camera_dual;
        $Mobile->selfie_camera_triple = $request->selfie_camera_triple;
        $Mobile->selfie_camera_quad = $request->selfie_camera_quad;
        $Mobile->selfie_camera_features = $request->selfie_camera_features;
        $Mobile->selfie_camera_video = $request->selfie_camera_video;
        $Mobile->selfie_camera_other = $request->selfie_camera_other;

        // SOUND
        $Mobile->sound_alert_types = $request->sound_alert_types;
        $Mobile->sound_loudspeaker = $request->sound_loudspeaker;
        DB::statement("UPDATE `mobiles` SET `sound_3.5mm_jack` = ? WHERE `id` = ?", [$request->input('sound_3_5mm_jack'), $id]);
        $Mobile->sound_other = $request->sound_other;

        // COMMS
        $Mobile->comms_wlan = $request->comms_wlan;
        $Mobile->comms_gps = $request->comms_gps;
        $Mobile->comms_positioning = $request->comms_positioning;
        $Mobile->comms_nfc = $request->comms_nfc;
        $Mobile->comms_radio = $request->comms_radio;
        $Mobile->comms_usb = $request->comms_usb;
        $Mobile->comms_bluetooth = $request->comms_bluetooth;
        $Mobile->comms_other = $request->comms_other;
        

        // FEATURES
        $Mobile->features_sensors = $request->features_sensors;
        $Mobile->features_messaging = $request->features_messaging;
        $Mobile->features_browser = $request->features_browser;
        $Mobile->features_clock = $request->features_clock;
        $Mobile->features_alarm = $request->features_alarm;
        $Mobile->features_games = $request->features_games;
        $Mobile->features_languages = $request->features_languages;
        $Mobile->features_java = $request->features_java;
        $Mobile->features_other = $request->features_other;

        // BATTERY
        $Mobile->battery_other = $request->battery_other;
        $Mobile->battery_stand_by = $request->battery_stand_by;
        $Mobile->battery_talk_time = $request->battery_talk_time;
        $Mobile->battery_music_play = $request->battery_music_play;
        $Mobile->battery_charging = $request->battery_charging;
        $Mobile->battery_type = $request->battery_type;

        // MISC
        $Mobile->misc_colors = $request->misc_colors;
        $Mobile->misc_models = $request->misc_models;
        $Mobile->misc_sar_us = $request->misc_sar_us;
        $Mobile->misc_sar_eu = $request->misc_sar_eu;
        $Mobile->misc_price_group = $request->misc_price_group;
        $Mobile->misc_other = $request->misc_other;
        
        // TESTS
        $Mobile->tests_performance = $request->tests_performance;
        $Mobile->tests_display = $request->tests_display;
        $Mobile->tests_camera = $request->tests_camera;
        $Mobile->tests_loudspeaker = $request->tests_loudspeaker;
        $Mobile->tests_audio_quality = $request->tests_audio_quality;
        $Mobile->tests_battery_life = $request->tests_battery_life;
        $Mobile->date_updated = $request->date_updated;
        $Mobile->tests_performance = $request->tests_performance;

        $Mobile->update();
        return redirect()->back()->with('success', 'Updated successfully!');
    }


    public function mobile_delete($id){
        $Mobile = Mobile::find($id);
        if ($Mobile) {
            $Mobile->update(['is_deleted' => 1]);
            return redirect()->route('admin.mobile.index')->with('success', 'deleted successfully');
        }
        return redirect()->route('admin.mobile.index')->with('success', 'deleted successfully!');
    }

    public function mobile_add_image(Request $request)
    {
        $mobile_id = $request->mobile_id;
        $mobile = Mobile::find($mobile_id);
    
        if (!$mobile) {
            return redirect()->back()->with('error', 'Data not found');
        }
    
        $existingImages = explode(';', $mobile->picture_url_big);
        $allImages = array_filter($existingImages);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $imageFile) {
                $imageName = $key . time() . '.' . $imageFile->getClientOriginalExtension();
                $imageFile->move(public_path('refubished'), $imageName);
                $allImages[] = 'refubished/' . $imageName;
            }
        }
    
        $mobile->picture_url_big = implode(';', $allImages);
        $mobile->save();
    
        return redirect()->back()->with('success', 'Image uploaded successfully!');
    }
    



    public function mobile_delete_image(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'key' => 'required|integer',
        ]);
        $mobile = Mobile::find($request->id);
        if ($mobile) {
            $images = explode(';', $mobile->picture_url_big);
            // return  $images;
            if (isset($images[$request->key])) {
                $imagePath = public_path($images[$request->key]);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                unset($images[$request->key]);
                $mobile->picture_url_big = implode(';', $images);
                $mobile->save();
                return response()->json(['success' => true, 'message' => 'Image deleted successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Invalid image key'], 400);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Mobile record not found'], 404);
        }
    }


    // META SEO
    public function update_seo(Request $request, $page_name) {
        $data['datas'] = SeoMeta::where('page_name', $page_name)->first();
    
        if ($request->save == 'save_data') {
            $id = $request->id;
            $data = SeoMeta::where('id', $id)->first();
            if (!$data) {
                $data = new SeoMeta;
            }
            $data->meta_title = $request->meta_title;
            $data->meta_description = $request->meta_description;
            $data->meta_keywords = $request->meta_keywords;
            $data->canonical_url = $request->canonical_url;
            $data->page_name = $page_name;
            $data->footer_content = $request->footer_content;
            $data->save();
            return redirect()->route('admin.seo_page', $page_name)->with('success', 'Updated Successfully');
        }
        return view('admin.seo.seo_page', $data);
    }

    public function meta_seo_footer(){
        $data = SeoMeta::where('page_name', 'footer')->first();
        return  view('admin.seo.meta_seo_footer',compact('data'));
    }

    public function meta_seo_footer_update(Request $request){
        $data = SeoMeta::select('id','meta_keywords')->where('id',$request->id)->where('page_name', 'footer')->first();
        // return $data;
        $data->meta_keywords = $request->meta_keywords;
        $data->update();
        return redirect()->route('admin.meta_seo_footer')->with('success', 'Updated Successfully');
    }


    // MOBILE ACCESSORIES
    public function mobile_accessories(Request $request) {
        $mobiles = Accessory::orderBy('id','desc')->get();

        // return $mobiles;
    
        if ($request->submit == 'save') {
            $this->AccessorySave($request);
            return redirect()->route('admin.mobile.accessories')->with('success', 'Accessory Added successfully');
        }
    
        if ($request->submit == 'update') {
            $this->AccessoryUpdate($request);
            return redirect()->route('admin.mobile.accessories')->with('success', 'Accessory Updated successfully');
        }
    
        if ($request->submit == 'delete') {
            $mobile = Accessory::where('id', $request->id)->first();
            $mobile->update(['is_deleted' => 1]);
            return redirect()->route('admin.mobile.accessories')->with('success', 'Accessory deleted successfully');
        }
    
        return view('admin.mobiles.mobile_accessories', compact('mobiles'));
    }

    public function mobile_accessories_add() {
        $accessories = Accessory::get()->unique('type');
        return view('admin.mobiles.mobile_accessories_add',compact('accessories'));
    }

    public function mobile_accessories_edit($id) {
        $accessory = Accessory::find($id);
        if(!$accessory){
            return redirect()->back();
        }
        $accessories = Accessory::get()->unique('type');
        return view('admin.mobiles.mobile_accessories_edit',compact('accessory','accessories'));
    }

    public function mobile_accessories_data(Request $request) {
        $accessory = Accessory::where('id', $request->id)->first();
        $html = view('admin.mobiles.accessories_ajax',compact('accessory'))->render();
        echo $html;
    }


    private function AccessorySave(Request $request){
        // dd($request->all());

        $data = new Accessory();
        $data->brand = $request->brand;
        $data->model_name = $request->model_name;
        $data->model = $request->model;
        $data->type = $request->type;
        $data->dial_shape = $request->dial_shape;
        $data->touch_screen = $request->touch_screen;
        $data->water_resistant = $request->water_resistant;
        $data->driver_size = $request->driver_size;
        $data->weight = $request->weight;
        $data->capacity = $request->capacity;
        $data->battery_life = $request->battery_life;
        $data->display_resolution_size = $request->display_resolution_size;
        $data->transmission_Features = $request->transmission_Features;
        $data->battery = $request->battery;
        $data->compatible_devices = $request->compatible_devices;
        $data->part_number = $request->part_number;
        $data->mic = $request->mic;
        $data->length = $request->length;
        $data->version = $request->version;
        $data->wireless_range = $request->wireless_range;
        $data->speed = $request->speed;
        $data->card_type = $request->card_type;
        $data->connector_port = $request->connector_port;
        $data->output_voltage = $request->output_voltage;
        $data->output_current = $request->output_current;
        $data->charging_time = $request->charging_time;
        $data->charging_cable = $request->charging_cable;
        $data->sales_package = $request->sales_package;
        $data->price = $request->price;

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('accessories'), $imageName);
            $data->image = 'accessories/' . $imageName;
        }

        $data->save();
    }


    private function AccessoryUpdate(Request $request){
        // dd($request->all());
        $id =  $request->id;
        $data = Accessory::where('id', $id)->first();
        // dd($data);
        $data->brand = $request->brand;
        $data->model_name = $request->model_name;
        $data->model = $request->model;
        $data->type = $request->type;
        $data->dial_shape = $request->dial_shape;
        $data->touch_screen = $request->touch_screen;
        $data->water_resistant = $request->water_resistant;
        $data->driver_size = $request->driver_size;
        $data->weight = $request->weight;
        $data->capacity = $request->capacity;
        $data->battery_life = $request->battery_life;
        $data->display_resolution_size = $request->display_resolution_size;
        $data->transmission_Features = $request->transmission_Features;
        $data->battery = $request->battery;
        $data->compatible_devices = $request->compatible_devices;
        $data->part_number = $request->part_number;
        $data->mic = $request->mic;
        $data->length = $request->length;
        $data->version = $request->version;
        $data->wireless_range = $request->wireless_range;
        $data->speed = $request->speed;
        $data->card_type = $request->card_type;
        $data->connector_port = $request->connector_port;
        $data->output_voltage = $request->output_voltage;
        $data->output_current = $request->output_current;
        $data->charging_time = $request->charging_time;
        $data->charging_cable = $request->charging_cable;
        $data->sales_package = $request->sales_package;
        $data->price = $request->price;

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('accessories'), $imageName);
            $data->image = 'accessories/' . $imageName;
        }

        $data->save();
    }



    public function visiters(){
        return view('admin.visitors');
    }
    

    
}
