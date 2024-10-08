        <div class="top-sale">
            <div class="row">
                <div class="col-12">
                    <h2 class="header-h3"><b>{{$title}}</b></h2>
                </div>
            </div>    
            <div class="row product-list">
                @foreach($product as $data)
                <div class="col-md-2 col-4 px-2">
                    <div class="item-box">
                        <div class="item-image">
                        @php
                            $mobileName = str_replace(' ', '-', strtolower($data->Mobile->phone));
                            $id = $data->id;
                        @endphp
                        <a href="{{ route('user.product', ['name' => $mobileName, 'id' => $id]) }}">
                            @if($data->Mobile->picture_url_big)
                                @if(strpos(explode(';',$data->Mobile->picture_url_big)[0], 'https://fdn2.gsmarena.com') !== false)
                                    <img  src = "{{ explode(';',$data->Mobile->picture_url_big)[0] }}" alt = "shoe image">
                                @else  
                                    <img src = "{{ asset(explode(';',$data->Mobile->picture_url_big)[0])}}" alt = "shoe image">
                                @endif
                            @else
                                <img src="{{asset('assets/web/images/download.png')}}" alt="{{$data->Mobile->phone}}">
                            @endif
                        </a>
                        </div>
                        @php 
                           $get_present_data = getPresent($data);
                           $present = $get_present_data['present'];
                           $price = $get_present_data['price'];
                           $mrp = $get_present_data['mrp'];
                        @endphp
                        
                        <div class="item-price">
                            <b>
                               ₹{{$price}}
                            </b>
                           <span class="mop">₹{{$mrp}}</span>
                            <span class="discount">{{round($present)}}% OFF</span>
                        </div>
                        <div class="item-name">
                          <a href="{{ route('user.product', ['name' => $mobileName, 'id' => $id]) }}" class="link">{{$data->Mobile->phone}} </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>    
        </div>