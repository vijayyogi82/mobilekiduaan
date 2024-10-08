<div class="row">
    <div class="col-md-3 mb-3">
        <label for="brand" class="form-label">Brand</label>
        <input type="text" class="form-control" name="brand" value="{{ $accessory->brand  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="model_name" class="form-label">Model Name</label>
        <input type="text" class="form-control" name="model_name" value="{{ $accessory->model_name  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="model" class="form-label">Model</label>
        <input type="text" class="form-control" name="model" value="{{ $accessory->model  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="type" class="form-label">Type</label>
        <input type="text" class="form-control" name="type" value="{{ $accessory->type  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="dial_shape" class="form-label">Dial Shape</label>
        <input type="text" class="form-control" name="dial_shape" value="{{ $accessory->dial_shape  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="touch_screen" class="form-label">Touch Screen</label>
        <input type="text" class="form-control" name="touch_screen" value="{{ isset($accessory->touch_screen) ? ($accessory->touch_screen ? 'Yes' : 'No') : '' }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="water_resistant" class="form-label">Water Resistant</label>
        <input type="text" class="form-control" name="water_resistant" value="{{ isset($accessory->water_resistant) ? ($accessory->water_resistant ? 'Yes' : 'No') : '' }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="driver_size" class="form-label">Driver Size (mm)</label>
        <input type="text" class="form-control" name="driver_size" value="{{ $accessory->driver_size  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="weight" class="form-label">Weight (g)</label>
        <input type="text" class="form-control" name="weight" value="{{ $accessory->weight  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="capacity" class="form-label">Capacity</label>
        <input type="text" class="form-control" name="capacity" value="{{ $accessory->capacity  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="battery_life" class="form-label">Battery Life (hrs)</label>
        <input type="text" class="form-control" name="battery_life" value="{{ $accessory->battery_life  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="display_resolution_size" class="form-label">Display Resolution Size</label>
        <input type="text" class="form-control" name="display_resolution_size" value="{{ $accessory->display_resolution_size  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="transmission_features" class="form-label">Transmission Features</label>
        <input type="text" class="form-control" name="transmission_Features" value="{{ $accessory->transmission_Features  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="battery" class="form-label">Battery</label>
        <input type="text" class="form-control" name="battery" value="{{ $accessory->battery  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="compatible_devices" class="form-label">Compatible Devices</label>
        <input type="text" class="form-control" name="compatible_devices" value="{{ $accessory->compatible_devices  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="part_number" class="form-label">Part Number</label>
        <input type="text" class="form-control" name="part_number" value="{{ $accessory->part_number  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="mic" class="form-label">Mic</label>
        <input type="text" class="form-control" name="mic" value="{{ $accessory->mic  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="length" class="form-label">Length (cm)</label>
        <input type="text" class="form-control" name="length" value="{{ $accessory->length  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="version" class="form-label">Version</label>
        <input type="text" class="form-control" name="version" value="{{ $accessory->version  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="wireless_range" class="form-label">Wireless Range (m)</label>
        <input type="text" class="form-control" name="wireless_range" value="{{ $accessory->wireless_range  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="speed" class="form-label">Speed (Mbps)</label>
        <input type="text" class="form-control" name="speed" value="{{ $accessory->speed  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="card_type" class="form-label">Card Type</label>
        <input type="text" class="form-control" name="card_type" value="{{ $accessory->card_type  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="connector_port" class="form-label">Connector Port</label>
        <input type="text" class="form-control" name="connector_port" value="{{ $accessory->connector_port  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="output_voltage" class="form-label">Output Voltage</label>
        <input type="text" class="form-control" name="output_voltage" value="{{ $accessory->output_voltage  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="output_current" class="form-label">Output Current</label>
        <input type="text" class="form-control" name="output_current" value="{{ $accessory->output_current  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="charging_time" class="form-label">Charging Time (hrs)</label>
        <input type="text" class="form-control" name="charging_time" value="{{ $accessory->charging_time  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="charging_cable" class="form-label">Charging Cable</label>
        <input type="text" class="form-control" name="charging_cable" value="{{ $accessory->charging_cable  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="sales_package" class="form-label">Sales Package</label>
        <input type="text" class="form-control" name="sales_package" value="{{ $accessory->sales_package  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" name="price" value="{{ $accessory->price  }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="image" class="form-label">Image URL</label>
        {{--<img src="{{ $accessory->image}}" alt=""  style="height:100px; width:100px;">--}}
        <input type="file" class="form-control" name="image">
    </div>
</div>
