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
                                    <h4>GST Detail</h4>
                                    <div class="form-group">
                                       <input type="hidden" id="gst_hidden" class="form-control">
                                        <input type="text" id="gstnumber" name="gstnumber" placeholder="GST Number" class="form-control" required>
                                        <div class="loading"></div>
                                        <span class="gst-mess" style="color: red;"></span>
                                        <div class="invalid-feedback">Username is already taken.</div>
                                        <div class="col-12 mt-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" name="tc_status" id="tc_status" required>
                                                <label class="form-check-label" for="">Agree to <span><a href="{{route('terms_and_conditions_vendor')}}">terms and conditions</a></span> and <span><a href="{{route('cookie_policy')}}">privacy policy</a></span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn vendor-button next-step">Next</button>
                                </div>
                                <div class="form-step">
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
                                    <button type="button" class="btn prev-step">Previous</button>
                                    <button type="button" class="btn vendor-button  next-save-vendor">Next</button>
                                </div>
                            </form>
                            <form >
                                <div class="form-step">
                                    <h4>Enter OTP</h4>
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="otp">OTP</label>
                                                <input type="number"  id="otp" name="otp" class="form-control" required >
                                            </div>        
                                        </div>
                                    </div>
                                    <button type="button" class="btn vendor-button check-otp"   id="submitOtp"> Submit</button>
                                    <button type="button" class="btn vendor-button d-none" id="resendOtp">Resend OTP</button>
                                    <p id="timer" style="margin-top: 10px;">Time left: <span id="countdown">30</span>
                                     seconds</p>
                                     <span class="otp-mess" style="color: red;"></span>

                                </div>
                            </form>
                            <form  action="{{Route('savePassword')}}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-step">
                                    <h4>Subscription Plan</h4>
                                    <span style="color: green;font-size: 19px;">Free registration until 31st October.</span>
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password"  id="password" name="password" class="form-control" required >
                                            </div>        
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="confirm_password">Confirm Password</label>
                                                <input type="password"  id="confirm_password" name="confirm_password" class="form-control" required >
                                                <input type="hidden" id="gst_number_data2" class="form-control" name="gst_number" >
                                                <span id="passwordError"></span>
                                            </div>        
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="confirm_password">Profile Pic</label>
                                                <input type="file" id="profile" class="form-control" name="profile" >
                                            </div>        
                                        </div>
                                    </div>
                                    <button type="button" class="btn prev-step">Previous</button>
                                    <button type="Submit" class="btn vendor-button">Submit</button>
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
        var percent = ((step + 1) / steps.length) * 100;
        progressBar.css("width", percent + "%").attr("aria-valuenow", percent);
    }
   

    function validateGSTNumber() {
        var request_id = $('#gst_hidden').val();
        console.log(request_id, 'request_id');
        var csrfToken = '{{ csrf_token() }}';
        var url_requestId = "{{Route('vendorGSTValidateRequestID')}}";

        $.ajax({
            url: url_requestId,
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': csrfToken 
            },
            data: { 'request_id': request_id },
            success: function(result) {

                console.log('result', result);
                console.log('result', result[0].status);
                if(result[0].status == 'failed'){
                    clearInterval(intervalId);
                    setTimeout(function() {
                        stopValidation();
                        $('.loading').hide();
                        $('.gst-mess').html('This GST Failed');
                    }, 1000);
                }
                if (result && result[0] && result[0].result) {

                    var sourceOutput = result[0].result.source_output;

                    $('#gst_number_data').val(sourceOutput.gstin);
                    $('#gst_number_data2').val(sourceOutput.gstin);
                    $('#store_name').val(sourceOutput.trade_name);

                    var address = sourceOutput.principal_place_of_business_fields.principal_place_of_business_address;

                    console.log('Address', address);

                    $('#name').val(isValid(sourceOutput.legal_name) ? sourceOutput.legal_name : '');

                    $('#address1').val(isValid(address.door_number) ? address.door_number : '');

                    $('#address2').val(
                        (isValid(address.floor_number) ? address.floor_number : '') + 
                        ' ' + (isValid(address.building_name) ? address.building_name : '') + 
                        ' ' + (isValid(address.street) ? address.street : '')
                    );

                    $('#city').val(isValid(address.location) ? address.location : '');

                    $('#state').val(isValid(address.state_name) ? address.state_name : '');

                    clearInterval(intervalId);

                    setTimeout(function() {
                        stopValidation();
                        if ($("#registrationForm").valid()) {
                            currentStep++;
                            showStep(currentStep);
                            $('.loading').hide();
                        }
                    }, 1000); 
                    
                }
            },
            error: function(xhr, status, error) {
                console.error('Error during validation:', error);
            }
        });
    }

    function isValid(value) {
        return value && value !== 'null';
    }

    function stopValidation() {
        console.log("Validation stopped.");
    }

    $(".next-save-vendor").click(function () {
        if ($("#registrationForm").valid()) {
            currentStep++;
            showStep(currentStep);
        }
    });

    $(".prev-step").click(function() {
        currentStep--;
        showStep(currentStep);
    });

    $(document).on('click', '.next-step', function() {
        $('.loading').show();
        var url = "{{Route('vendorGSTValidate')}}";
        var gst = $('#gstnumber').val();
        
        var tc_status = $('#tc_status').is(':checked') ? 1 : 0;

        console.log('tc_status', tc_status);

        $.ajax({
            url: url,
            method: "GET",
            data: { 'gst': gst, 'tc_status': tc_status },
            success: function(result) {

                console.log('request GST', result);

                if(result.status == 1){
                   $('.gst-mess').html(result.mess);
                   $('.loading').hide();
                   $('#gstnumber').val('');
                }
                else{
                    var request_id = result.request_id;
                    if(request_id){
                        
                        $('#gst_hidden').val(request_id);
                        
                        intervalId = setInterval(validateGSTNumber, 5000);
                        validateGSTNumber();
                    }
                    else{
                        $('.gst-mess').html('This Field Is Required');
                        $('.loading').hide();
                    }
                    
                }
                
            }
        });
    });


