@if($mobiles)
<input class="form-control" hidden  name="mobile" type="text"  value="{{$mobiles->id}}">
<div class="row mt-3 mb-3 mobile-data">
    <div class="col-8">
        <table class="table">
            <tr>
                <td>RAM</td>
                <td>Price</td>
                <td>MRP</td>
            </tr>
            @foreach(explode(",", $mobiles->memory_internal) as $index => $data)

            <!-- @php
                echo  '<pre>';
                    print_r($mobiles);
                echo  '</pre>';
            @endphp -->

            <tr>
                <td>{{ $data }}</td>
                <td>
                    <input type="text" class="form-control" placeholder="Price*" name="memory_price[]" value="{{ $mobiles->memory_price[$index] ?? '' }}" oninput="formatCurrency(this)" required>
                </td>
                <td>
                    <input type="text" class="form-control" placeholder="MRP*" name="memory_mrp[]" value="{{ $mobiles->memory_mrp[$index] ?? '' }}" oninput="formatCurrency(this)" required>
                </td>
            </tr>
            @endforeach
        </table>


        <div class="row">
            <div class="col-md-12 specification-section">
                <div class="table-detail mb-2">
                    <table cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <th colspan="2">NETWORK</th>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">Techology</td>
                                <td>{{$mobiles['network_techology'] ?? ''}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-detail mb-2">
                    <table cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <th colspan="2">BODY</th>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">Dimensions</td>
                                <td>{{$mobiles['body_dimensions'] ?? ''}}</td>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">Weight</td>
                                <td>{{$mobiles['body_weight'] ?? ''}}</td>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">Build</td>
                                <td>{{$mobiles['body_sim'] ?? ''}}</td>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">SIM</td>
                                <td>Dual SIM (Nano-SIM, dual stand-by);</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-detail mb-2">
                    <table cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <th colspan="2">DISPLAY</th>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">Type</td>
                                <td>{{$mobiles['display_type'] ?? ''}}</td>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">Size</td>
                                <td>{{$mobiles['display_size'] ?? ''}}</td>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">Resolution</td>
                                <td>{{$mobiles['display_resolution'] ?? ''}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-detail mb-2">
                    <table cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <th colspan="2">PLATFORM</th>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">OS</td>
                                <td>{{$mobiles['platform_os'] ?? ''}}</td>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">Chipset</td>
                                <td>{{$mobiles['platform_chipset'] ?? ''}}</td>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">CPU</td>
                                <td>{{$mobiles['platform_cpu'] ?? ''}}</td>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">GPU</td>
                                <td>Mali-G77 MC9;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-detail mb-2">
                    <table cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <th colspan="2">MEMORY</th>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">Card slot</td>
                                <td>No;</td>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">Internal</td>
                                <td>128GB 8GB RAM, 256GB 8GB RAM, 256GB 12GB RAM;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-12 specification-section">
                <div class="table-detail mb-2">
                    <table cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <th colspan="2">MAIN CAMERA</th>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">Dual</td>
                                <td>{{$mobiles['main_camera_single'] ?? ''}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-detail mb-2">
                    <table cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <th colspan="2">SOUND</th>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">Loudspeaker</td>
                                <td>Yes;</td>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">3.5mm Jack</td>
                                <td>No;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-detail mb-2">
                    <table cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <th colspan="2">COMMS</th>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">WLAN</td>
                                <td>{{$mobiles['comms_wlan'] ?? ''}}</td>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">Bluetooth</td>
                                <td>{{$mobiles['comms_bluetooth'] ?? ''}}</td>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">NFC</td>
                                <td>Yes;</td>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">Radio</td>
                                <td>No;</td>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">USC</td>
                                <td>USB Type-C, OTG;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-detail mb-2">
                    <table cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <th colspan="2">FEATURES</th>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">Sensors</td>
                                <td>{{$mobiles['features_sensors'] ?? ''}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-detail mb-2">
                    <table cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <th colspan="2">BATTERY</th>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">Type</td>
                                <td>{{$mobiles['battery_other'] ?? ''}}</td>
                            </tr>
                            <tr>
                                <td class="specification-title" width="20%">Charging</td>
                                <td>44W wired;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="col-4 text-center">
        @if($mobiles['picture_url_big'])
            @php
                $images = explode(";", $mobiles['picture_url_big']);
                $firstImage = $images[0];
            @endphp
            <img src="{{ $firstImage }}" class="img-responsive" style="max-height: 300px;">
        @else
            <img class="img-responsive" style="max-height: 300px;" src="https://media.istockphoto.com/id/1055079680/vector/black-linear-photo-camera-like-no-image-available.jpg?s=612x612&w=0&k=20&c=P1DebpeMIAtXj_ZbVsKVvg-duuL0v9DlrOZUvPG6UJk=">
        @endif
    </div>

</div>
@endif

<script>
    function formatCurrency(input) {
        let value = input.value.replace(/[^0-9.]/g, '');
        let parts = value.split('.');
        let whole = parts[0];
        let decimal = parts.length > 1 ? '.' + parts[1].substr(0, 2) : '';
        whole = whole.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        input.value = whole + decimal;
    }
</script>