@extends('admin.layout.adminapp')
@section('content')
<div class="container">
    <div class="inner-body">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Mobiles</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Mobiles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mobiles Add</li>
                </ol>
            </div>
            <div class="d-flex">
                <div class="justify-content-center">
                    <a href="{{route('admin.mobile.index')}}" class="btn btn-primary my-2 btn-icon-text">
                        Back
                    </a>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <form action="{{route('admin.mobile.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row row-sm">

                <!-- MOBILE DETAILS -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                    <b>MOBILE DETAILS</b>
                                    <div class="py-2">
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="tabs-detail" role="tabpanel">
                                                <div class="row row-cols-lg-2">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="brand"class="form-label">Brand Name <span class="text-danger">*<span></label>
                                                            <input class="form-control" placeholder="" name="brand" type="text" id="brand" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="phone" class="form-label required">Model Name </label>
                                                            <input class="form-control" placeholder=""  name="phone" type="text" id="model">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="hits" class="form-label">Hits</label>
                                                            <input class="form-control"   name="hits" type="text" id="hits">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label for="image" class="form-label">Images </label>
                                                        <div class="mb-3 position-relative">
                                                            <label class="custom-file-upload">
                                                                <input name="images[]" type="file" id="profile" multiple>
                                                                <i class="fas fa-cloud-upload-alt"></i> Choose a file
                                                            </label>
                                                        </div>
                                                        <!-- <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                                                            Upload new Image
                                                        </button> -->
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

                <!-- NETWORK -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                    <b>NETWORK</b>
                                    <div class="py-2">
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="tabs-detail" role="tabpanel">
                                                <div class="row row-cols-lg-2">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="network_techology" class="form-label">Techology</label>
                                                            <input class="form-control" placeholder="" name="network_techology" type="text" id="network_techology">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="network_2g_bands" class="form-label required">2G Bands </label>
                                                            <input class="form-control"  name="network_2g_bands" type="text" id="network_2g_bands">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="network_3g_bands" class="form-label">3G Bands</label>
                                                            <input class="form-control"   name="network_3g_bands" type="text" id="network_3g_bands">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="network_4g_bands" class="form-label">4G Bands</label>
                                                            <input class="form-control" name="network_4g_bands" type="text" id="network_4g_bands">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="network_5g_bands" class="form-label">5G Bands</label>
                                                            <input class="form-control"  name="network_5g_bands" type="text" id="network_5g_bands">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="network_speed" class="form-label">Speed</label>
                                                            <input class="form-control"   name="network_speed" type="text" id="network_speed">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="network_gprs" class="form-label">GPRS</label>
                                                            <input class="form-control"  name="network_gprs"  type="text" id="network_gprs">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="network_edge" class="form-label">EDGE</label>
                                                            <input class="form-control"  name="network_edge" type="text" id="network_edge">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="network_other" class="form-label">Other</label>
                                                            <input class="form-control"  name="network_other" type="text" id="network_other">
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

                <!-- LAUNCH -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                    <b>LAUNCH</b>
                                    <div class="py-2">
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="tabs-detail" role="tabpanel">
                                                <div class="row row-cols-lg-2">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="brand" class="form-label">Announced </label>
                                                            <input class="form-control" placeholder="" name="launch_announced" type="text" id="announced" >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="phone" class="form-label required">Status</label>
                                                            <input class="form-control" placeholder=""  name="launch_status" type="text" id="launch_status">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="hits" class="form-label">Other</label>
                                                            <input class="form-control" name="launch_other" type="text" id="launch_other">
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

                <!-- BODY -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                    <b>BODY</b>
                                    <div class="py-2">
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="tabs-detail" role="tabpanel">
                                                <div class="row row-cols-lg-2">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="body_dimensions" class="form-label">Dimensions</label>
                                                            <input class="form-control" placeholder="" name="body_dimensions"  type="text" id="body_dimensions" >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="body_weight" class="form-label required">Weight </label>
                                                            <input class="form-control" name="body_weight" type="text" id="body_weight">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="body_built" class="form-label">Built</label>
                                                            <input class="form-control" name="body_built" type="text" id="body_built">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="body_keyboard" class="form-label">Keyboard</label>
                                                            <input class="form-control" name="body_keyboard" type="text" id="body_keyboard">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="body_sim" class="form-label">SIM</label>
                                                            <input class="form-control" placeholder="" name="body_sim" type="text" id="body_sim">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="body_other" class="form-label">Other</label>
                                                            <input class="form-control" name="body_other" type="text" id="body_other">
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

                <!-- DISPLAY -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                    <b>DISPLAY</b>
                                    <div class="py-2">
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="tabs-detail" role="tabpanel">
                                                <div class="row row-cols-lg-2">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="display_type" class="form-label">Type</label>
                                                            <input class="form-control"  name="display_type" type="text" id="display_type" >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="display_size" class="form-label required">Size </label>
                                                            <input class="form-control"   name="display_size" type="text" id="display_size">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="display_resolution" class="form-label">Resolution</label>
                                                            <input class="form-control"   name="display_resolution" type="text" id="display_resolution">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="display_protection" class="form-label">Protection</label>
                                                            <input class="form-control"   name="display_protection" type="text" id="display_protection">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="display_other" class="form-label">Other</label>
                                                            <input class="form-control"  name="display_other" type="text" id="display_other">
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

                <!-- PLATFORM -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                    <b>PLATFORM</b>
                                    <div class="py-2">
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="tabs-detail" role="tabpanel">
                                                <div class="row row-cols-lg-2">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="platform_os" class="form-label">OS</label>
                                                            <input class="form-control" name="platform_os" type="text" id="platform_os" >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="platform_chipset" class="form-label required">Chipset </label>
                                                            <input class="form-control"  name="platform_chipset" type="text" id="platform_chipset">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="platform_cpu" class="form-label">CPU</label>
                                                            <input class="form-control" name="platform_cpu" type="text" id="platform_cpu">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="platform_gpu" class="form-label">GPU</label>
                                                            <input class="form-control"  name="platform_gpu" type="text" id="platform_gpu">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="platform_other" class="form-label">Other</label>
                                                            <input class="form-control"  name="platform_other" type="text" id="platform_other">
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

                <!-- MEMORY -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                    <b>MEMORY</b>
                                    <div class="py-2">
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="tabs-detail" role="tabpanel">
                                                <div class="row row-cols-lg-2">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="memory_card_slot" class="form-label">Card Slot</label>
                                                            <input class="form-control"  name="memory_card_slot" type="text" id="memory_card_slot" >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="memory_phonebook" class="form-label required">Phonebook </label>
                                                            <input class="form-control"  name="memory_phonebook" type="text" id="memory_phonebook">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="memory_internal" class="form-label">Internal</label>
                                                            <input class="form-control"  placeholder="" name="memory_internal" type="text" id="memory_internal">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="memory_call_records" class="form-label">Call Records</label>
                                                            <input class="form-control"  placeholder="" name="memory_call_records" type="text" id="memory_call_records">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="memory_other" class="form-label">Other</label>
                                                            <input class="form-control"  placeholder="" name="memory_other" type="text" id="memory_other">
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

                <!-- MAIN CAMERA -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                    <b>MAIN CAMERA</b>
                                    <div class="py-2">
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="tabs-detail" role="tabpanel">
                                                <div class="row row-cols-lg-2">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="main_camera_single" class="form-label">Single</label>
                                                            <input class="form-control" name="main_camera_single" type="text" id="main_camera_single" >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="main_camera_dual" class="form-label required">Dual </label>
                                                            <input class="form-control"  name="main_camera_dual" type="text" id="main_camera_dual">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="main_camera_triple" class="form-label">Triple</label>
                                                            <input class="form-control"  name="main_camera_triple" type="text" id="main_camera_triple">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="main_camera_quad" class="form-label">Quad</label>
                                                            <input class="form-control"  name="main_camera_quad" type="text" id="main_camera_quad">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="main_camera_five" class="form-label">Five</label>
                                                            <input class="form-control" name="main_camera_five" type="text" id="main_camera_five">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="main_camera_penta" class="form-label">Penta</label>
                                                            <input class="form-control"  name="main_camera_penta" type="text" id="main_camera_penta">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="main_camera_features" class="form-label">Features</label>
                                                            <input class="form-control"   name="main_camera_features" type="text" id="main_camera_features">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="main_camera_video" class="form-label">Video</label>
                                                            <input class="form-control"  name="main_camera_video" type="text" id="main_camera_video">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="main_camera_other" class="form-label">Other</label>
                                                            <input class="form-control"  name="main_camera_other" type="text" id="main_camera_other">
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

                <!-- SELFIE CAMERA -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                    <b>SELFIE CAMERA</b>
                                    <div class="py-2">
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="tabs-detail" role="tabpanel">
                                                <div class="row row-cols-lg-2">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="selfie_camera_single" class="form-label">Single</label>
                                                            <input class="form-control"   name="selfie_camera_single" type="text" id="selfie_camera_single">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="selfie_camera_dual" class="form-label">Dual</label>
                                                            <input class="form-control" name="selfie_camera_dual" type="text" id="selfie_camera_dual">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="selfie_camera_triple" class="form-label">Triple</label>
                                                            <input class="form-control"  name="selfie_camera_triple" type="text" id="selfie_camera_triple">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="selfie_camera_quad" class="form-label">Quad</label>
                                                            <input class="form-control"  name="selfie_camera_quad" type="text" id="selfie_camera_quad">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="selfie_camera_features" class="form-label">Features</label>
                                                            <input class="form-control" name="selfie_camera_features" type="text" id="selfie_camera_features">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="selfie_camera_video" class="form-label">video</label>
                                                            <input class="form-control" name="selfie_camera_video" type="text" id="selfie_camera_video">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="selfie_camera_other" class="form-label">Other</label>
                                                            <input class="form-control" name="selfie_camera_other" type="text" id="selfie_camera_other">
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

                <!-- SOUND -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                    <b>SOUND</b>
                                    <div class="py-2">
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="tabs-detail" role="tabpanel">
                                                <div class="row row-cols-lg-2">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="sound_alert_types" class="form-label">Alert Types</label>
                                                            <input class="form-control"  name="sound_alert_types" type="text" id="sound_alert_types" >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="sound_loudspeaker" class="form-label required">Loudspeaker </label>
                                                            <input class="form-control"  name="sound_loudspeaker" type="text" id="sound_loudspeaker">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="sound_3.5mm_jack" class="form-label">3.5mm Jack</label>
                                                            <input class="form-control"  name="sound_3.5mm_jack" type="text" id="sound_3.5mm_jack">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="sound_other" class="form-label">Other</label>
                                                            <input class="form-control"   name="sound_other" type="text" id="sound_other">
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

                <!-- COMMS -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                    <b>COMMS</b>
                                    <div class="py-2">
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="tabs-detail" role="tabpanel">
                                                <div class="row row-cols-lg-2">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="comms_wlan" class="form-label">Wlan</label>
                                                            <input class="form-control" name="comms_wlan" type="text" id="comms_wlan" >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="comms_bluetooth" class="form-label required">Bluetooth </label>
                                                            <input class="form-control"  name="comms_bluetooth" type="text" id="comms_bluetooth">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="comms_positioning" class="form-label required">Positioning </label>
                                                            <input class="form-control"  name="comms_positioning" type="text" id="comms_positioning">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="comms_nfc" class="form-label required">NFC </label>
                                                            <input class="form-control"  name="comms_nfc" type="text" id="comms_nfc">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="comms_gps" class="form-label">GPS</label>
                                                            <input class="form-control"  name="comms_gps" type="text" id="comms_gps">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="comms_radio" class="form-label">Radio</label>
                                                            <input class="form-control"   name="comms_radio" type="text" id="comms_radio">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="comms_usb" class="form-label">USB</label>
                                                            <input class="form-control"   name="comms_usb" type="text" id="comms_usb">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="comms_other" class="form-label">Other</label>
                                                            <input class="form-control" name="comms_other" type="text" id="comms_other">
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

                <!-- FEATURES -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                    <b>FEATURES</b>
                                    <div class="py-2">
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="tabs-detail" role="tabpanel">
                                                <div class="row row-cols-lg-2">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="features_sensors" class="form-label">Sensors</label>
                                                            <input class="form-control"  name="features_sensors" type="text" id="features_sensors" >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="features_messaging" class="form-label required">Messaging </label>
                                                            <input class="form-control"  name="features_messaging" type="text" id="features_messaging">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="features_browser" class="form-label">Browser</label>
                                                            <input class="form-control"   name="features_browser" type="text" id="features_browser">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="features_clock" class="form-label">Clock</label>
                                                            <input class="form-control"   name="features_clock" type="text" id="features_clock">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="features_alarm" class="form-label">Alarm</label>
                                                            <input class="form-control"   name="features_alarm" type="text" id="features_alarm">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="features_games" class="form-label">Games</label>
                                                            <input class="form-control"   name="features_games" type="text" id="features_games">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="features_languages" class="form-label">Languages</label>
                                                            <input class="form-control"   name="features_languages" type="text" id="features_languages">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="features_java" class="form-label">Java</label>
                                                            <input class="form-control"   name="features_java" type="text" id="features_java">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="features_other" class="form-label">Other</label>
                                                            <input class="form-control"   name="features_other" type="text" id="features_other">
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

                <!-- BATTERY -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                    <b>BATTERY</b>
                                    <div class="py-2">
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="tabs-detail" role="tabpanel">
                                                <div class="row row-cols-lg-2">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="battery_other" class="form-label required">Type </label>
                                                            <input class="form-control"  name="battery_other" type="text" id="battery_other">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="battery_charging" class="form-label required">Charging </label>
                                                            <input class="form-control"   name="battery_charging" type="text" id="battery_charging">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="battery_stand_by" class="form-label">Stand By</label>
                                                            <input class="form-control"   name="battery_stand_by" type="text" id="battery_stand_by">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="battery_talk_time" class="form-label">Talk Time</label>
                                                            <input class="form-control"   name="battery_talk_time" type="text" id="battery_talk_time">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="battery_music_play" class="form-label">Music Play</label>
                                                            <input class="form-control"   name="battery_music_play" type="text" id="battery_music_play">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="battery_type" class="form-label">Other</label>
                                                            <input class="form-control"  name="battery_type" type="text" id="battery_type" >
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

                <!-- MISC -->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                    <b>MISC</b>
                                    <div class="py-2">
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="tabs-detail" role="tabpanel">
                                                <div class="row row-cols-lg-2">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="misc_colors" class="form-label">Colors</label>
                                                            <input class="form-control"  name="misc_colors" type="text" id="misc_colors" >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="misc_models" class="form-label required">Models </label>
                                                            <input class="form-control"  name="misc_models" type="text" id="misc_models">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="misc_sar_us" class="form-label">Sar Us</label>
                                                            <input class="form-control"   name="misc_sar_us" type="text" id="misc_sar_us">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="misc_sar_eu" class="form-label">Sar Eu</label>
                                                            <input class="form-control"   name="misc_sar_eu" type="text" id="misc_sar_eu">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="misc_price_group" class="form-label">Price Group</label>
                                                            <input class="form-control"   name="misc_price_group" type="text" id="misc_price_group">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 position-relative">
                                                            <label for="misc_other" class="form-label">Other</label>
                                                            <input class="form-control"   name="misc_other" type="text" id="misc_other">
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
                                <a href="{{route('admin.mobile.index')}}" class="btn btn-light m-2">Cancel</a>
                                <button type="submit" name="submit" value="" class="btn btn-success m-2">Save</button>
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

<script>
    function deleteBanner(button) {
        var key = button.getAttribute('data-key');
        var imageWrapper = button.closest('.image-wrapper');
        imageWrapper.parentNode.removeChild(imageWrapper);
    }
</script>
@endpush
