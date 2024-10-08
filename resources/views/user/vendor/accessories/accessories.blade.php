<input class="form-control" hidden name="mobile" type="text" value="{{$accessories->id}}">
<div class="row">
    <div class="col-md-8 col-12">
        <div class="row mt-3">
            <div class="col-12">
                <table class="table">
                    <tr>
                        <td>Capacity</td>
                        <td>Price</td>
                        <td>MRP</td>
                    </tr>
                    <tr>
                        @if($accessories->capacity)
                          <td>{{$accessories->capacity}}</td>
                        @else
                           <td>{{$accessories->model_name}}</td>
                        @endif
                        <td><input type="text" class="form-control price_check" placeholder="Price*" name="price"  oninput="formatCurrency(this)" required></td>
                        <td><input type="text" class="form-control mrp_check" placeholder="MRP*" name="mrp" oninput="formatCurrency(this)" required></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-12 text-center">
        @if($accessories->image)
           <img src="{{ $accessories->image }}" class="img-responsive" style="max-height: 300px;">
        @else
          <img class="img-responsive" style="max-height: 300px;" src="https://media.istockphoto.com/id/1055079680/vector/black-linear-photo-camera-like-no-image-available.jpg?s=612x612&w=0&k=20&c=P1DebpeMIAtXj_ZbVsKVvg-duuL0v9DlrOZUvPG6UJk=">
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-12 specification-section">
        @if($accessories->dial_shape)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Dial Shape</td>
                            <td>{{$accessories['dial_shape'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->touch_screen)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Touch Screen</td>
                            <td>{{$accessories['touch_screen'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->water_resistant)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Water Resistant</td>
                            <td>{{$accessories['water_resistant'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->water_resistant)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Water Resistant</td>
                            <td>{{$accessories['water_resistant'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->driver_size)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Driver Size</td>
                            <td>{{$accessories['driver_size'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->driver_size)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Driver Size</td>
                            <td>{{$accessories['driver_size'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->weight)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Weight</td>
                            <td>{{$accessories['weight'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->capacity)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Capacity</td>
                            <td>{{$accessories['capacity'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->battery_life)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Battery Life</td>
                            <td>{{$accessories['battery_life'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->display_resolution_size)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Display Resolution Size</td>
                            <td>{{$accessories['display_resolution_size'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->transmission_Features)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">transmission_Features</td>
                            <td>{{$accessories['transmission_Features'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->battery)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Battery</td>
                            <td>{{$accessories['battery'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->compatible_devices)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Compatible Devices</td>
                            <td>{{$accessories['compatible_devices'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->part_number)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Part Number</td>
                            <td>{{$accessories['part_number'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->mic)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Mic</td>
                            <td>{{$accessories['mic'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->length)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Length</td>
                            <td>{{$accessories['length'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->version)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Version</td>
                            <td>{{$accessories['version'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->wireless_range)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Wireless Range</td>
                            <td>{{$accessories['wireless_range'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->speed)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Speed</td>
                            <td>{{$accessories['speed'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->card_type)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Card Type</td>
                            <td>{{$accessories['card_type'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->connector_port)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Connector Port</td>
                            <td>{{$accessories['connector_port'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->output_voltage)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Output Voltage</td>
                            <td>{{$accessories['output_voltage'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->output_current)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Output Current</td>
                            <td>{{$accessories['output_current'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->charging_time)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Charging Time</td>
                            <td>{{$accessories['charging_time'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->charging_cable)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Charging Cable</td>
                            <td>{{$accessories['charging_cable'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @if($accessories->sales_package)
            <div class="table-detail mb-2">
                <table cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td class="specification-title" width="20%">Sales Package</td>
                            <td>{{$accessories['sales_package'] ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
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

    $(document).ready(function() {
        $(document).on('change', '.price_check', function() {
            var value = $(this).val().trim(); // Trim any extra spaces

            // Normalize the value by removing any commas
            var normalizedValue = value.replace(/,/g, '');

            // Check if the normalized value is '0' or any variation of '0'
            if (/^0+$/g.test(normalizedValue)) {
                $(this).val('N.A');
            }
        });

        $(document).on('change', '.mrp_check', function() {
            var value = $(this).val().trim(); // Trim any extra spaces

            // Normalize the value by removing any commas
            var normalizedValue = value.replace(/,/g, '');
            
            // Check if the normalized value is '0' or any variation of '0'
            if (/^0+$/g.test(normalizedValue)) {
                $(this).val('N.A');
            }
        });
    });
</script>