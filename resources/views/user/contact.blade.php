@extends('layouts.app')

<!-- meta seo -->
@section('meta_title', $seo_meta->meta_title ?? '')
@section('meta_description', $seo_meta->meta_description ?? '')
@section('meta_keywords', $seo_meta->meta_keywords ?? '')
@section('canonical_url', $seo_meta->canonical_url ?? url()->current())

@section('content')
<main>

    <div class="container-fluid breadcrumb__area pt-3 pb-3 mb-5">
        <div class="container">
            <div class="col-12">
                <h2><b>Contact</b></h2>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="wrapper">
                        <div class="row no-gutters">
                            <div class="col-md-6">
                                <div class="contact-wrap w-100 p-lg-5 p-4">
                                    <h3 class="mb-4">Send us a message</h3>
                                    <div id="form-message-warning" class="mb-4"></div>
                                    <div id="form-message-success" class="mb-4">
                                        Your message was sent, thank you!
                                    </div>
                                    <form method="POST" action="{{Route('user.contactSave')}}" accept-charset="UTF-8"
                                        id="botble-contact-forms-fronts-contact-form" class="contact-form dirty-check"
                                        novalidate="novalidate">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        placeholder="Name*" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" name="email" id="email"
                                                        placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="phone" id="phone"
                                                        placeholder="phone*" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="address" id="address"
                                                        placeholder="address">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="subject" id="subject"
                                                        placeholder="Subject">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="content" class="form-control" id="message" cols="30"
                                                        rows="6" placeholder="Message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="submit" value="Send Message" class="btn vendor-button">
                                                    <div class="submitting"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex align-items-stretch">
                                <div class="info-wrap w-100 p-lg-5 p-4 img">
                                    <h3>Contact us</h3>
                                    <p class="mb-4">We're open for any suggestion or just to have a chat</p>
                                    <div class="">
                                        <div class="dbox w-100 d-flex align-items-start">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <span class="fa fa-map-marker"></span>
                                            </div>
                                            <div class="text pl-3">
                                                <p><span><strong>Address:</strong></span> 124/509 SFS Agarwal Farm
                                                    mansarovar jaipur
                                                    302020</p>
                                            </div>
                                        </div>
                                        <div class="dbox w-100 d-flex align-items-center">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <span class="fa fa-phone"></span>
                                            </div>
                                            <div class="text pl-3">
                                                <p><span><strong>Phone:</strong></span> <a href="tel://1234567920">+91
                                                        70148 78974</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="dbox w-100 d-flex align-items-center">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <span class="fa fa-paper-plane"></span>
                                            </div>
                                            <div class="text pl-3">
                                                <p><span><strong>Email:</strong></span> <a
                                                        href="mailto:info@mobilekidukaan.in">info@mobilekidukaan.in</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="dbox w-100 d-flex align-items-center">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <span class="fa fa-globe"></span>
                                            </div>
                                            <div class="text pl-3">
                                                <p><span><strong>Website</strong></span> <a
                                                        href="#">mobilekidukaan.in</a></p>
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


        @if(isset($seo_meta) && !empty($seo_meta->footer_content))
        <div class="container-fluid mt-5 px-4">
            <div class="row">
                <div class="col-md-12">
                    <h6>Top Stories:</h6>
                    <p> {!! $seo_meta->footer_content !!} </p>
                </div>
            </div>
        </div>
        @endif
        
    </section>

    &nbsp;
</main>

@endsection