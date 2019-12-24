@extends('layouts.app')

@section('content')
    <!-- BEGIN SLIDER -->
    <div class="page-slider margin-bottom-40">
        <div id="carousel-example-generic" class="carousel slide carousel-slider">
            <!-- Indicators -->
            <ol class="carousel-indicators carousel-indicators-frontend">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
               
         
                
          
               
               
  
               
               
                <!-- First slide -->
                <div class="item carousel-item-eight active">
                    <div class="container">
                        <div class="carousel-position-six text-uppercase text-center font-style">
                            <h2 class="margin-bottom animate-delay carousel-title-v5 f " data-animation="animated fadeInDown">
                                AFFORDABLE HAJJ 
                                <br> <span class="carousel-title-normal">PACKAGES </span>
                            </h2>
                        </div>
                    </div>
                </div>
                
                
                

                <!-- Second slide -->
                <div class="item carousel-item-nine">
                    <div class="container">
                        <div class="carousel-position-six font-style">
                            <h2 class="animate-delay carousel-title-v6 text-uppercase" data-animation="animated fadeInDown">
                                AROUND THE YEAR UMRAH
                            </h2>
                        </div>
                    </div>
                </div>

                <!--Five slide-->
                <div class="item carousel-item-twelve">
                    <div class="container">
                        <div class="carousel-position-six font-style">
                            <h2 class="animate-delay carousel-title-v6 text-uppercase" data-animation="animated fadeInDown">
                                Airlines ticket 
                            </h2>
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control carousel-control-shop carousel-control-frontend" href="#carousel-example-generic" role="button" data-slide="prev">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                </a>
                <a class="right carousel-control carousel-control-shop carousel-control-frontend" href="#carousel-example-generic" role="button" data-slide="next">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
         </div>   <!-- need to check -->
        <!-- END SLIDER -->

        <div class="main">




            <div class="container">



                <div class="row service-box margin-bottom-40">
                    <div class="col-md-8 col-sm-8">
                        <h2 class="hidden">Helpful Video</h2>
                        <iframe width="720" height="320" src="https://www.youtube.com/embed/XSZauIxvEMw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

                    </div>

                    <div class="col-md-4 col-sm-4">
                        <!-- BEGIN RECENT NEWS -->
                        <h2>Recent News</h2>
                        <div class="recent-news margin-bottom-10">
                            @foreach($news as $news_single)
                            <div class="row margin-bottom-10">
                                <div class="col-md-3">
                                    <img class="img-responsive" alt="" src="{{ $news_single->image }}">
                                </div>
                                <div class="col-md-9 recent-news-inner">
                                    <h3><a href="{{ url('news/'.$news_single->id) }}">{{ $news_single->title }}</a></h3>
                                    <p>{{ $news_single->short_description }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- END RECENT NEWS -->

                    </div>
                </div>



                <!-- BEGIN SERVICE BOX -->
                <div class="row service-box margin-bottom-40">
                    <div class="col-md-4 col-sm-4">
                        <div class="service-box-heading">
                            <em><i class="fa fa-location-arrow blue"></i></em>
                            <span>Guidance & Attention</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, dolore eiusmod quis tempor incididunt ut et dolore Ut veniam unde nostrudlaboris. Sed unde omnis iste natus error sit voluptatem.</p>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="service-box-heading">
                            <em><i class="fa fa-check red"></i></em>
                            <span>We commit, we accomplish</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, dolore eiusmod quis tempor incididunt ut et dolore Ut veniam unde nostrudlaboris. Sed unde omnis iste natus error sit voluptatem.</p>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="service-box-heading">
                            <em><i class="fa fa-compress green"></i></em>
                            <span>Our Clinets Comments</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, dolore eiusmod quis tempor incididunt ut et dolore Ut veniam unde nostrudlaboris. Sed unde omnis iste natus error sit voluptatem.</p>
                    </div>
                </div>
                <!-- END SERVICE BOX -->

                <!-- BEGIN BLOCKQUOTE BLOCK -->
                @if(!Auth::check())
                <div class="row quote-v1 margin-bottom-40">
                    <div class="col-md-9">
                        <span>আপনি কি এই বছরে হজ্জ অথবা ওমরাহ করতে ইচ্ছুক?</span>
                    </div>
                    <div class="col-md-3 text-right">
                        <a class="btn-transparent" href="{{ url('register') }}">রেজিস্ট্রেশন করুন</a>
                    </div>
                </div>
                @endif
                <!-- END BLOCKQUOTE BLOCK -->
                <!-- BEGIN CONTENT -->
                <div class="row margin-bottom-40">
                    <!-- BEGIN CONTENT -->
                    <div class="col-md-12 col-sm-12 package">
                        <h2>Hajj PACKAGES</h2>
                        <a href="{{ url('hajj-packege') }}" class="btn btn-primary button">All-Packages<i class="m-icon-swapright m-icon-white"></i></a>
                        <div class="content-page">
                            <div class="row margin-bottom-40">
                                <?php 
                                setlocale(LC_MONETARY, 'en_IN');
                                ?>
                                <!-- Pricing -->
                                @foreach($hajj_packages as $hajj_package)
                                <div class="col-md-4">
                                    <div class="pricing hover-effect">
                                        <div class="pricing-head">
                                            <h3>{{ $hajj_package->title }} <span>{{  $hajj_package->price }} ৳ </span></h3>
                                        </div>
                                        <ul class="pricing-content list-unstyled">
                                            @php $features = unserialize($hajj_package->features) @endphp
                                            @foreach($features as $feature)
                                            <li>
                                                <i class="fa fa-star"></i> {{ $feature }}
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="pricing-footer">
                                            <a href="{{ url('package/'.$hajj_package->id) }}" class="btn btn-primary">details <i class="m-icon-swapright m-icon-white"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!--//End Pricing -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
                <!-- BEGIN STEPS -->
                <div class="row margin-bottom-40 front-steps-wrapper front-steps-count-3">
                    <div class="col-md-4 col-sm-4 front-step-col">
                        <div class="front-step front-step1">
                            <h2>Goal definition</h2>
                            <p>Lorem ipsum dolor sit amet sit consectetur adipisicing eiusmod tempor.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 front-step-col">
                        <div class="front-step front-step2">
                            <h2>Analyse</h2>
                            <p>Lorem ipsum dolor sit amet sit consectetur adipisicing eiusmod tempor.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 front-step-col">
                        <div class="front-step front-step3">
                            <h2>Implementation</h2>
                            <p>Lorem ipsum dolor sit amet sit consectetur adipisicing eiusmod tempor.</p>
                        </div>
                    </div>
                </div>
                <!-- END STEPS -->
                <!-- BEGIN TABS AND TESTIMONIALS -->
                <div class="container">
                    <div class="row margin-bottom-20">
                        <!-- BEGIN LEFT SIDEBAR -->
                        <div class="col-md-8 col-sm-8">
                            <div class="row margin-bottom-20">
                                <h2>Umrah Package <a href="http://localhost:8181/umrah-package" class="btn btn-primary button">All-Packages<i class="m-icon-swapright m-icon-white"></i></a></h2>
                            </div>
                            @foreach($umrah_packages as $umrah_package)
                            <div class="row hajj-pack">
                                <div class="col-md-4 col-sm-4">
                                    <img class="img-responsive" alt="" src="{{ $umrah_package->image }}">
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h2><a href="{{ url('package/'.$umrah_package->id) }}">{{ $umrah_package->title }}</a></h2>
                                    <p class="text-limit">{{ strip_tags($umrah_package->detail) }}</p>
                                    <a href="{{ url('package/'.$umrah_package->id) }}" class="more">Read More  <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <!-- END LEFT SIDEBAR --




                  <!-- TESTIMONIALS -->
                        <div class="col-md-4">


                            <div class="row">

                                <div class="col-md-12 testimonials-v1">
                                    <div id="myCarousel" class="carousel slide">
                                        <!-- Carousel items -->
                                        <div class="carousel-inner">
                                            @foreach($testimonials as $key=>$testimonial)
                                            <div class="item {{ ($key==0)?'active':'' }}">
                                                <blockquote><p>{{ $testimonial->comment }}</p></blockquote>
                                                <div class="carousel-info">
                                                    <img class="pull-left" src="{{ $testimonial->image }}" alt="">
                                                    <div class="pull-left">
                                                        <span class="testimonials-name">{{ $testimonial->name }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                        <!-- Carousel nav -->
                                        <a class="left-btn" href="#myCarousel" data-slide="prev"></a>
                                        <a class="right-btn" href="#myCarousel" data-slide="next"></a>
                                    </div>


                                </div>

                                <div class="col-md-12">
                                    <div id="fb-root"></div>
                                    <script>(function(d, s, id) {
                                            var js, fjs = d.getElementsByTagName(s)[0];
                                            if (d.getElementById(id)) return;
                                            js = d.createElement(s); js.id = id;
                                            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=166130416879447&autoLogAppEvents=1';
                                            fjs.parentNode.insertBefore(js, fjs);
                                        }(document, 'script', 'facebook-jssdk'));</script>
                                    <div style="margin-top: 30px" class="fb-page" data-href="https://www.facebook.com/wamybd/" data-width="360"  data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/wamybd/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/wamybd/">WAMY - Bangladesh</a></blockquote></div>
                                </div>

                            </div>












                        </div>
                        <!-- END TESTIMONIALS -->

                    </div>
                </div>
            </div>
            <!--Start Services-->
            <div class="container">
                <div class="row margin-bottom-40">
                    <!-- BEGIN CONTENT -->
                    <div class="col-md-12 col-sm-12">
                        <h1>Our Services</h1>
                        <div class="content-page">
                            <div class="row">
                                <!-- BEGIN SERVICE BLOCKS -->
                                <div class="col-md-12">
                                    <div class="row margin-bottom-20">
                                        @foreach($services as $key=>$services_single)
                                        <div class="col-md-3">
                                            <div class="service-box-v1">
                                                <div class="service-image">
                                                    @if($key==0 || $key==1 || $key==2)
                                                   <i class="{{ $services_single->icon_class }}"></i>
                                                    @elseif($key==3)
                                                       <span><img height="52" src="{{ 'photos/1/37018-200.png' }}"></span>
                                                    @else
                                                        <span><img height="52" src="{{ 'photos/1/Makkah-512.png' }}"></span>
                                                    @endif
                                                </div>
                                                <h2 style="font-size:28px;">{{ $services_single->title }}</h2>
                                                <p>{{ $services_single->short_description }}</p>
                                                <a href="{{ url('service/'.$services_single->id) }}" class="btn btn-primary">Button</a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- END SERVICE BLOCKS -->
                            </div>
                            <!-- BEGIN BLOCKQUOTE BLOCK -->
                        </div>
                        <!--End Services-->
                        <!-- END CLIENTS -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')




    <script type="text/javascript">

        $(document).ready(function() {

        })

    </script>



@endsection