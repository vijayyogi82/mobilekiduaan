
<div class="cyc-searchResults fade-enter-done">
    <ul class="searchResults__list gap-1" role="listbox" style="max-height: 400px; overflow-y: scroll">
        @if(count($products['mobiles'])>0)
            @foreach($products['mobiles'] as $product)
                @if($product->Mobile)
                        @php
                            $mobileName = str_replace(' ', '-', strtolower($product->Mobile->phone));
                            $id = $product->id;
                        @endphp
                        <li class="searchResults__listItem my-1" role="option">
                            <a class="searchResults__listItem-link" href="{{ route('user.product', ['name' => $mobileName, 'id' => $id]) }}">
                                <div class="cyc-searchResultsItem">
                                @if($product->Mobile->picture_url_big)
                                    @if (strpos($product->Mobile->picture_url_big, 'https://fdn2.gsmarena.com') !== false)
                                        <img class="cyc-searchResultsItem__logo" src="{{ explode(';', $product->Mobile->picture_url_big)[0] }}" alt="company logo">
                                    @else 
                                    <img class="cyc-searchResultsItem__logo" src="{{ asset(explode(';',$product->Mobile->picture_url_big)[0])}}" alt="company logo">
                                    @endif
                                @else 
                                    <img class="cyc-searchResultsItem__logo" src="{{asset('assets/web/images/download.png')}}" alt="company logo">
                                @endif
                                    <div class="cyc-searchResultsItem__titleWrapper" style="padding-left: 15px;">
                                        
                                        <a href="{{ route('user.product', ['name' => $mobileName, 'id' => $id]) }}">
                                            
                                        <div class="item-name">{{$product->Mobile->phone }}</div>

                                        </a>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endif
            @endforeach   
        @endif    
        @if(count($products['accessories'])>0)
            @foreach($products['accessories'] as $product)
                @if($product->Accessory)
                    @php
                        $image =explode(',',$product->accessory->image);
                        $mobileName = str_replace(' ', '-', strtolower($product->Accessory->model_name));
                        $id = $product->id;
                    @endphp 
                    <li class="searchResults__listItem my-1" role="option">
                        <a class="searchResults__listItem-link" href="{{ route('vendor.assessries', ['name' => $mobileName, 'id' => $id]) }}">
                            <div class="cyc-searchResultsItem">
                                <a href="{{ route('vendor.assessries', ['name' => $mobileName, 'id' => $id]) }}">
                                    <img src="{{$image[0]}}" class="cyc-searchResultsItem__logo">
                                </a>
                                <div class="cyc-searchResultsItem__titleWrapper" style="padding-left: 15px;">
                                    <a href="{{ route('vendor.assessries', ['name' => $mobileName, 'id' => $id]) }}">
                                    <div class="item-name">{{$product->Accessory->model_name }}</div>
                                    </a>
                                </div>
                            </div>
                        </a>
                    </li>     
                @endif
            @endforeach 
        @endif    
    </ul>
</div>