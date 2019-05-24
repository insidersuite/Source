@extends('layout')

@section('title','Insider Suite |  Invite Experience')
@section('head')
    @parent
    
    <link rel="stylesheet" type="text/css" href="{{ url('css/customize/create_experience.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/customize/create_experience_res.css') }}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="{{ url('css/intlTelInput.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/jquery-gallery.css') }}">
@endsection
@section('content')
    <div id="error-cont" class="experience-content" style="margin-left: 0px; display: block; min-height: unset!important; height: unset!important;overflow: unset!important; border-bottom: none!important;">
        <section id="invite_info" class = "error_info" style="display: block;">
            <div>
                <span class="_8tbpu3" aria-hidden="false"><img height="150" src="../images/errors/icon_error_page.png"></span>
            </div>
            <div class="invite_sent">
                <h2 class="heading">Payment declined</h2>
                <p><h3>Oh snap! The credit card information was declined.</h3></p>
                <p><h3>Please enter another payment method</h3></p>
            </div>
            
            <div id="error-form" class="form-general" style="min-height: 25vh!important;">
                <div class="form-content _36rlri">
                    <a type="button" class="_d4g44p2" href="https://www.insidersuite.com/mail_gift_card">
                        <span class="_cgr7tc7">Try Again</span>
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection

@section ('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="{{ url('js/utils.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/data.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/intlTelInput.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/jquery-gallery.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/moment.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>    
@endsection


