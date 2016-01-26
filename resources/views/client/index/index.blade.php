@extends('client.layouts.master')

@section('content')

  
	@if(count($pageSlideItems))
        <link href="{{ asset('assets/client/css/slider.css') }}" rel="stylesheet">
        <div class="row" style="margin-right: 0px;  margin-left: 0px;">
            <div id="carousel" class="carousel slide">
                <!-- индикатори слайдов-->
                <ol class="carousel-indicators">
                    <li class="active" data-target="#carousel" data-slide-to="0"> </li>
                    <li data-target="#carousel" data-slide-to="1"> </li>
                    <li data-target="#carousel" data-slide-to="2"> </li>
                    <li data-target="#carousel" data-slide-to="3"> </li>
                    <li data-target="#carousel" data-slide-to="4"> </li>
                </ol>
                <!-- слайди -->
                <div class="carousel-inner">

                    @foreach($pageSlideItems as $photoSlideId => $photoSlide)
                        <div class="item {{ $photoSlideId == 0 ? 'active' : '' }}">
                            <img src="{{ asset($photoSlide->getPageSlidePhotoUrl()) }}" style="margin: 0 auto;">
                            <div class="carousel-caption">
                                <h1>{{ $photoSlide->getAttribute('title') }}</h1>
                                <h2>{{ $photoSlide->getAttribute('description') }}</h2>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- стрелки для слайдов -->
                <a href="#carousel" class="left carousel-control" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a href="#carousel" class="right carousel-control" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
    @endif
	
	

    <div class="row" style="margin-right: 0px; margin-left: 0px; font-size: 2vw;">
        @if($howItWorkHeader != null)
            <p class="how_it_works"> {{ $howItWorkHeader->getAttribute('title') }} </p>
            <div class="under_how_it_works">
                {{ $howItWorkHeader->getAttribute('description') }}
            </div>
        @endif
        <div class="row" style="margin-right: 0px;  margin-left: 0px";>
            <div class="col-xs-hidden col-sm-hidden col-md-1"></div>
                @foreach($howItWorkItems as $item)
                    <div class="col-xs-12 col-md-2" >
                        <img class="img-responsive img-circle" src="{{ asset($item->getHowItWorksPhotoUrl()) }}" alt="">
                        <p class="under_plasecholder_sircl" style="word-wrap: break-word;"> {{ $item->getAttribute('title') }} </p>
                    </div>
                @endforeach
            <div class="col-xs-hidden col-sm-hidden col-md-1" ></div>
        </div>
        <span class="indent"></span>
    </div>

    @if(count($ifYouItems))
        <div class="row if_you" style="margin-right: 0px;  margin-left: 0px;">
            <span class="indent"></span>
            <div class="col-xs-hidden col-md-1"></div>
        @foreach($ifYouItems as $ifYouItem)
            <div class="col-xs-12 col-md-4">

                <p class="big_if_you">{{ $ifYouItem->getAttribute('title') }}</p>
                <p class="middle_if_you">{{ $ifYouItem->getAttribute('value') }}</p>

                <span class="indent"></span>

                <p class="small_if_you">{{ $ifYouItem->getAttribute('description') }}</p>

                <span class="indent"></span>
            </div>
                <div class="col-xs-hidden col-md-2"></div>
        @endforeach
            <div class="col-xs-hidden col-md-1"></div>
        </div>
    @endif


    <div class="row coffe" style="margin-right: 0px;  margin-left: 0px;">


        <div class="col-xs-hidden col-md-2"></div>

        <div class="col-xs-3 col-md-2 COFFEE_CUPS">
            <span class="indent"></span>
            <span class="indent"></span>
            <img class="img-size" src="{{ asset('assets/client/img/coffe.jpg') }}">
            <p></p>
            <p class="text_coffe">COFFEE CUPS</p>
            <p class="digits_coffe">{{ isset($coffeeItems['coffee_cups']) ? $coffeeItems['coffee_cups'] : 0 }}</p>
            <span class="indent"></span>
            <span class="indent"></span>
        </div>

        <div class="col-xs-3 col-md-2 PROJECTS">
            <span class="indent"></span>
            <span class="indent"></span>
            <img class="img-size" src="{{ asset('assets/client/img/work.jpg') }}">
            <p></p>
            <p class="text_coffe">PROJECTS</p>
            <p class="digits_coffe">{{ isset($coffeeItems['projects']) ? $coffeeItems['projects'] : 0 }}</p>
            <span class="indent"></span>
            <span class="indent"></span>
        </div>

        <div class="col-xs-3 col-md-2 WORKING_DAYS">
            <span class="indent"></span>
            <span class="indent"></span>
            <img class="img-size" src="{{ asset('assets/client/img/mouse.jpg') }}">
            <p></p>
            <p class="text_coffe">WORKING DAYS</p>
            <p class="digits_coffe">{{ isset($coffeeItems['working_days']) ? $coffeeItems['working_days'] : 0 }}</p>
            <span class="indent"></span>
            <span class="indent"></span>
        </div>

        <div class="col-xs-3 col-md-2 CLIENTS">
            <span class="indent"></span>
            <span class="indent"></span>
            <img class="img-size" src="{{ asset('assets/client/img/clients.jpg') }}">
            <p></p>
            <p class="text_coffe">CLIENTS</p>
            <p class="digits_coffe">{{ isset($coffeeItems['clients']) ? $coffeeItems['clients'] : 0 }}</p>
            <span class="indent"></span>
            <span class="indent"></span>
        </div>

        <div class="col-xs-hidden col-md-2 ">

        </div>

    </div>

    <div class="row" style="text-align: center; margin-right: 0px;  margin-left: 0px;">

        <div class="col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3" style="
    padding-left: 6vw;
    padding-right: 6vw;
