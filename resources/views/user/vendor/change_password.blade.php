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
                                    <a href="{{route('vendor.account')}}" class="nav-link" role="tab"
                                        aria-controls="profile-tab-pane" aria-selected="true">
                                        Profile
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="{{Route('vendor.changePassword')}}" class="nav-link active" role="tab"
                                        aria-controls="change-password-tab-pane" aria-selected="false">
                                        Change Password
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <form method="POST" action="{{Route('vendor.change_password.update')}}" accept-charset="UTF-8">
                            @csrf
                            <div class="mb-3 position-relative">
                                <label for="old_password" class="form-label required">Current password</label>
                                <div class="input-group">
                                <input type="password" name="old_password" id="old_password" class="form-control" data-counter="250"
                                    placeholder="Current password" required="required" aria-required="true">
                                    <span class="input-group-text" onclick="togglePasswordOld()">
                                        <i id="eyeIconOld" class="fa fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3 position-relative">
                                <label for="password" class="form-label required">Password</label>
                                <div class="input-group">
                                <input type="password" name="password" class="form-control" data-counter="250"
                                    placeholder="New password" required="required" id="password" aria-required="true">
                                    <span class="input-group-text" onclick="togglePassword()">
                                        <i id="eyeIcon" class="fa fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3 position-relative">
                                <label for="password_confirmation" class="form-label required">Password
                                    confirmation</label>
                                    <div class="input-group">
                                <input type="password" name="password_confirmation" class="form-control"
                                    data-counter="250" placeholder="Confirm password" required="required"
                                    id="confirm_password" aria-required="true">
                                    <span class="input-group-text" onclick="togglePasswordConfirm()">
                                        <i id="eyeIconConfirm" class="fa fa-eye"></i>
                                    </span>
                                </div>
                                <div id="passwordError" class="error"></div>
                            </div>
                            <button class="btn vendor-button" type="submit">Change password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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

<!-- password -->
<script>
    function togglePasswordOld() {
        var passwordField = document.getElementById("old_password");
        var eyeIcon = document.getElementById("eyeIconOld");
        
        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }
</script>

<script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var eyeIcon = document.getElementById("eyeIcon");
        
        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }
</script>

<script>
    function togglePasswordConfirm() {
        var passwordField = document.getElementById("confirm_password");
        var eyeIcon = document.getElementById("eyeIconConfirm");
        
        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }
</script>
@endsection