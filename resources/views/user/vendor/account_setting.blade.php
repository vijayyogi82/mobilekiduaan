@extends('layouts.app')
@section('content')
<style>
    .active {
        background: #1d4f71;
    }
</style>
<section class="body-content">

    <div class="container-fluid breadcrumb__area pt-3 pb-3 mb-5">
        <div class="container">
            <div class="col-12">
                <h2>Welcome, {{Auth::user()->shop_name}}</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid p-3">
         @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> {{Session::get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
         @endif
         @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error</strong> {{Session::get('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
         @endif
        <div class="row">

            <div class="col-12">
                <button class="btn vendor-button" id="filter-toggle-button">Menu</button>
            </div>

            <div class="col-md-3 filter-column" id="filter-column">

                <button type="button" class="close d-block d-md-none" id="close-filter" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <!-- <div class="card"> -->
                    <x-vendor.sidebar />
                <!-- </div> -->
            </div>
            
            <div class="col-md-9">
            
                <div class="card custom-card overflow-hidden">
                    <div class="card-body">
                        <div class="page-header mt-2 mb-4">
                            <ul class="nav nav-tabs nav-fill" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="{{route('vendor.account')}}" class="nav-link active" role="tab"
                                        aria-controls="profile-tab-pane" aria-selected="true">
                                        Profile
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="{{Route('vendor.changePassword')}}" class="nav-link" role="tab"
                                        aria-controls="change-password-tab-pane" aria-selected="false">
                                        Change Password
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <form method="POST" action="{{Route('vendor.account.save')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Full Name</label>
                                        <input class="form-control" data-counter="250" name="name" type="text"
                                            value="{{$user ? $user->name : ''}}" id="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dob" class="form-label">Date of birth</label>
                                        <input class="form-control" id="date_of_birth" data-date-format="yyyy-mm-dd" name="dob"
                                            type="text" value="{{$user ? $user->dob : ''}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input class="form-control" data-counter="60" placeholder="e.g: example@domain.com"
                                            disabled="" name="email" type="email" value="{{$user ? $user->email : ''}}"
                                            id="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input class="form-control" data-counter="250" name="phone" type="text"
                                            value="{{$user ? $user->phone : ''}}" id="phone">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city" class="form-label">City</label>
                                        <input class="form-control" name="city" type="text" value="{{$user ? $user->city : ''}}"
                                            id="city">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="state" class="form-label">State</label>
                                        <input class="form-control" data-counter="250" name="state" type="text"
                                            value="{{$user ? $user->state : ''}}" id="state">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address" class="form-label">Address</label>
                                        <input class="form-control" data-counter="250" name="address" type="text"
                                            value="{{$user ? $user->address : ''}}" id="address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="profile" class="form-label">Profile Pic</label>
                                        <input class="form-control" name="profile" type="file" id="profile">
                                        <div class="image-wrapper" style="position: relative; display: inline-block; margin: 10px;">
                                            <img class="img-responsive uploaded-image img-add" style="padding: 16px; height: 99px;width: 99px;border-radius: 55px;" src="{{ asset($user->profile ? $user->profile : 'assets/web/images/store-logo.jpg') }}" alt="img">
                                            <button class="remove-button" data-key="0" style="display: none; position: absolute; top: 10px; right: 10px; background-color: rgba(0,0,0,0.5); color: white; border: 1px solid white; padding: 5px 10px; cursor: pointer;">x</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <button class="btn vendor-button" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<style>
    /* hover  delete  image */
    .image-wrapper:hover .remove-button {
        display: block !important;
    }
</style>

<script>
    $(document).ready(function() {
        $('#filter-toggle-button').on('click', function() {
            $('#filter-column').toggle();
        });

        $('#close-filter').on('click', function() {
            $('#filter-column').hide();
        });

        $('#open-nav-menu').on('click', function() {
            $('.navigation-menu').toggle();
            $('.navbar-collapse').toggle();
        });

        $('.sub-menu ul').hide();
        $(".sub-menu a").click(function() {
            $(this).parent(".sub-menu").children("ul").slideToggle("100");
            $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
        });
    });
</script>


<script>
    $(document).on('click', '.remove-button', function(event) {
        event.preventDefault();
        var confirmation = confirm('Are you sure you want to delete this image?');
        if (!confirmation) {
            return;
        }
        var key = $(this).data('key');
        var userId = "{{ $user->id }}";

        $.ajax({
            url: '{{ route("admin.vendor.delete_image") }}', 
            method: 'GET',
            data: {
                id: userId,
                key: key
            },
            success: function(response) {
                if (response.success) {
                    $(this).closest('.image-wrapper').remove();
                } else {
                    alert(response.message);
                }
            }.bind(this),
            error: function(response) {
                alert('An error occurred while deleting the image.');
            }
        });
    });
</script>
@endsection