">

            <br>
            <br>
            <h1 class="SELECT">
                SELECT A PLAN BELOW
            </h1>

        </div>

    </div>

    <div class="row SELECT_A_PLAN_BELOW" style="margin-right: 0px;  margin-left: 0px;">
        <span class="indent"></span>
        <span class="indent"></span>

        <div class="col-xs-hidden col-md-hidden col-lg-2"></div>

        <div class="col-xs-12 col-md-6 col-lg-2" id="select_a_plan_below">
            <div class="CUSTOM_COLOR_CORRECTION">

                <div class="row" style="margin-right: 0px;  margin-left: 0px;">
                    <div class="col-xs-5" style="padding-right: 0px;  padding-left: 0px;">
                        <div class="prise">


                            <span class="amount"><span class="dollar">$</span>0.18</span>
                            <p class="pimage">p/image</p>

                        </div>

                        <div class="green_prise">


                            <span class="amount"><span class="dollar">$</span>0.18</span>
                            <p class="pimage">p/image</p>

                        </div>

                    </div>
                    <div class="col-xs-7" style="padding-right: 0px;  padding-left: 0px;">
                        <p class="description text-left">CUSTOM COLOR CORRECTION</p>
                    </div>
                </div>



                <div class="row" style="margin-right: 0px;  margin-left: 0px;">

                    <div class="col-xs-1"></div>
                    <div class="col-xs-10" style="width: 100%;">
                        <img class="" src="{{ asset('assets/client/img/fon.jpg') }}" style="width: inherit;">
                        <p class="container-text">Temperature, Tint, Exposure, Recovery, Fill Light, Blacks, Brightness, Contrast, Clarity, Vibrance, Saturation  and Tone Curves .</p>
                    </div>
                    <div class="col-xs-1"></div>
                </div>
            </div>
            <a href="{{ route('client.auth.getRegister') }}" class="btn btn-dunger btn_CUSTOM_COLOR_CORRECTION" id="PURCHASE_LINK"> &nbsp; PURCHASE NOW &nbsp; </a>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-2" id="select_a_plan_below">
            <div class="CUSTOM_COLOR_CORRECTION">

                <div class="row" style="margin-right: 0px;  margin-left: 0px;">
                    <div class="col-xs-5" style="padding-right: 0px;  padding-left: 0px;">
                        <div class="prise">


                            <span class="amount"><span class="dollar">$</span>0.03</span>
                            <p class="pimage">p/image</p>

                        </div>

                        <div class="green_prise">


                            <span class="amount"><span class="dollar">$</span>0.03</span>
                            <p class="pimage">p/image</p>

                        </div>
                    </div>
                    <div class="col-xs-7" style="padding-right: 0px;  padding-left: 0px;">

                        <p class="description text-left">IMAGE SELECTION</p>
                    </div>
                </div>



                <div class="row" style="margin-right: 0px;  margin-left: 0px;">

                    <div class="col-xs-1"> </div>
                    <div class="col-xs-10" style="width: 100%;">
                        <img class="" src="{{ asset('assets/client/img/fon.jpg') }}" style="width: inherit;">
                        <p class="container-text">We look through your event and narrow the images down to all the good photos while removing images that are out-of-focus, over/underexposed, someone has their eyes closed or bad expressions.</p>
                    </div>
                    <div class="col-xs-1"> </div>
                </div>
            </div>
            <a href="{{ route('client.auth.getRegister') }}" class="btn btn-dunger btn_CUSTOM_COLOR_CORRECTION" id="PURCHASE_LINK"> &nbsp; PURCHASE NOW &nbsp; </a>

        </div>


        <div class="col-xs-12 col-md-6 col-lg-2" id="select_a_plan_below">
            <div class="CUSTOM_COLOR_CORRECTION">

                <div class="row" style="margin-right: 0px;  margin-left: 0px;">
                    <div class="col-xs-5" style="padding-right: 0px;  padding-left: 0px;">
                        <div class="prise">


                            <span class="amount"><span class="dollar">$</span>1</span>
                            <p class="pimage">p/image</p>

                        </div>

                        <div class="green_prise">


                            <span class="amount"><span class="dollar">$</span>1</span>
                            <p class="pimage">p/image</p>

                        </div>
                    </div>
                    <div class="col-xs-7" style="padding-right: 0px;  padding-left: 0px;">
                        <p class="description text-left">BASIC RETOUCHING CREATIVE EDITION</p>
                        <p style="  color: green;
                                        text-align: left;
                                        font-size: 12px;
                                        position: inherit;
                                        padding: 0;
                                        margin: 0;
                            ">Recomendet</p>
                    </div>
                </div>



                <div class="row" style="margin-right: 0px;  margin-left: 0px;">

                    <div class="col-xs-1"> </div>
                    <div class="col-xs-10" style="width: 100%;">
                        <img class="" src="{{ asset('assets/client/img/fon.jpg') }}" style="width: inherit;">
                        <p class="container-text">We edit your images to make them stand out from the rest. These are great for your websites, portfolio, blogs, etc. Either tell us which images you would want us to edit, or have us choose the best images. </p>
                    </div>
                    <div class="col-xs-1"> </div>
                </div>
            </div>
            <a href="{{ route('client.auth.getRegister') }}" class="btn btn-dunger btn_CUSTOM_COLOR_CORRECTION" id="PURCHASE_LINK"> &nbsp; PURCHASE NOW &nbsp; </a>

        </div>


        <div class="col-xs-12 col-md-6 col-lg-2" id="select_a_plan_below">
            <div class="CUSTOM_COLOR_CORRECTION">

                <div class="row" style="margin-right: 0px;  margin-left: 0px;">
                    <div class="col-xs-5" style="padding-right: 0px;  padding-left: 0px;">
                        <div class="prise">


                            <span class="amount">FREE</span>
                            <p class="pimage">trial</p>

                        </div>

                        <div class="green_prise">


                            <span class="amount">FREE</span>
                            <p class="pimage">trial</p>

                        </div>
                    </div>
                    <div class="col-xs-7" style="padding-right: 0px;  padding-left: 0px;">
                        <p class="description text-left">50 IMAGE FOR FREE</p>
                    </div>
                </div>



                <div class="row" style="margin-right: 0px;  margin-left: 0px;">

                    <div class="col-xs-1"> </div>
                    <div class="col-xs-10" style="width: 100%;">
                        <img class="" src="{{ asset('assets/client/img/fon.jpg') }}" style="width: inherit;">
                        <p class="container-text" style="font-size:1.3em;
                                                         ">Sign up now &amp; send your first 50 images for free trial</p>
                    </div>
                    <div class="col-xs-1"> </div>
                </div>
            </div>
            <a href="{{ route('client.auth.getRegister') }}" class="btn btn-dunger btn_CUSTOM_COLOR_CORRECTION" id="PURCHASE_LINK"><span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span>SING UP <span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></a>

        </div>


        <div class="col-xs-hidden col-md-hidden col-lg-2"></div>


    </div>

    <div class="row NEWSLETTERSIGN-UP" style="margin-right: 0px;  margin-left: 0px; border: 0;">

        <form method="POST" action="{{ route('client.subscribers.store') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="col-xs-hidden col-lg-2" > </div>
            <div class="col-xs-12 col-lg-3" style="padding-top: 15px;">
                <p class="NEWSLETTER"> NEWSLETTER <span class="SIGN-UP"> SIGN-UP </span> </p>
            </div>
            <div class="col-xs-12 col-lg-3"  style="padding-top: 8px; outline: none;">
                <input type="text" name="email" class="form-control NEWSLETTER_form_control" placeholder="Enter your E-mail..." autocomplete="off">
            </div>
            <div class="col-xs-12 col-lg-2" style="padding-top: 15px;">
                <a href="#" id="NEWSLETTER_LINK"><span>&nbsp; &nbsp; </span>SUBSCRIBE<span>&nbsp; &nbsp; &nbsp;</span></a>

            </div>
            <div class="col-xs-hidden col-lg-2"> </div>

        </form>

    </div>
@endsection