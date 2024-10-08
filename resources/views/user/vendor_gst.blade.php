@extends('layouts.app')
@section('content')
    <style>
        .form-step {
            display: none;
        }
        .form-step.active {
            display: block;
        }
        .progress-bar {
            width: 33%;
            background-color: #ff6600 ;
        }

        .spinner-border {
            display: none;
        }
        .loading{
            position: relative;
            top: -45px;
            right: -277px;
            height:50px;
            width: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor:progress;

            border-radius: 50%;
            border-top: 5px solid gold;
            border-bottom: 5px solid transparent;
            border-left: 5px solid gold;
            border-right: 5px solid transparent;
            animation: loading 1s linear infinite;
        }
        .vendor-login {
            padding: 0px !important;
            padding-top: 40px !important;
        }

        @keyframes loading {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .required { color: red; }
    </style>
<section class="body-content">
    <div class="container-fluid vendor-login">
        <div class="row signpages">
            <div class="col-md-12">
                <div class="card">
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
                    <div class="row row-sm" >
                        <div class="container-fluid mx-5 my-5">
                            <h2 class="text-center pb-4">Vendor Registration</h2>
                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <form id="registrationForm" >
                                <div class="form-step active">
                                    <h4>Store Address</h4>
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="store_name">Name <span class="required">*</span></label>
                                                <input type="text"  id="name" name="name" class="form-control" required >
                                            </div>        
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="store_name">Store Name <span class="required">*</span></label>
                                                <input type="text" readonly id="store_name" name="shop_name" class="form-control" required >
                                            </div>        
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="address1">Address 1 <span class="required">*</span></label>
                                                <input type="text" id="address1" class="form-control"  name="address" required>
                                            </div> 
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="address2">Address 2</label>
                                                <input type="text" id="address2"  class="form-control">
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="city">City <span class="required">*</span></label>
                                                <input type="text" id="city" class="form-control" name="city" required>
                                            </div> 
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="state">State <span class="required">*</span></label>
                                                <input type="text" id="state" class="form-control" name="state" required>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="phone">Phone <span class="required">*</span></label>
                                                <input type="tel" id="phone" class="form-control" name="phone" required>
                                                <input type="hidden" id="gst_number_data" class="form-control" name="gst_number" >
                                            </div> 
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="email">E-mail <span class="required">*</span></label>
                                                <input type="email" id="email" class="form-control" name="email" required>
                                                
                                            </div> 
                                        </div>
                                    </div>
                                    <!-- <button type="button" class="btn prev-step">Previous</button> -->
                                    <button type="submit" class="btn vendor-button  next-save-vendor">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</section>
<script>
$(document).ready(function() {
    var currentStep = 0;
    var steps = $(".form-step");
    var progressBar = $(".progress-bar");
    var intervalId;
    $('.loading').hide();
    function showStep(step) {
        steps.removeClass("active").eq(step).addClass("active");
        var percent = 50;
        progressBar.css("width", percent + "%").attr("aria-valuenow", percent);
    }
   
});
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

    $(document).ready(function() {
        $('.radio-btn-plan').on('click', function(e) {
            var plan_price = $(this).data('plan_price');
             console.log('plan_price',plan_price);
            $('#amount').val(plan_price);

        });
    });
});



</script>
@endsection
