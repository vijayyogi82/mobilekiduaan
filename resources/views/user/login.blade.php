@extends('layouts.app')
@section('content')
<section class="body-content">
    <div class="container vendor-login">
        <div class="row signpages text-center">
            <div class="col-md-12">
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

                <div class="card">
                    <div class="row row-sm">
                        <div class="col-lg-6 col-xl-5 d-none d-lg-block text-center bg-prime details">
                            <div class="mt-5 pt-4 p-2 pos-absolute">
                                <img src="{{asset('assets/web/images/logo-white-150.png')}}" class="header-brand-img mb-4" alt="logo">
                                <div class="clearfix"></div>
                                <img src="{{asset('assets/web/images/user.svg')}}" class="ht-100 mb-0" alt="user">
                                <h5 class="mt-4 text-white"><a href="#" class="link-orange">Create Your Account</a></h5>
                                <span class="tx-white-6 tx-13 mb-5 mt-xl-0">Signup to create, discover and connect with the global community</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-7 col-xs-12 col-sm-12 login_form text-left">
                            <div class="container-fluid">
                                <div class="row row-sm">
                                    <div class="card-body mt-2 mb-2">
                                        <div class="clearfix"></div>
                                        <form action="{{Route('loginchange')}}" method="POST">
                                            @csrf
                                            <h5 class="text-start mb-2">Signin to Your Account</h5>
                                            <p class="mb-4 text-muted tx-13 ms-0 text-start">Signin to create, discover and connect with the global community</p>
                                            <div class="form-group text-start">
                                                <label>Email</label>
                                                <input class="form-control @if(Session::has('error')) is-invalid @endif" name="email" placeholder="Enter your email" type="text">
                                            </div>
                                            <div class="form-group text-start">
                                                <label>Password</label>
                                                <div class="input-group">
                                                    <input class="form-control @if(Session::has('error')) is-invalid @endif" 
                                                        name="password" 
                                                        placeholder="Enter your password" 
                                                        type="password" 
                                                        id="password" 
                                                        autocomplete="off">
                                                    <span class="input-group-text" onclick="togglePassword()">
                                                        <i id="eyeIcon" class="fa fa-eye"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn ripple login-button btn-block">Sign In</button>
                                        </form>
                                        <div class="text-start mt-4 ms-0">
                                            <div class="mb-1"><a href="{{route('user.forget_password')}}" class="link">Forgot password?</a></div>
                                            <div> <a href="{{Route('vendorRegister')}}" class="link">Don't have an store registration?</a></div>
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
<script src="https://use.fontawesome.com/f59bcd8580.js"></script>
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

<!-- password -->
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

@endsection