$(document).on('click', '.next-save-vendor', function() {
    let countdown = 30;
    let timerInterval = setInterval(function() {
        countdown--;
        $('#countdown').text(countdown);

        if (countdown <= 0) {
            clearInterval(timerInterval);
            $('#submitOtp').addClass('d-none');
            $('#resendOtp').removeClass('d-none');
        }
    }, 1000);

    $('#resendOtp').on('click', function() {
        $('#otp').val('')
        var url = "{{Route('user.smsOtpResend')}}";
        $.ajax({
            url: url,
            method: "GET",
            success: function(result) {
                if(result == 1){;
                    $('#submitOtp').removeClass('d-none');
                    $('#resendOtp').addClass('d-none');
                    let countdown = 30;
                    let timerInterval = setInterval(function() {
                        countdown--;
                        $('#countdown').text(countdown);

                        if (countdown <= 0) {
                            clearInterval(timerInterval);
                            $('#submitOtp').addClass('d-none');
                            $('#resendOtp').removeClass('d-none');
                        }
                    }, 1000);
                }
                else{
                    $('.otp-mess').html('Not send SMS');
                    $('#otp').val('')
                }
                console.log('result3',result);
            }
        });
    });

    $(document).on('click', '#submitOtp', function() {
        var url = "{{Route('user.smsOtpCheck')}}";
        var otp = $('#otp').val();
        $.ajax({
            url: url,
            method: "GET",
            data: { 'otp': otp },
            success: function(result) {
                if(result == 1){;
                    setTimeout(function() {
                        stopValidation();
                        if ($("#registrationForm").valid()) {
                            currentStep++;
                            showStep(currentStep);
                            // $('.loading').hide();
                        }
                    }, 1000);
                }
                else{
                    $('.otp-mess').html('this otp is wrong');
                    $('#otp').val('')

                }
                console.log('result2',result);
            }
        });
    });
});
showStep(currentStep);


    $(document).ready(function() {
        $('.next-save-vendor').click(function(e) {
            e.preventDefault(); 

                // Validate required fields
            var name = $('#name').val().trim();
            var email = $('#email').val().trim();
            var phone = $('#phone').val().trim();
            
            if (name === '' || email === '' || phone === '') {
                alert('Please fill out all required fields: Name, Email, Phone');
                return; // Prevent form submission if validation fails
            }
            else{
                var csrfToken = '{{ csrf_token() }}';
                var formData = $('#registrationForm').serialize(); 
                $.ajax({
                    url: "{{ route('register') }}",
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken 
                    },
                    data: formData,
                    success: function(response) {
                        console.log('Form submitted successfully.');
                    },
                    
                });

            }
        });
    });
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
