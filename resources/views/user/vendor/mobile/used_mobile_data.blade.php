<input class="form-control" hidden  name="mobile" type="text"  value="{{$mobiles->id}}">
<input class="form-control" hidden  name="type" type="text"  value="used">
<style>
    .img-add {
        max-height: 159px;
    }
</style>
<div class="row">
    <div class="col-md-8 col-12">
        <div class="row">
            <div class="col-6">
                <label class="">Brand</label>
                <select class="form-control select2-with-search select_brand" id="brand" name="brand" required="" tabindex="-1" aria-hidden="true">
                    <option >Select Brand</option>
                    @foreach($brands as $brand)
                    <option value="{{$brand->brand}}" {{$brand->brand == $mobiles->brand ? 'selected' :''}}>
                        {{$brand->brand}}</option>
                    @endforeach
                </select>
            </div>
            @php
            $mobiles_change =
            App\Models\Mobile::where('brand',$mobiles->brand)->where('type','0')->select('phone','id')->distinct()->get();
            @endphp
            <div class="col-6">
                <label>Model</label>
                <select class="form-control select2" id="model" name="model" required="" tabindex="-1" aria-hidden="true">
                    @foreach($mobiles_change as $mob)
                    <option value="{{$mob->phone}}" {{ $mob->id == $mobiles->id ? 'selected':''}}>{{$mob->phone}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <table class="table">
                    <tr>
                        <td>RAM</td>
                        <td>Price</td>
                        <td>MRP</td>
                    </tr>
                    @foreach(explode(",", $mobiles['memory_internal']) as $key=>$data)
                        <tr>
                            <td>
                                <input class="form-check-input" name="attribute[]" type="checkbox" value="{{$data}}" id="flexCheckDefault-{{$key+1}}" {{$key == 0 ? 'checked' : ''}}>
                                <label class="form-check-label" for="flexCheckDefault-{{$key+1}}">
                                {{$data}}
                                </label>
                            </td>
                            <td>
                                <input type="text" class="form-control price_check" placeholder="Price*" name="memory_price[]" value="" oninput="formatCurrency(this)" required>
                            </td>
                            <td>
                                <input type="text" class="form-control mrp_check" placeholder="MRP*" name="memory_mrp[]" value="" oninput="formatCurrency(this)" required>
                            </td>
                        </tr>
                    @endforeach
                </table>

                <div id="memory_error" class="text-danger mb-2"></div>
                <div id="memory_right" class="text-success mb-2"></div>

                <div class="form-group">
                    <label for="name" class="form-label">Add Offer</label>
                    <input class="form-control" name="phone_offer" type="text" >
                </div>
            </div>
        </div>
    </div>
    <!-- Image -->
    <div class="col-md-4 col-12 text-center">
    <div class="dropzone needsclick dz-sortable dz-clickable dz-started ui-sortable">
        <label for="file-upload-location1" class="custom-file-upload w-100 p-3">
            <span class="upload-icon"><i class="fas fa-cloud-upload-alt"></i></span> Upload
        </label>
        <input id="file-upload-location1" type="file" name="images[]" accept="image/jpeg, image/jpg, image/png, image/webp" multiple onchange="displaySelectedImages(this, 'image-container-location1')" tabindex="16" style="display:none;">
        <div id="image-container-location1" class="mb-3">
            @if($mobiles['picture_url_big'])
            <div class="image-container">
                @php
                    $images = explode(";", $mobiles['picture_url_big']);
                    foreach ($images as $key=>$image) {
                @endphp
                    <img src="" class="img-responsive uploaded-image img-add" style="max-height: 300px;">
                    <!-- <button class="remove-button" data-banner-id="{{$key+1}}" onclick="deleteBanner(this)" type="button">x</button> -->
                @php
                    }
                @endphp
            </div>
            @else
            <img class="img-responsive" style="max-height: 300px;" src="https://media.istockphoto.com/id/1055079680/vector/black-linear-photo-camera-like-no-image-available.jpg?s=612x612&w=0&k=20&c=P1DebpeMIAtXj_ZbVsKVvg-duuL0v9DlrOZUvPG6UJk=">
            @endif
        </div>
    </div>
</div>

    <!-- /Image -->
</div>
<div class="row">
    <div class="col-md-6 col-12 specification-section">
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
                    @if($mobiles['memory_card_slot'])
                        <tr>
                            <td class="specification-title" width="20%">Card slot</td>
                            <td>{{$mobiles['memory_card_slot'] ?? ''}}</td>
                        </tr>
                    @endif
                    @if($mobiles['memory_internal'])
                        <tr>
                            <td class="specification-title" width="20%">Memory internal</td>
                            <td>{{$mobiles['memory_internal'] ?? ''}}</td>
                        </tr>
                    @endif
                    @if($mobiles['memory_call_records'])
                        <tr>
                            <td class="specification-title" width="20%">Call records</td>
                            <td>{{$mobiles['memory_call_records'] ?? ''}}</td>
                        </tr>
                    @endif
                    @if($mobiles['memory_phonebook'])
                        <tr>
                            <td class="specification-title" width="20%">Phonebook</td>
                            <td>{{$mobiles['memory_phonebook'] ?? ''}}</td>
                        </tr>
                    @endif
                    @if($mobiles['memory_other'])
                        <tr>
                            <td class="specification-title" width="20%">Other</td>
                            <td>{{$mobiles['memory_other'] ?? ''}}</td>
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
                    @if($mobiles['main_camera_single'])
                        <tr>
                            <td class="specification-title" width="20%">Single</td>
                            <td>{{$mobiles['main_camera_single'] ?? ''}}</td>
                        </tr>
                    @endif
                    @if($mobiles['main_camera_dual'])
                    <tr>
                        <td class="specification-title" width="20%">Dual</td>
                        <td>{{$mobiles['main_camera_dual'] ?? ''}}</td>
                    </tr>
                    @endif
                    @if($mobiles['main_camera_triple'])
                    <tr>
                        <td class="specification-title" width="20%">Triple</td>
                        <td>{{$mobiles['main_camera_triple'] ?? ''}}</td>
                    </tr>
                    @endif
                    @if($mobiles['main_camera_quad'])
                    <tr>
                        <td class="specification-title" width="20%">Quad</td>
                        <td>{{$mobiles['main_camera_quad'] ?? ''}}</td>
                    </tr>
                    @endif
                    @if($mobiles['main_camera_five'])
                    <tr>
                        <td class="specification-title" width="20%">Five</td>
                        <td>{{$mobiles['main_camera_five'] ?? ''}}</td>
                    </tr>
                    @endif
                    @if($mobiles['main_camera_penta'])
                    <tr>
                        <td class="specification-title" width="20%">Penta</td>
                        <td>{{$mobiles['main_camera_penta'] ?? ''}}</td>
                    </tr>
                    @endif

                    @if($mobiles['main_camera_features'])
                    <tr>
                        <td class="specification-title" width="20%">features</td>
                        <td>{{$mobiles['main_camera_features'] ?? ''}}</td>
                    </tr>
                    @endif
                    @if($mobiles['main_camera_video'])
                    <tr>
                        <td class="specification-title" width="20%">Video</td>
                        <td>{{$mobiles['main_camera_video'] ?? ''}}</td>
                    </tr>
                    @endif
                    @if($mobiles['main_camera_other'])
                    <tr>
                        <td class="specification-title" width="20%">Other</td>
                        <td>{{$mobiles['main_camera_other'] ?? ''}}</td>
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
                    @if($mobiles['main_camera_single'])
                        <tr>
                            <td class="specification-title" width="20%">Single</td>
                            <td>{{$mobiles['main_camera_single'] ?? ''}}</td>
                        </tr>
                    @endif
                    @if($mobiles['selfie_camera_dual'])
                        <tr>
                            <td class="specification-title" width="20%">Dual</td>
                            <td>{{$mobiles['selfie_camera_dual'] ?? ''}}</td>
                        </tr>
                    @endif
                    @if($mobiles['selfie_camera_triple'])
                        <tr>
                            <td class="specification-title" width="20%">Triple</td>
                            <td>{{$mobiles['selfie_camera_triple'] ?? ''}}</td>
                        </tr>
                    @endif
                    @if($mobiles['selfie_camera_quad'])
                        <tr>
                            <td class="specification-title" width="20%">Quad</td>
                            <td>{{$mobiles['selfie_camera_quad'] ?? ''}}</td>
                        </tr>
                    @endif
                    @if($mobiles['selfie_camera_features'])
                        <tr>
                            <td class="specification-title" width="20%">Triple</td>
                            <td>{{$mobiles['selfie_camera_features'] ?? ''}}</td>
                        </tr>
                    @endif
                    @if($mobiles['selfie_camera_video'])
                        <tr>
                            <td class="specification-title" width="20%">Quad</td>
                            <td>{{$mobiles['selfie_camera_video'] ?? ''}}</td>
                        </tr>
                    @endif
                    @if($mobiles['selfie_camera_other'])
                        <tr>
                            <td class="specification-title" width="20%">Other</td>
                            <td>{{$mobiles['selfie_camera_other'] ?? ''}}</td>
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
                        <td class="specification-title" width="20%">USB</td>
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
<script>
    function displaySelectedImages(input, containerId) {
    var container = document.getElementById(containerId);
    var files = input.files;

    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var reader = new FileReader();
        reader.onload = function(e) {
            var image = new Image();
            image.src = e.target.result;
            image.onload = function() {
                var imageContainer = document.createElement("div");
                imageContainer.classList.add("image-container");

                var imgElement = document.createElement("img");
                imgElement.src = image.src;
                imgElement.classList.add("img-responsive");

                var removeButton = document.createElement("button");
                removeButton.innerHTML = "x";
                removeButton.classList.add("remove-button");
                removeButton.addEventListener("click", function() {
                    container.removeChild(imageContainer);
                });

                imageContainer.appendChild(imgElement);
                imageContainer.appendChild(removeButton);
                container.appendChild(imageContainer);
            }
        };
        reader.readAsDataURL(file);
    }
}

