@extends('layouts.app')

@section('content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ url('') }}">Home</a></li>
                <li><a href="">{{ $page->title }}</a></li>
            </ul>

            <div class="row margin-bottom-40">
                <div class="col-md-12 col-sm-12">
                    <div class="row margin-bottom-40">
                        <!-- BEGIN CONTENT -->
                        <div class="col-md-12 col-sm-12 package">
                            <h2>{{ $page->title }}</h2>
                            {!! $page->description !!}
                            <div class="content-page">
                                <div class="row margin-bottom-40">
                                    <!-- Pricing -->
                                    @foreach($packages as $package)
                                    <div class="col-md-4">
                                        <div class="pricing hover-effect">
                                            <div class="pricing-head">
                                                <h3>{{ $package->title }}<span>{{ $package->price }}</span></h3>
                                            </div>
                                            <ul class="pricing-content list-unstyled">
                                                @php $features = unserialize($package->features) @endphp
                                                @foreach($features as $feature)
                                                    <li>
                                                        <i class="fa fa-star"></i> {{ $feature }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="pricing-footer">
                                                <a href="{{ url('package/'.$package->id) }}" class="btn btn-primary">details <i class="m-icon-swapright m-icon-white"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    <!--//End Pricing -->
                                </div>
                            </div>
                        </div>
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