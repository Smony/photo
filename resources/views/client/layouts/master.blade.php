<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{ $siteTitle }}</title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets/client/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/client/css/slider.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/client/css/custom.css') }}" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container-fluid" style="padding: 0px; font-family: Source Sans Pro; ">

    <div class="navbar navbar-default navbar">
        <div class="navbar-header">
            <button type="button"  class="navbar-toggle" data-toggle="collapse" data-target="#responsive_menu" style="margin-left: auto; margin-right: auto;">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="padding:15px" href="https://www.google.com.ua/">S</a>
        </div>
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="responsive_menu">
                <ul class="nav navbar-nav">
                    <li id="hidden_on_touch_screen">
                        <a href="#">
                            <button type="button" class="btn btn-info" id="bar">
                                <i class="fa fa-bars fa-lg"></i>
                            </button>
                        </a>
                    </li>

                    @if(count($menuLinks))
                        @foreach($menuLinks as $menuLinkId => $menuLink)
                            @if((int)floor(count($menuLinks)/2) === $menuLinkId)
                                <li id="hidden_on_touch_screen">
                                    <a href="{{ route('client.index.index') }}">
                                        <button type="button" class="btn btn-info btn-lg" id="logo">{{ $siteTitle }}</button>
                                    </a>
                                </li>
                            @endif
                            <li id="wider_on_the_PC">
                                <a href="{{ $menuLink->getAttribute('value') }}">
                                    <button type="button" class="btn btn-default" id="navigate">{{ $menuLink->getAttribute('title') }}</button>
                                </a>
                            </li>
                        @endforeach
                    @else
                        <li id="hidden_on_touch_screen">
                            <a href="{{ route('client.index.index') }}">
                                <button type="button" class="btn btn-info btn-lg" id="logo">{{ $siteTitle }}</button>
                            </a>
                        </li>
                    @endif

                    <li>
                        <a href="#">
                            <button type="button" class="btn btn-default" id="navigate" style="margin-top: 0px;">
                                <a href="{{ route('client.auth.getLogin') }}" class="btn-auth-group">Login</a> / <a href="{{ route('client.auth.getRegister') }}" class="btn-auth-group">Register</a>
                            </button>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    @yield('content')

    <div class="row footer" style="margin-right: 0px;  margin-left: 0px; padding-top: 25px; padding-bottom: 20px;">

        <div class="col-xs-hidden col-lg-2"> </div>

        <div class="col-xs-12 col-lg-2">

            <p class="contact_logo">
                <a href="{{ route('client.index.index') }}" class="logo_in_footer">
                    {{ $siteTitle }}
                </a>
            </p>
            @if(isset($contactItems['phone_number']) && $contactItems['phone_number'] != null)
                <p  class="contact">
                    <img src="{{ asset('assets/client/img/phone.jpg') }}">
                    {{ $contactItems['phone_number'] }}
                </p>
            @endif
            @if(isset($contactItems['email']) && $contactItems['email'] != null)
                <p  class="contact">
                    <img src="{{ asset('assets/client/img/e-mail.jpg') }}">
                    {{ $contactItems['email'] }}
                </p>
            @endif
            @if(isset($contactItems['address']) && $contactItems['address'] != null)
                <p  class="contact">
                    <img src="{{ asset('assets/client/img/map.jpg') }}">
                    {{ $contactItems['address'] }}
                </p>
            @endif
            <p  class="contact_social_networks">
                @if(isset($socialLinks['facebook']) && $socialLinks['facebook'] != null)
                    <a href="{{ $socialLinks['facebook'] }}" target="_blank" class="social_networks"><i class="fa fa-facebook  "></i></a> &nbsp; &nbsp; &nbsp; &nbsp;
                @endif
                @if(isset($socialLinks['twitter']) && $socialLinks['twitter'] != null)
                    <a href="{{ $socialLinks['twitter'] }}" target="_blank" class="social_networks"><i class="fa fa-twitter  "></i></a> &nbsp; &nbsp; &nbsp; &nbsp;
                @endif
                @if(isset($socialLinks['pinterest']) && $socialLinks['pinterest'] != null)
                    <a href="{{ $socialLinks['pinterest'] }}" target="_blank" class="social_networks"><i class="fa fa-pinterest  "></i></a> &nbsp; &nbsp; &nbsp; &nbsp;
                @endif
                @if(isset($socialLinks['instagram']) && $socialLinks['instagram'] != null)
                    <a href="{{ $socialLinks['instagram'] }}" target="_blank" class="social_networks"><i class="fa fa-instagram  "></i></a> &nbsp; &nbsp; &nbsp; &nbsp;
                @endif
            </p>

        </div>

        <div class="col-xs-12 col-lg-1"> </div>

        <div class="col-xs-12 col-lg-2 EMAIL_UPDATES">
            <p class="text-left"> EMAIL UPDATES </p>


            <input type="text" class="form-control footer_form_control" placeholder="Enter your e-mail">
            <input type="text" class="form-control footer_form_control" placeholder="Enter your name">
            <input type="text" class="form-control footer_form_control_text" placeholder="Enter your text">


            <a href="#" class="send_button">
                &nbsp; SEND &nbsp;
            </a>


        </div>

        <div class="col-xs-12 col-lg-1"> </div>

        <div class="col-xs-12 col-lg-2 footer_menu">
            @if(count($menuLinks))
                <ul class="MENU">
                    <br>
                    <li>MENU</li>
                </ul>
                <ul class="MENU_items">
                    @foreach($menuLinks as $menuLink)
                        <hr>    <li><a href="{{ $menuLink->getAttribute('value') }}">{{ $menuLink->getAttribute('title') }}</a></li>
                    @endforeach
                </ul>
                <hr>
            @endif
        </div>


        <div class="col-xs-hidden col-lg-2"> </div>


    </div>

    <div class="row copyright" style="margin-right: 0px;  margin-left: 0px;">
        <div class="col-xs-12">
            <br>
            <p class="text-center" style="margin-bottom: 0px;"> &#169; Development and design - DevelopersCompany</p>
            <br>
        </div>
    </div>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('assets/client/js/bootstrap.min.js') }}"></script>

@yield('scripts')

</body>
</html>