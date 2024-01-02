@extends('front.layouts.master')
@section('title', isset($title) ? $title : 'Home')
@section('description', isset($description) ? $description : '')
@section('keywords', isset($keywords) ? $keywords : '')
@section('content')
    <!-- contact us area start here  -->
    <div class="contact-us-area section-bottom">
        <div class="container">
            <div class="row">
                <div class="contact-us-top">
                    <div class="row">

                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-contact-info border-0 text-center">
                                <img class="contact-info-icon"
                                    src="{{ asset('frontend/assets/images/contact-info-1.png') }}" alt="contact-info" />
                                <h3 class="contact-info-title">{{ __('Email') }}</h3>
                                <p class="contact-info-content">
                                    {{ $allsettings['email'] }}

                                </p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-contact-info text-center">
                                <img class="contact-info-icon"
                                    src="{{ asset('frontend/assets/images/contact-info-2.png') }}" alt="contact-info" />
                                <h3 class="contact-info-title">{{ __('Address') }}</h3>
                                <p class="contact-info-content">
                                    {{ $allsettings['address'] }} <br />
                                    {{ $allsettings['state'] }}
                                    {{ $allsettings['country'] }}
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-contact-info text-center">
                                <img class="contact-info-icon"
                                    src="{{ asset('frontend/assets/images/contact-info-3.png') }}" alt="contact-info" />
                                <h3 class="contact-info-title">{{ __('Phone') }}</h3>
                                <p class="contact-info-content">
                                    {{ $allsettings['call_us'] }}
                                </p>
                            </div>
                        </div>

                    </div>

                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7300.820510630411!2d90.36463814194558!3d23.80400628672471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0d0c51998f7%3A0x2251b181b13105e4!2sSenpara%20Parbata%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1700291281327!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                <div class="contact-form-area">
                    <div class="contct-form-top text-center">
                        <h2 class="form-title">{{ __('Got any questions?') }}</h2>
                        <p class="form-subtitle">{{ __('Use the form below to get in touch with the sales team') }}</p>
                    </div>
                    <form method="post" action="{{ route('contact.us.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="firstname" name="firstname"
                                        placeholder="{{ __('First Name') }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="lastname" name="lastname"
                                        placeholder="{{ __('Last Name') }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="{{ __('Email Address') }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="contact_number" name="contact_number"
                                        placeholder="{{ __('Contact Number') }}" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control message-box" id="message" name="message" rows="3"
                                        placeholder="{{ __('Type Message Here..') }}"></textarea>
                                </div>
                                <div class="form-button text-center">
                                    <button type="submit" class="form-btn">{{ __('Send Message') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- contact us area end here  -->
@endsection