function deleteBanner(button) {
    button.closest('.image-container').remove();
}


$(document).ready(function() {
    $('#brand').select2();
    $('#model').select2();
});

    // $(document).ready(function() {
    //     $(document).on('change', '.price_check', function() {
    //         var value = $(this).val().trim();
    //         var normalizedValue = value.replace(/,/g, '');
    //         if (/^0+$/g.test(normalizedValue)) {
    //             $(this).val('N.A');
    //         }
    //     });
    //     $(document).on('change', '.mrp_check', function() {
    //         var value = $(this).val().trim();
    //         var normalizedValue = value.replace(/,/g, '');
    //         if (/^0+$/g.test(normalizedValue)) {
    //             $(this).val('N.A');
    //         }
    //     });
    // });
</script>


<script>
    $(document).ready(function() {
        function checkIfAllNA() {
            var allNA = true;
            $('.price_check').each(function() {
                if ($(this).val() !== 'N.A.') {
                    allNA = false; 
                }
            });
            $('.mrp_check').each(function() {
                if ($(this).val() !== 'N.A.') {
                    allNA = false; 
                }
            });
            if (allNA) {
                $('#memory_error').text('At least one price and MRP value is required.');
                $('#memory_right').text('');
                $('.price_check').first().val('');
                $('.mrp_check').first().val('');
            } else {
                $('#memory_error').text('');
                $('#memory_right').text('Valid input.');
            }
        }
        $(document).on('change', '.price_check', function() {
            var value = $(this).val().trim();
            var normalizedValue = value.replace(/,/g, '');
            if (/^0+$/g.test(normalizedValue)) {
                $(this).val('N.A.');
                var memory_mrp = $("#memory_mrp_" + $(this).data('id')).val('N.A.');
            }
            checkIfAllNA();
        });
        $(document).on('change', '.mrp_check', function() {
            var value = $(this).val().trim();
            var normalizedValue = value.replace(/,/g, '');
            if (/^0+$/g.test(normalizedValue)) {
                $(this).val('N.A.');
                var memory_price = $("#memory_price_" + $(this).data('id')).val('N.A.');
            }
            checkIfAllNA();
        });
    });
</script>