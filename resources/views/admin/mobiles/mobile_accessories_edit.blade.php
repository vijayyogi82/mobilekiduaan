@extends('admin.layout.adminapp')
@section('content')
<div class="container">
    <div class="inner-body">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Accessory</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Accessories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Accessory Edit</li>
                </ol>
            </div>
            <div class="d-flex">
                <div class="justify-content-center">
                    <a href="{{route('admin.mobile.accessories')}}" class="btn btn-primary my-2 btn-icon-text">
                        Back
                    </a>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <form action="{{route('admin.mobile.accessories')}}" method="post"  enctype="multipart/form-data">
            @csrf
            <input type="hidden"  name="id" value="{{$accessory->id}}">
            <div class="row row-sm">
                <!-- Mobile  -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <!-- profile section -->
                                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                    <b>ACCESSORY DETAILS</b>
                                    <div class="py-2">
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="tabs-detail" role="tabpanel">
                                                <!-- <div class="row row-cols-lg-2">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="accessory_id" class="form-label">Accessories </label>
                                                            <select name="model_name" id="accessory_id" class="form-control">
                                                                <option value="">Select Accessory</option>
                                                                @foreach($accessories as $acc)
                                                                <option value="{{$acc->id}}" {{$acc->type == $accessory->type ? 'selected' : '' }}>{{$acc->type}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> -->

                                                <div class="row row-cols-lg-2">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
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
                                                                @if($accessory->image)
                                                                    <a href="{{ url($accessory->image) }}" target="_blank"> 
                                                                        <img src="{{ asset($accessory->image) }}" alt="Accessory Image"> 
                                                                    </a>
                                                                @endif
                                                                <input type="file" class="form-control mt-2" name="image">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- button -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="text-center">
                                <a href="{{route('admin.mobile.accessories')}}" class="btn btn-light m-2">Cancel</a>
                                <button type="submit" name="submit" value="update" class="btn btn-success m-2">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
</div>


@endsection

<!-- Styles -->
@push('styles')
<style>
    .custom-file-upload {
        display: inline-block;
        padding: 10px 20px;
        border: 2px dashed #abb6c3;
        border-radius: 5px;
        background: #f8f9fa;
        color: #abb6c3;
        cursor: pointer;
        text-align: center;
        height: 75px;
        width: 100%;
        padding: 26px 20px;
    }

    .custom-file-upload input[type="file"] {
        display: none;
    }

    .custom-file-upload:hover {
        background: #e9ecef;
    }

    .custom-file-upload:active {
        background: #ced4da;
    }

    /* hover  delete  image */
    .image-wrapper:hover .remove-button {
        display: block !important;
    }
</style>
@endpush

<!-- scripts -->
@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    document.getElementById('profile').addEventListener('change', function() {
        var fileInput = document.getElementById('profile');
        var fileNameDisplay = document.getElementByClass('fa-cloud-upload-alt');
        
        if (fileInput.files.length > 0) {
            fileNameDisplay.textContent = fileInput.files[0].name;
        } else {
            fileNameDisplay.textContent = 'No file chosen';
        }
    });
</script>
@endpush
