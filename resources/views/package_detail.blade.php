@extends('layouts.app')

@section('content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ url('') }}">Home</a></li>
                <li>{{ $package_detail->title }}</li>
            </ul>

            <div class="row margin-bottom-40">
                <div class="col-md-8 col-sm-8">
                    <h2>{{ $package_detail->title }} - {{ $package_detail->price }}৳ </h2>
                    <img src="{{ $package_detail->image }}" alt="">

                    <h3>Features</h3>
                    <ul class="pricing-content list-unstyled">
                        @php $features = unserialize($package_detail->features) @endphp
                        @foreach($features as $feature)
                            <li>
                                <i class="fa fa-star"></i> {{ $feature }}
                            </li>
                        @endforeach
                    </ul>

                    {!! $package_detail->detail !!}
                </div>
                <div class="col-md-4 col-sm-4">
                    <!-- BEGIN RECENT NEWS -->
                    <h2>Others {{ $package_detail->package_type }} Packages</h2>
                    <div class="recent-news margin-bottom-10">
                        @foreach($packages as $package)
                        <div class="row margin-bottom-10">
                            <div class="col-md-3">
                                <img class="img-responsive" alt="" src="{{ $package->image }}">
                            </div>
                            <div class="col-md-9 recent-news-inner">
                                <h3><a href="{{ url('package/'.$package->id) }}">{{ $package->title }}</a></h3>
                                <p class="text-limit">{{ strip_tags($package->detail) }}</p>
                                <a href="{{ url('package/'.$package->id) }}" class="more">Read More  <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- END RECENT NEWS -->

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