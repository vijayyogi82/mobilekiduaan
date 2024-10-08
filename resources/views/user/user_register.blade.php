@extends('layouts.app')
@section('content')
<section class="body-content">
    <div class="container vendor-login">
        <div class="row signpages text-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-6 col-xl-5 d-none d-lg-block text-center bg-prime details">
                            <div class="mt-5 pt-4 p-2 pos-absolute">
                                <img src="{{asset('assets/web/images/logo-white-150.png')}}"
                                    class="header-brand-img mb-4" alt="logo">
                                <div class="clearfix"></div>
                                <img src="{{asset('assets/web/images/user.svg')}}" class="ht-100 mb-0" alt="user">
                                <h5 class="mt-4 text-white"><a href="#" class="link-orange">Create Your Account</a></h5>
                                <span class="tx-white-6 tx-13 mb-5 mt-xl-0">Signup to create, discover and connect with
                                    the global community</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-7 col-xs-12 col-sm-12 login_form text-left">
                            <div class="container-fluid">
                                <div class="row row-sm">
                                    <div class="card-body mt-2 mb-2">
                                        <div class="clearfix"></div>
                                        <form action="{{Route('register')}}" method="POST" id="passwordForm">
                                            @csrf
                                            <h5 class="text-start mb-2">Signup to Your Account</h5>
                                            <p class="mb-4 text-muted tx-13 ms-0 text-start">Signup to create, discover and connect with the global community</p>
                                            <div class="row">
                                                <div class="form-group pb-2 col-sm-12">
                                                    <label>Full Name<span class="text-danger">*</span></label>
                                                    <input type="text" placeholder="Full Name" class="form-control"
                                                        name="name" required>
                                                </div>
                                                <div class="form-group pb-2 col-sm-12">
                                                    <label>Email<span class="text-danger">*</span></label>
                                                    <input type="email" placeholder="Email" class="form-control"
                                                        name="email" required>
                                                </div>
                                                <div class="form-group pb-2 col-sm-12">
                                                    <label>Phone<span class="text-danger">*</span></label>
                                                    <input type="number" placeholder="Phone" class="form-control"
                                                        name="phone" required>
                                                </div>
                                                <div class="form-group pb-2 col-sm-12">
                                                    <label>Address<span class="text-danger">*</span></label>
                                                    <input type="text" placeholder="Address" class="form-control"
                                                        name="address" required>
                                                </div>
                                                <div class="form-group pb-2 col-sm-12">
                                                    <label>Password<span class="text-danger">*</span></label>
                                                    <input type="password" placeholder="Password" name="password"
                                                        id="password" class="form-control">
                                                </div>
                                                <div class="form-group pb-2 col-sm-12">
                                                    <label>Confirm Password<span class="text-danger">*</span></label>
                                                    <input type="password" placeholder="Password confirmation"
                                                        id="confirm_password" class="form-control">
                                                    <div id="passwordError" class="error"></div>
                                                </div>
                                            </div>
                                            <div class="pb-2">
                                                <button type="submit" class="btn ripple login-button btn-block">Sign Up</button>
                                            </div>
                                        </form>
                                        <div class="text-start mt-5 ms-0">
                                            <div class="mb-1"><a href="{{route('user.forget_password')}}" class="link">Forgot password?</a></div>
                                            <div>Have an account? <a href="{{route('login')}}" class="link">Login Here</a></div>
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
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#confirm_password').on('keyup', function(e) {
            var password = $('#password').val();
            var confirmPassword = $('#confirm_password').val();
            if (password !== confirmPassword) {
                e.preventDefault();
                $('#passwordError').text('Passwords do not match.');
            } else {
                $('#passwordError').text('');
            }
        });
        $('#password, #confirm_password').on('input', function() {
            var password = $('#password').val();
            var confirmPassword = $('#confirm_password').val();
            if (password === confirmPassword) {
                $('#passwordError').text('');
            } else {
                $('#passwordError').text('Passwords do not match.');
            }
        });
    });
</script>
<script src="https://use.fontawesome.com/f59bcd8580.js"></script>
@endsection