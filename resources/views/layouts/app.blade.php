<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ settings('site_title',$settings) }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ settings('site_favicon',$settings) }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta content="Metronic Shop UI description" name="description">
    <meta content="Metronic Shop UI keywords" name="keywords">
    <meta content="keenthemes" name="author">

    <meta property="og:site_name" content="-CUSTOMER VALUE-">
    <meta property="og:title" content="-CUSTOMER VALUE-">
    <meta property="og:description" content="-CUSTOMER VALUE-">
    <meta property="og:type" content="website">
    <meta property="og:image" content="-CUSTOMER VALUE-">
    <meta property="og:url" content="-CUSTOMER VALUE-">

    <link rel="shortcut icon" href="favicon.ico">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">

    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/pages/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/plugins/owl.carousel/assets/owl.carousel.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/pages/css/components.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/pages/css/slider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/corporate/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/corporate/css/style-responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/corporate/css/themes/blue.css') }}" rel="stylesheet" id="style-color">
    <link href="{{ asset('assets/corporate/css/custom.css') }}" rel="stylesheet">

</head>

<body class="corporate">
<div class="pre-header">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li><i class="fa fa-phone"></i><span>{{ settings('site_phone',$settings) }}</span></li>
                    <li><i class="fa fa-envelope-o"></i><span>{{ settings('site_email',$settings) }}</span></li>
                </ul>
            </div>
            <div class="col-md-6 col-sm-6 additional-nav">
                <ul class="list-unstyled list-inline pull-right">
                    @if(Auth::check())
                    <li><a href="{{ url('myprofile') }}">My Profile</a></li>
                    <li>
                           <span><a href="#" title="Sign Out" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                               <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                   {{ csrf_field() }}
                               </form>
                           </span>
                    </li>
                        @else
                        <li><a href="{{ url('login') }}">Log In</a></li>
                        <li><a href="{{ url('register') }}">Registration</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="header">
    <div class="container">
        <a class="site-logo" href="{{ url('') }}"><img src="{{ settings('site_logo',$settings) }}" alt="{{ settings('site_title',$settings) }}"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
        <div class="header-navigation pull-right font-transform-inherit">
            <ul>
                {!! $main_menu !!}
            </ul>
        </div>
        <!-- END NAVIGATION -->
    </div>
</div>
<!-- Header END -->
    @yield('content')

<!-- BEGIN PRE-FOOTER -->
<div class="pre-footer">
    <div class="container">
        <div class="row">
            <!-- BEGIN BOTTOM ABOUT BLOCK -->
            <div class="col-md-4 col-sm-6 pre-footer-col">
                <h2>About us</h2>
                <p style="margin-bottom: 10px">{{ $about_us->short_description }}</p>
                <a href="{{ url('about-us') }}" alt="">Read More</a>
            </div>
            <!-- END BOTTOM ABOUT BLOCK -->

            <!-- BEGIN BOTTOM CONTACTS -->
            <div class="col-md-4 col-sm-6 pre-footer-col">
                <h2>Our Contacts</h2>
                <address class="margin-bottom-40">
                    {{ settings('site_address',$settings) }}<br>
                    Email: <a href="mailto:{{ settings('site_email',$settings) }}">{{ settings('site_email',$settings) }}</a><br>
                </address>
            </div>
            <!-- END BOTTOM CONTACTS -->

            <!-- BEGIN TWITTER BLOCK -->
            <div class="col-md-4 col-sm-6 pre-footer-col">
                <h2 class="margin-bottom-0">Newsletter</h2>
                <p>Subscribe to our newsletter and stay up to date with the latest news and deals!</p>
                <form action="#">
                    <div class="input-group">
                        <input type="text" placeholder="youremail@mail.com" class="form-control">
                        <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Subscribe</button>
                  </span>
                    </div>
                </form>
            </div>
            <!-- END TWITTER BLOCK -->
        </div>
    </div>
</div>
<!-- END PRE-FOOTER -->

<!-- BEGIN FOOTER -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 padding-top-10">
                {{ date('Y') }} © {{ settings('site_title',$settings) }}. ALL Rights Reserved. <a href="javascript:;">Privacy Policy</a> | <a href="javascript:;">Terms of Service</a>
            </div>

            <div class="col-md-4 col-sm-4">
                <ul class="social-footer list-unstyled list-inline pull-right">
                    @if(settings('facebook',$settings))
                        <li><a target="_blank" href="{{ settings('facebook',$settings) }}"><i class="fa fa-facebook"></i></a></li>
                    @endif
                    @if(settings('facebook',$settings))
                        <li><a target="_blank" href="{{ settings('google_plus',$settings) }}"><i class="fa fa-google-plus"></i></a></li>
                    @endif
                    @if(settings('facebook',$settings))
                        <li><a target="_blank" href="{{ settings('twitter',$settings) }}"><i class="fa fa-twitter"></i></a></li>
                    @endif
                    @if(settings('facebook',$settings))
                        <li><a target="_blank" href="{{ settings('youtube',$settings) }}"><i class="fa fa-youtube"></i></a></li>
                    @endif
                </ul>
            </div>

            <div class="col-md-4 col-sm-4 text-right">
                <p class="powered">Powered by: <a href="#">Ht Global</a></p>
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('') }}assets/plugins/respond.min.js"></script>

<script src="{{ asset('') }}assets/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('') }}assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="{{ asset('') }}assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
{{--<script src="{{ asset('') }}assets/corporate/scripts/back-to-top.js" type="text/javascript"></script>

<script src="{{ asset('') }}assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="{{ asset('') }}assets/plugins/owl.carousel/owl.carousel.min.js" type="text/javascript"></script>

<script src="{{ asset('') }}assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>


<script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/gmaps/gmaps.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/pages/scripts/contact-us.js') }}" type="text/javascript"></script>


<script src="{{ asset('assets/corporate/scripts/layout.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/pages/scripts/bs-carousel.js') }}" type="text/javascript"></script>--}}
<script type="text/javascript">
    jQuery(document).ready(function() {

        var url = window.location.href;
        $('.header-navigation a').each(function() {
            if (this.href == url) {
                $(this).parent().addClass("active");
                $(this).parent().parent().parent().addClass("active");
            }
        })

    });
</script>

@yield('js')

</body>
</html>