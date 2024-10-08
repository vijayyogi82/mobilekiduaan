@extends('layouts.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.js" ></script>
<style>
    li.parsley-required {
    color: red;
}
.parsley-range{
    color: red;
}
</style>
<section class="body-content">
    <div class="container-fluid breadcrumb__area pt-3 pb-3 mb-5">
        <div class="container">
            <div class="col-12">
                <h2><b>{{$product->mobile ? $product->mobile->phone : ''}}</b></h2>
            </div>
        </div>
    </div>
    <div class="container-fluid pb-4">
        <div class="row mx-3 p-0 white-bg">
            <div class="col-md-4 col-12 product-image-container p-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme product-image-slider">
                            @if(count(explode(";",$product->Mobile->picture_url_big)) !=0)
                                @foreach(explode(";",$product->Mobile->picture_url_big) as $key=>$img)
                                    @if($img)
                                        @if (strpos($img, 'https://fdn2.gsmarena.com') !== false)
                                            <div class="item">
                                                <img src="{{$img}}" alt="{{$product->mobile ? $product->mobile->phone : ''}}">
                                            </div>
                                        @else  
                                            <div class="item">
                                                <img src="{{asset($img)}}" alt="{{$product->mobile ? $product->mobile->phone : ''}}">
                                            </div>
                                        @endif
                                    @else
                                        <div class="item">
                                            <img src="{{asset('assets/web/images/download.png')}}" alt="{{$product->mobile ? $product->mobile->phone : ''}}">
                                        </div>
                                    @endif
                                @endforeach    
                            @endif
                        </div> 
                        <div class="owl-carousel owl-theme thumb-image-slider mt-3">
                        @if(count(explode(";",$product->Mobile->picture_url_big)) !=0)
                            @foreach(explode(";",$product->Mobile->picture_url_big) as $key=>$img)
                            
                                @if($img)
                                    @if (strpos($img, 'https://fdn2.gsmarena.com') !== false)
                                        
                                        <div class="item thumb-item">
                                            <img src="{{$img}}" alt="{{$product->mobile ? $product->mobile->phone : ''}}">
                                        </div>
                                    @else  
                                    
                                        <div class="item thumb-item">
                                            <img src="{{asset($img)}}" alt="{{$product->mobile ? $product->mobile->phone : ''}}">
                                        </div>
                                    @endif
                                    
                                @else
                                    <div class="item thumb-item">
                                        <img src="{{asset('assets/web/images/download.png')}}" alt="{{$product->mobile ? $product->mobile->phone : ''}}">
                                    </div>
                                    
                                @endif
                            @endforeach
                        @endif 
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="col-md-4 col-12 product-image-container p-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme product-image-slider">
                            <div class="item">
                                <img src="{{asset('assets/web/images/oppo-f25-pro-1.jpg')}}" alt="Product Image 1">
                            </div>
                            <div class="item">
                                <img src="{{asset('assets/web/images/oppo-f25-pro-2.jpg')}}" alt="Product Image 2">
                            </div>
                            <div class="item">
                                <img src="{{asset('assets/web/images/oppo-f25-pro-3.jpg')}}" alt="Product Image 3">
                            </div>
                        </div>
                        <div class="owl-carousel owl-theme thumb-image-slider mt-3">
                            <div class="item thumb-item">
                                <img src="{{asset('assets/web/images/oppo-f25-pro-1.jpg')}}" alt="Product Thumbnail 1">
                            </div>
                            <div class="item thumb-item">
                                <img src="{{asset('assets/web/images/oppo-f25-pro-2.jpg')}}" alt="Product Thumbnail 2">
                            </div>
                            <div class="item thumb-item">
                                <img src="{{asset('assets/web/images/oppo-f25-pro-3.jpg')}}" alt="Product Thumbnail 3">
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="col-md-4 col-12 p-4">
                
                <div class="row">
                    <div class="col">
                      <!-- <img src="{{asset('assets/web/images/icon-1.png')}}" alt="" style="height: 25px;">  -->
                       
                        @if($product->mobile->display_size)
                        <!-- <span class="product-attribute-title">Display Size:</span> -->
                        <p style="display: flex;align-items: center;"><img src="{{asset('assets/web/images/icon-1.jpeg')}}" alt="" style="height:26px;padding-right: 8px;"><b>{{explode(",", $product->mobile->display_size)[0]}}</b></p>
                        @endif

                        @if($product->mobile->display_type)
                            <!-- <span class="product-attribute-title">Display Type:</span> -->
                            <p style="display: flex;align-items: center;"><img src="{{asset('assets/web/images/icon-2.jpeg')}}" alt="" style="height:29px;padding-right: 8px;"><b>{{explode(",", $product->mobile->display_type)[0]}}</b></p> 
                        @endif

                        @if($product->mobile->platform_chipset)
                            <!-- <span class="product-attribute-title">Platform Chipset:</span> -->
                            <p style="display: flex;align-items: center;"><img src="{{asset('assets/web/images/icon-3.jpeg')}}" alt="" style="height:29px;padding-right: 8px;"><b>{{$product->mobile->platform_chipset}}</b></p>
                        @endif

                        @if($product->mobile->platform_cpu)
                            <!-- <span class="product-attribute-title">Platform CPU:</span> -->
                            <p style="display: flex;align-items: center;"><img src="{{asset('assets/web/images/icon-7.jpeg')}}" alt="" style="height:26px;padding-right: 8px;"><b>{{$product->mobile->platform_cpu}}</b></p>
                        @endif

                        @if($product->mobile->main_camera_triple)
                            <!-- <span class="product-attribute-title">Main Camera:</span> -->
                            <p style="display: flex;align-items: center;"><img src="{{asset('assets/web/images/icon-6.jpeg')}}" alt="" style="height:29px;padding-right: 8px;"><b>{{explode(",", $product->mobile->main_camera_triple)[0]}}</b></p>
                        @endif

                        @if($product->mobile->main_camera_dual)
                            <!-- <span class="product-attribute-title">Main Camera:</span> -->
                            <p style="display: flex;align-items: center;"><img src="{{asset('assets/web/images/icon-6.jpeg')}}" alt="" style="height:29px;padding-right: 8px;"><b>{{explode(",", $product->mobile->main_camera_dual)[0]}}</b></p>
                        @endif

                        @if($product->mobile->main_camera_quad)
                            <!-- <span class="product-attribute-title">Main Camera:</span> -->
                            <p style="display: flex;align-items: center;"><img src="{{asset('assets/web/images/icon-6.jpeg')}}" alt="" style="height:29px;padding-right: 8px;"><b>{{explode(",", $product->mobile->main_camera_quad)[0]}}</b></p>
                        @endif

                        @if($product->mobile->selfie_camera_single)
                            <!-- <span class="product-attribute-title">Selfie Camera:</span> -->
                            <p style="display: flex;align-items: center;"><img src="{{asset('assets/web/images/icon-8.jpeg')}}" alt="" style="height:26px;padding-right: 8px;"><b>{{explode(",", $product->mobile->selfie_camera_single)[0]}}</b></p>
                        @endif
                        @if($product->mobile->selfie_camera_dual)
                            <!-- <span class="product-attribute-title">Selfie Camera:</span> -->
                            <p style="display: flex;align-items: center;"><img src="{{asset('assets/web/images/icon-8.jpeg')}}" alt="" style="height:26px;padding-right: 8px;"><b>{{explode(",", $product->mobile->selfie_camera_dual)[0]}}</b></p>
                        @endif
                        @if($product->mobile->selfie_camera_triple)
                            <!-- <span class="product-attribute-title">Selfie Camera:</span> -->
                            <p style="display: flex;align-items: center;"><img src="{{asset('assets/web/images/icon-8.jpeg')}}" alt="" style="height:26px;padding-right: 8px;"><b>{{explode(",", $product->mobile->selfie_camera_triple)[0]}}</b></p>
                        @endif

                        @if($product->mobile->battery_other)
                            <!-- <span class="product-attribute-title">Selfie Camera:</span> -->
                            <p style="display: flex;align-items: center;"><img src="{{asset('assets/web/images/icon-10.jpeg')}}" alt="" style="height:26px;padding-right: 8px;"><b>{{explode(",", $product->mobile->battery_other)[0]}}</b></p>
                        @endif
                        <span class="product-attribute-title">Memory</span>
                        <ul class="product-attribute-list list-unstyled row">
                        @if($product->Mobile->memory_internal)
                           @foreach(explode("RAM,", $product->Mobile->memory_internal) as $key=>$ram)
                                <li data-slug="{{str_replace('RAM;','',$ram)}}" data-id="42" class="product-attribute-item col-sm-4 col-6">
                                    <label>
                                        <input name="attribute_size_816787846" data-side_ram="{{$ram}}" data-key_id="{{$key}}" type="radio"   class="product-filter-item size_click" {{$key==0 ? 'checked' : ''}}> 
                                        <span class="attribute-value " >{{str_replace('RAM;','',$ram)}}</span>
                                    </label>
                                </li>
                            @endforeach
                        @endif 
                        </ul>

                        <span class="product-attribute-title">Color:</span>
                        @if($product->Mobile->misc_colors)
                            <label>
                                <span>{{$product->Mobile->misc_colors}}</span>
                            </label>
                        @endif 
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 p-4">
                <div class="row">
                    <div class="col">
                        <h4 class="vendor-options"><b>Store Option</b></h4>
                        @if(count($venders)>0)
                            @foreach($venders as $vender)
                                <div class="vendor-option my-3 p-3 border rounded">
                                    <div class="row">
                                        <div class="col-7">
                                        @php
                                            $price_key  = [];
                                                foreach(explode(';', $vender->memory_price) as $key =>$m_price){
                                                    if($m_price == 'N.A' || $m_price == null){
                                                        
                                                    }
                                                    else{
                                                        $price_key = $key;
                                                    }
                                                }
                                        @endphp        
                                            <span class="vendor-price g9WBQb_{{$vender->vender_id}}">₹{{ explode(';', $vender->memory_price)[$price_key] }}</span><br>
                                            <span style=" font-size: 10px;">{{$vender->phone_offer ?? ''}}</span><br>
                                            <a href="#" class="vendor-link" target="_blank" rel="noopener">{{$vender->user ? $vender->user->shop_name : ''}}</a><br>
                                            @if(isset($geoLocationDistance[$vender->user->id]) && isset($geoLocationDistance[$vender->user->id]['distance']))
                                                <span class="small">{{$geoLocationDistance[$vender->user->id]['distance']}}</span>
                                            
                                            @endif
                                        </div>
                                        <div class="col-5 text-right">
                                            <a href="#" type="button" class="btn vendor-button FkMp mySizeChart_{{$vender->User ? $vender->User->id : ''}}" data-product_id="{{$vender->User ? $vender->User->id : ''}}" data-toggle="modal" data-target="#exampleModalCenter">View Store</a>
                                            <a href="#" type="button" class="mt-2 btn call_now_btn mySizeChart_{{$vender->User ? $vender->User->id : ''}}" data-product_id="{{$vender->User ? $vender->User->id : ''}}" data-toggle="modal" data-target="#exampleModalCenterCallNow" style="color: #1ecbe1;">Call Now</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                          <span style="color:red">This Location Store`s Not Found</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row mx-3 pb-4 white-bg">
            <div class="col-md-6 col-12 specification-section">
                <div class="table-detail mb-2">
                    <table cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <th colspan="2">NETWORK</th>
                            </tr>
                            @if($product->mobile['network_techology'])
                                <tr>
                                    <td class="specification-title" width="20%">Techology</td>
                                    <td>{{$product->mobile->network_techology}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['network_2g_bands'])
                                <tr>
                                    <td class="specification-title" width="20%">2G Bands</td>
                                    <td>{{$product->mobile->network_2g_bands}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['network_3g_bands'])
                                <tr>
                                    <td class="specification-title" width="20%">3G Bands</td>
                                    <td>{{$product->mobile->network_3g_bands}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['network_4g_bands'])
                                <tr>
                                    <td class="specification-title" width="20%">4G Bands</td>
                                    <td>{{$product->mobile->network_4g_bands}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['network_5g_bands'])
                                <tr>
                                    <td class="specification-title" width="20%">5G Bands</td>
                                    <td>{{$product->mobile->network_5g_bands}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['network_speed'])
                                <tr>
                                    <td class="specification-title" width="20%">Speed</td>
                                    <td>{{$product->mobile->network_speed}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['network_edge'])
                                <tr>
                                    <td class="specification-title" width="20%">EDGE</td>
                                    <td>{{$product->mobile->network_edge}}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="table-detail mb-2">
                    <table cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <th colspan="2">BODY</th>
                            </tr>
                            @if($product->mobile['body_dimensions'])
                                <tr>
                                    <td class="specification-title" width="20%">Dimensions</td>
                                    <td>{{$product->mobile->body_dimensions}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['body_weight'])
                                <tr>
                                    <td class="specification-title" width="20%">Weight</td>
                                    <td>{{$product->mobile->body_weight}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['body_built'])
                                <tr>
                                    <td class="specification-title" width="20%">Build</td>
                                    <td>{{$product->mobile->body_built}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['body_sim'])
                                <tr>
                                    <td class="specification-title" width="20%">SIM</td>
                                    <td>{{$product->mobile->body_sim}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['body_keyboard'])
                                <tr>
                                    <td class="specification-title" width="20%">KEYBOARD</td>
                                    <td>{{$product->mobile->body_keyboard}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['body_other'])
                                <tr>
                                    <td class="specification-title" width="20%">Other</td>
                                    <td>{{$product->mobile->body_other}}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="table-detail mb-2">
                    <table cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <th colspan="2">DISPLAY</th>
                            </tr>
                            @if($product->mobile['display_type'])
                                <tr>
                                    <td class="specification-title" width="20%">Type</td>
                                    <td>{{$product->mobile->display_type}}</td>
                                </tr>
                            @endif   
                            @if($product->mobile['display_size'])
                                <tr>
                                    <td class="specification-title" width="20%">Size</td>
                                    <td>{{$product->mobile->display_size}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['display_resolution'])
                                <tr>
                                    <td class="specification-title" width="20%">Resolution</td>
                                    <td>{{$product->mobile->display_resolution}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['display_protection'])
                                <tr>
                                    <td class="specification-title" width="20%">Protection</td>
                                    <td>{{$product->mobile->display_protection}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['display_other'])
                                <tr>
                                    <td class="specification-title" width="20%">Other</td>
                                    <td>{{$product->mobile->display_other}}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="table-detail mb-2">
                    <table cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <th colspan="2">PLATFORM</th>
                            </tr>
                            @if($product->mobile['platform_os'])
                                <tr>
                                    <td class="specification-title" width="20%">OS</td>
                                    <td>{{$product->mobile->platform_os}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['platform_chipset'])
                                <tr>
                                    <td class="specification-title" width="20%">Chipset</td>
                                    <td>{{$product->mobile->platform_chipset}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['platform_cpu'])
                                <tr>
                                    <td class="specification-title" width="20%">CPU</td>
                                    <td>{{$product->mobile->platform_cpu}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['platform_gpu'])
                                <tr>
                                    <td class="specification-title" width="20%">GPU</td>
                                    <td>{{$product->mobile->platform_gpu}}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="table-detail mb-2">
                    <table cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <th colspan="2">MEMORY</th>
                            </tr>
                            @if($product->mobile['memory_card_slot'])
                                <tr>
                                    <td class="specification-title" width="20%">Card slot</td>
                                    <td>{{$product->mobile->memory_card_slot}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['memory_internal'])
                                <tr>
                                    <td class="specification-title" width="20%">Internal</td>
                                    <td>{{$product->mobile->memory_internal}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['memory_phonebook'])
                                <tr>
                                    <td class="specification-title" width="20%">Phonebook</td>
                                    <td>{{$product->mobile->memory_phonebook}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['memory_call_records'])
                                <tr>
                                    <td class="specification-title" width="20%">Call Records</td>
                                    <td>{{$product->mobile->memory_call_records}}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6 col-12 specification-section">
                <div class="table-detail mb-2">
                    <table cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <th colspan="2">MAIN CAMERA</th>
                            </tr>
                            @if($product->mobile['main_camera_dual'])
                                <tr>
                                    <td class="specification-title" width="20%">Dual</td>
                                    <td>{{$product->mobile['main_camera_dual']}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['main_camera_single'])
                                <tr>
                                    <td class="specification-title" width="20%">Single</td>
                                    <td>{{$product->mobile['main_camera_single']}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['main_camera_triple'])
                                <tr>
                                    <td class="specification-title" width="20%">Triple</td>
                                    <td>{{$product->mobile['main_camera_triple']}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['main_camera_quad'])
                                <tr>
                                    <td class="specification-title" width="20%">Quad</td>
                                    <td>{{$product->mobile['main_camera_quad']}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['main_camera_five'])
                                <tr>
                                    <td class="specification-title" width="20%">Five</td>
                                    <td>{{$product->mobile['main_camera_five']}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['main_camera_penta'])
                                <tr>
                                    <td class="specification-title" width="20%">Penta</td>
                                    <td>{{$product->mobile['main_camera_penta']}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['main_camera_features'])
                                <tr>
                                    <td class="specification-title" width="20%">Features</td>
                                    <td>{{$product->mobile['main_camera_features']}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['main_camera_video'])
                                <tr>
                                    <td class="specification-title" width="20%">Video</td>
                                    <td>{{$product->mobile['main_camera_video']}}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="table-detail mb-2">
                    <table cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <th colspan="2">SELFIE CAMERA</th>
                            </tr>
                            @if($product->mobile['selfie_camera_single'])
                                <tr>
                                    <td class="specification-title" width="20%">Single</td>
                                    <td>{{$product->mobile['selfie_camera_single']}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['selfie_camera_dual'])
                                <tr>
                                    <td class="specification-title" width="20%">Dual</td>
                                    <td>{{$product->mobile['selfie_camera_dual']}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['selfie_camera_triple'])
                                <tr>
                                    <td class="specification-title" width="20%">Triple</td>
                                    <td>{{$product->mobile['selfie_camera_triple']}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['selfie_camera_quad'])
                                <tr>
                                    <td class="specification-title" width="20%">Quad</td>
                                    <td>{{$product->mobile['selfie_camera_quad']}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['selfie_camera_features'])
                                <tr>
                                    <td class="specification-title" width="20%">Features</td>
                                    <td>{{$product->mobile['selfie_camera_features']}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['selfie_camera_video'])
                                <tr>
                                    <td class="specification-title" width="20%">Video</td>
                                    <td>{{$product->mobile['selfie_camera_video']}}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="table-detail mb-2">
                    <table cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <th colspan="2">SOUND</th>
                            </tr>
                            @if($product->mobile['sound_loudspeaker'])
                            <tr>
                                <td class="specification-title" width="20%">Loudspeaker</td>
                                <td>{{$product->mobile->sound_loudspeaker}}</td>
                            </tr>
                            @endif
                            @if($product->mobile['sound_3.5mm_jack'])
                                <tr>
                                    <td class="specification-title" width="20%">3.5mm Jack</td>
                                    <td>{{$product->mobile['sound_3.5mm_jack']}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['sound_alert_types'])
                                <tr>
                                    <td class="specification-title" width="20%">Alert Types</td>
                                    <td>{{$product->mobile['sound_alert_types']}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['sound_other'])
                                <tr>
                                    <td class="specification-title" width="20%">Other</td>
                                    <td>{{$product->mobile['sound_other']}}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="table-detail mb-2">
                    <table cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <th colspan="2">COMMS</th>
                            </tr>
                            @if($product->mobile['comms_wlan'])
                            <tr>
                                <td class="specification-title" width="20%">WLAN</td>
                                <td>{{$product->mobile->comms_wlan}}</td>
                            </tr>
                            @endif
                            @if($product->mobile['comms_bluetooth'])
                            <tr>
                                <td class="specification-title" width="20%">Bluetooth</td>
                                <td>{{$product->mobile['comms_bluetooth']}}</td>
                            </tr>
                            @endif
                            @if($product->mobile['comms_nfc'])
                            <tr>
                                <td class="specification-title" width="20%">NFC</td>
                                <td>{{$product->mobile['comms_nfc']}}</td>
                            </tr>
                            @endif
                            @if($product->mobile['comms_radio'])
                                <tr>
                                    <td class="specification-title" width="20%">Radio</td>
                                    <td>{{$product->mobile['comms_radio']}}</td>
                                </tr>
                            @endif
                            @if($product->mobile['comms_usb'])
                                <tr>
                                    <td class="specification-title" width="20%">USB</td>
                                    <td>{{$product->mobile['comms_usb']}}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="table-detail mb-2">
                    <table cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <th colspan="2">FEATURES</th>
                            </tr>
                            @if($product->mobile->features_sensors)
                                <tr>
                                    <td class="specification-title" width="20%">Sensors</td>
                                    <td>{{$product->mobile->features_sensors}}</td>
                                </tr>
                            @endif
                            @if($product->mobile->features_messaging)
                                <tr>
                                    <td class="specification-title" width="20%">Messaging</td>
                                    <td>{{$product->mobile->features_messaging}}</td>
                                </tr>
                            @endif
                            @if($product->mobile->features_browser)
                                <tr>
                                    <td class="specification-title" width="20%">Browser</td>
                                    <td>{{$product->mobile->features_browser}}</td>
                                </tr>
                            @endif
                            @if($product->mobile->features_clock)
                                <tr>
                                    <td class="specification-title" width="20%">Clock</td>
                                    <td>{{$product->mobile->features_clock}}</td>
                                </tr>
                            @endif
                            @if($product->mobile->features_alarm)
                                <tr>
                                    <td class="specification-title" width="20%">Alarm</td>
                                    <td>{{$product->mobile->features_alarm}}</td>
                                </tr>
                            @endif
                            @if($product->mobile->features_games)
                                <tr>
                                    <td class="specification-title" width="20%">Games</td>
                                    <td>{{$product->mobile->features_games}}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="table-detail mb-2">
                    <table cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <th colspan="2">BATTERY</th>
                            </tr>
                            @if($product->mobile->battery_other)
                            <tr>
                                <td class="specification-title" width="20%">Type</td>
                                <td>{{$product->mobile->battery_other}}</td>
                            </tr>
                            @endif
                            @if($product->mobile->battery_charging)
                            <tr>
                                <td class="specification-title" width="20%">Charging</td>
                                <td>{{$product->mobile->battery_charging}}</td>
                            </tr>
                            @endif
                            @if($product->mobile->battery_stand_by)
                            <tr>
                                <td class="specification-title" width="20%">Stand By</td>
                                <td>{{$product->mobile->battery_stand_by}}</td>
                            </tr>
                            @endif
                            @if($product->mobile->battery_talk_time)
                            <tr>
                                <td class="specification-title" width="20%">Talk Time</td>
                                <td>{{$product->mobile->battery_talk_time}}</td>
                            </tr>
                            @endif
                            @if($product->mobile->battery_music_play)
                            <tr>
                                <td class="specification-title" width="20%">Music Play</td>
                                <td>{{$product->mobile->battery_music_play}}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <p class="m-3"><span><strong>Disclaimer:</strong></span>
                The price, photo & specs shown may be different from actual.
                Please confirm with the retailer before purchasing.
            </p>
        </div>
    </div>

<!-- Modal -->
@if($visitor_status == 0)
<div class="modal fade ebcf_modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ebcf_modal-content" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="visiterForm" method="POST" action="{{Route('user.visiterSave')}}" accept-charset="UTF-8" data-parsley-validate="">
            @csrf
            <div class="row">
                <div class="mb-3 position-relative col-sm-6">
                    <label for="name" class="form-label">Name</label>
                    <input class="form-control" id="name" placeholder="Enter Name" name="name" type="text" required="required">
                    <input class="form-control" id="product_id" name="product_id" type="text" value="{{$product->id}}" hidden>
                    <input class="form-control vender_id" name="vender_id" type="text" hidden>
                </div>
                <div class="mb-3 position-relative col-sm-6">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" name="email" type="email" placeholder="Enter Email" id="email" required="required">
                </div>
                <div class="mb-3 position-relative col-sm-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input class="form-control" name="phone" type="number" data-parsley-minlength="10" data-parsley-maxlength="10" placeholder="Enter Phone" id="phone" required="required">
                </div>
            </div>
            <button class="btn btn-primary" type="button" id="sendOtpBtn">Save</button>
        </form>


      </div>
    </div>
  </div>
</div>
@endif


<!-- OTP Input Modal (shown after OTP is sent) -->
<div id="otpModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="otpModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="otpModalLabel">Enter OTP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="otp">OTP</label>
                    <input type="text" class="form-control" id="otp" placeholder="Enter OTP">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="verifyOtpBtn">Verify OTP</button>
            </div>
        </div>
    </div>
</div>



<!-- call modal -->
@if($visitor_status == 0)
<div class="modal fade call_now_modal" id="exampleModalCenterCallNow" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered call_now_modal-content" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Call Now</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="callNowForm" method="POST" action="{{Route('user.orderNowSave')}}" accept-charset="UTF-8" data-parsley-validate="">
            @csrf
            <div class="row">
                <div class="mb-3 position-relative col-sm-6">
                    <label for="name" class="form-label">Name</label>
                    <input class="form-control" id="name" placeholder="Enter Name" name="name" type="text" required="required">
                    <input class="form-control" id="product_id" name="product_id" type="text" value="{{$product->id}}" hidden>
                    <input class="form-control vender_id" name="vender_id" type="text" hidden>
                </div>
                <div class="mb-3 position-relative col-sm-6">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" name="email" type="email" placeholder="Enter Email" id="email" required="required">
                </div>
                <div class="mb-3 position-relative col-sm-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input class="form-control" name="phone" type="number" data-parsley-minlength="10" data-parsley-maxlength="10" placeholder="Enter Phone" id="phone" required="required">
                </div>
            </div>
            <button class="btn btn-primary" type="button" id="sendOtpCallNowBtn">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endif

<!-- OTP verify call   Now -->
<div id="otpModalCallNow" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="otpModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="otpModalLabel">Enter OTP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="otp">OTP</label>
                    <input type="text" class="form-control" id="order_otp" placeholder="Enter OTP">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="verifyOtpCallNowBtn">Verify OTP</button>
            </div>
        </div>
    </div>
</div>



<!-- OTP verify Call Now Dialer-->
<div id="dialerModalCallNow" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="otpModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="otpModalLabel">Dialer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center d-flex-inline">
                    <a href="#" class="phone-link">
                        <i class="fas fa-phone phone-icon"></i>
                        <span id="store__mob_number"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>



</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
<script>
    $(document).ready(function() { 
        $('.FkMp').click(function() {
            var  vender_id = $(this).data('product_id');
            $('.vender_id').val(vender_id);
            var vendor_status = '{{$visitor_status}}';
            if(vendor_status == 0){
                var $ebModal = $('#      ');
                var $ebBtn = $('.FkMp');
                var $ebSpan = $('.ebcf_close').first();
                
                $ebBtn.on('click', function() {
                    $ebModal.css('display', 'block');
                });

                $ebSpan.on('click', function() {
                    $ebModal.css('display', 'none');
                });

                $(window).on('click', function(event) {
                    if ($(event.target).is($ebModal)) {
                        $ebModal.css('display', 'none');
                    }
                });
            }else{
                var url = "{{route('user.visitor')}}" 
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {vender_id:vender_id},
                    success: function(response) {
                        $('#vendor_email').html(response.email);
                        $('#vendor_phone').html(response.phone);
                        $('#vendor_address').html(response.address);
                        $('.bb-shop-banner-name').html(response.shop_name);
                        console.log(response.shop_name);
                        var shopName = response.shop_name ? response.shop_name.replace(/\s+/g, '-').toLowerCase() : '';
                        var id = response.id;

                        // Construct the URL
                        var baseUrl = 'https://mobilekidukaan.in/';
                        var completeUrl = baseUrl + shopName;

                        $('.vindor-page').attr('href', completeUrl);
                        window.location.href =completeUrl;

                    },
                    error: function(response) {
                        // Handle error
                        alert('An error occurred. Please try again.');
                        console.log(response);
                    }
                });

            }

        });
   });
</script>
<script>
    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }
    $(document).ready(function() {
        $('#visiterForm').on('submit', function(e) {
            e.preventDefault(); 
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    
                
                 $('#vendor_email').html(response.email);
                 $('#vendor_phone').html(response.phone);
                 $('#vendor_address').html(response.address);
                 $('.bb-shop-banner-name').html(response.shop_name);
                 
                 // setCookie

                var visitor_phone= $('#phone').val();
                var visitor_name = $('#name').val();
                var visitor = {
                        phone: visitor_phone,
                        name: visitor_name,
                    };
                var visitorString = JSON.stringify(visitor);

                 setCookie("visitor", visitorString,1000);

                    var shopName = response.shop_name ? response.shop_name.replace(/\s+/g, '-').toLowerCase() : '';

                    var id = response.id;

                    // Construct the URL
                    var baseUrl = 'https://mobilekidukaan.in/';
                    var completeUrl = baseUrl + shopName;

                    $('.vindor-page').attr('href', completeUrl);
                    window.location.href =completeUrl;

                },
                error: function(response) {
                    // Handle error
                    alert('An error occurred. Please try again.');
                    console.log(response);
                }
            });
        });
    });
</script>

<!-- sliders -->
<script>
    $(document).ready(function() {
        $('.size_click').on('click', function() {
            var url = "{{Route('user.sharchPrice')}}";
            var mobile_id = "{{$product->Mobile->id}}";
            var side_ram = $(this).data('side_ram');
            var key_id = $(this).data('key_id');
            console.log('key_id',key_id,'mobile_id',mobile_id);
            $.ajax({
                url:url,
                type: 'GET',
                data: {
                    mobile_id:mobile_id,
                    side_ram:side_ram,
                    key_id:key_id,
                },
                success: function(response) {
                    
                    response.forEach(item =>{
                        $('.g9WBQb_'+item.id).html('₹'+item.price);
                        console.log('price',item.price);    
                    })
                   
                },
                error: function(response) {
                    console.log('error',response);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {

        var sync1 = $(".product-image-slider");
        var sync2 = $(".thumb-image-slider");

        sync1.owlCarousel({
            items: 1,
            slideSpeed: 2000,
            nav: true,
            autoplay: false,
            dots: false,
            loop: true,
            responsiveRefreshRate: 200,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>'
            ]
        }).on('changed.owl.carousel', syncPosition);

        sync2.owlCarousel({
            items: 4,
            dots: false,
            nav: true,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>'
            ],
            smartSpeed: 200,
            slideSpeed: 500,
            slideBy: 4,
            responsiveRefreshRate: 100
        }).on('changed.owl.carousel', syncPosition2);

        sync2.on("click", ".owl-item", function(e) {
            e.preventDefault();
            var number = $(this).index();
            sync1.data('owl.carousel').to(number, 300, true);
        });

        function syncPosition(el) {
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - (el.item.count / 2) - .5);

            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }

            sync2.find(".owl-item").removeClass("current").eq(current).addClass("current");
            var onscreen = sync2.find('.owl-item.active').length - 1;
            var start = sync2.find('.owl-item.active').first().index();
            var end = sync2.find('.owl-item.active').last().index();

            if (current > end) {
                sync2.data('owl.carousel').to(current, 100, true);
            }
            if (current < start) {
                sync2.data('owl.carousel').to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (el.type === "changed") {
                var number = el.item.index;
                sync1.data('owl.carousel').to(number, 100, true);
            }
        }
    });
</script>


<!-- visitor verify mobile nom. -->
<script>
    $('#sendOtpBtn').on('click', function() {
        const formData = $('#visiterForm').serialize();

        $.ajax({
            url: "{{ Route('user.visiterSave') }}",
            type: "POST",
            data: formData,
            success: function(response) {
                if (response.otp_required) {
                    var visitor_phone= $('#phone').val();
                    var visitor_name = $('#name').val();
                    var visitor = {
                            phone: visitor_phone,
                            name: visitor_name,
                        };
                    var visitorString = JSON.stringify(visitor);

                    setCookie("visitor", visitorString,1000);
                    $('#otpModal').modal('show');
                    $('#exampleModalCenter').modal('hide');
                }
            },
            error: function(xhr) {
                alert('Failed to send OTP. Please try again.');
            }
        });
    });

    $('#verifyOtpBtn').on('click', function() {
        const otp = $('#otp').val();

        $.ajax({
            url: "{{ Route('user.visitorOtpCheck') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "otp": otp
            },
            success: function(response) {
                if (response.success) {
                    alert('OTP verified. Visitor details saved.');

                    if (response.user) {
                        const shopName = response.user.shop_name ? response.user.shop_name.replace(/\s+/g, '-').toLowerCase() : '';
                        const completeUrl = 'https://mobilekidukaan.in/' + shopName;

                        window.location.href = completeUrl;
                    } else {
                        location.reload();
                    }
                } else {
                    alert('Invalid OTP. Please try again.');
                }
            },
            error: function(xhr) {
                alert('Failed to verify OTP.');
            }
        });
    });

</script>



<!---------------------------->
<!-- ## Call Now -->
<!-- ------------------------>
<script>
    $(document).ready(function() {
        $('.call_now_btn').click(function() {
            var vender_id = $(this).data('product_id');
            $('.vender_id').val(vender_id);
            var vendor_status = '{{$visitor_status}}';
            console.log('vendor_status',vendor_status);

            var phoneNumber = '{{ Session::get("visitor_phone") }}';

            if (vendor_status == 1) {
                console.log('if condition');
                $('#exampleModalCenterCallNow').modal('hide');

                var url = "{{route('user.visitor')}}";
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {vender_id: vender_id},
                    success: function(response) {
                        $('#vendor_phone').html(response.phone); 
                        $('#store__mob_number').text(response.phone);
                        $('.phone-link').attr('href', 'tel:' + response.phone);
                        $('#dialerModalCallNow').modal('show');
                    },
                    error: function(response) {
                        alert('An error occurred. Please try again.');
                        console.log(response);
                    }
                });
            } else {
                console.log('else condition');
                
                $('#exampleModalCenterCallNow').modal('show');
                $('#sendOtpCallNowBtn').on('click', function() {
                    const formData = $('#callNowForm').serialize();

                    $.ajax({
                        url: "{{ Route('user.orderNowSave') }}",
                        type: "POST",
                        data: formData,
                        success: function(response) {
                            if (response.otp_required) {
                                var visitor_phone = $('#phone').val();
                                var visitor_name = $('#name').val();
                                var visitor = {
                                    phone: visitor_phone,
                                    name: visitor_name,
                                };
                                var visitorString = JSON.stringify(visitor);
                                setCookie("visitor", visitorString, 1000);
                                var id = response.id;
                                // setCookie
                                $('#otpModalCallNow').modal('show');
                                $('#exampleModalCenterCallNow').modal('hide');
                            }
                        },
                        error: function(xhr) {
                            alert('Failed to send OTP. Please try again.');
                        }
                    });
                });
            }
        });
    });

    $('#verifyOtpCallNowBtn').on('click', function() {
        var orderotp = $('#order_otp').val();
        $.ajax({
            url: "{{ Route('user.orderOtpCheck') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "otp": orderotp
            },
            success: function(response) {
                if (response.success) {
                    alert('OTP verified. Visitor details saved.');
                    $('#dialerModalCallNow').modal('show');
                    $('#otpModalCallNow').modal('hide');

                    // set cookie
                    var phone_number = response.phone;
                    var visitor_name = response.user.name; 
                    var visitorData = { phone: phone_number, name: visitor_name };
                    setCookie("visitor", JSON.stringify(visitorData), 1000);

                    $('#store__mob_number').text(phone_number);
                    $('.phone-link').attr('href', 'tel:' + phone_number);
                } else {
                    alert('Invalid OTP. Please try again.');
                }
            },
            error: function(xhr) {
                alert('Failed to verify OTP.');
            }
        });
    });

</script>

@endsection