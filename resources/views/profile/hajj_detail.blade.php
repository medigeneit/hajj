@extends('layouts.app')

@section('content')
    <!-- BEGIN SLIDER -->
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">My Profile</li>
            </ul>
            <div class="row margin-bottom-40">
                <div class="col-md-12 col-sm-12">
                    <div class="content-page">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                @include('layouts.profile_left')
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <div class="tab-content" style="padding:0; background: #fff;">
                                    <!-- START TAB 1 -->
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="panel-group" id="accordion1">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">Hajj</h4>
                                                </div>
                                                <div class="panel-collapse">

                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label for="contacts-name">Year:</label>
                                                            {{ $hajj_edit->year }}
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Type:</label>
                                                            {{ $hajj_edit->type }}
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <label>Package</label>
                                                                <div class="package">
                                                                    @if($packages_listed)
                                                                    <p>{{ $packages_listed->title }} - {{ $packages_listed->price }}  </p>
                                                                    @endif
                                                                </div>
                                                                <label>Features</label>
                                                                <div class="feature">
                                                                    @if($feature_listed)
                                                                        @foreach($feature_listed as $row)
                                                                          <p>{{ $row->title }} - <span class="price">{{ $row->price }}</span> </p>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                                <h3>Total Price = <span class="total-price">{{ $hajj_edit->total_price }}</span><input type="hidden" value="{{ $hajj_edit->total_price }}" name="total_price"> </h3>
                                                            </div>

                                                        </div>




                                                        <div class="form-group">
                                                            <label>Group:</label>
                                                            {{ $group }}
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
                </div>
                <!-- END CONTENT -->
            </div>
        </div>
    </div>

@endsection

@section('js')




    <script type="text/javascript">

        $(document).ready(function() {

            $('[name="type"]').on('change', function() {
                var var_type = $(this).val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: '/type-package',
                    dataType: 'HTML',
                    data: {var_type: var_type},
                    success: function( msg ) {
                        $('.packages').html(msg);

                        /*total price calculation*/
                        var price =0;
                        $('.price').each(function() {
                            var this_price = parseInt($(this).text());
                            price = this_price+price;
                        });
                        $(".total-price").text(number_format(price));
                        $('[name="total_price"]').val(price);
                    }
                });
            })


            $("body").on('click', '.package-add', function(e){
                e.preventDefault();

                var package_id = $(this).data("id");

                $(this).hide();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: '/package-add-to-cart',
                    dataType: 'HTML',
                    data: {package_id: package_id},
                    success: function( msg ) {
                        $('.package').html(msg);

                        /*total price calculation*/
                        var price =0;
                        $('.price').each(function() {
                            var this_price = parseInt($(this).text());
                            price = this_price+price;
                        });
                        $(".total-price").text(number_format(price));
                        $('[name="total_price"]').val(price);
                    }
                });

            });


            $("body").on('click', '.feature-add', function(e){
                e.preventDefault();

                var feature_id = $(this).data("id");

                $(this).hide();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: '/feature-add-to-cart',
                    dataType: 'HTML',
                    data: {feature_id: feature_id},
                    success: function( msg ) {
                        $('.feature').append(msg);
                        /*total price calculation*/
                        var price =0;
                        $('.price').each(function() {
                            var this_price = parseInt($(this).text());
                            price = this_price+price;
                        });
                        $(".total-price").text(number_format(price));
                        $('[name="total_price"]').val(price);

                    }
                });

            });

            $("body").on('click', '.remove', function(e){
                e.preventDefault();

                $(this).parent().remove();

                /*total price calculation*/
                var price =0;
                $('.price').each(function() {
                    var this_price = parseInt($(this).text());
                    price = this_price+price;
                });
                $(".total-price").text(number_format(price));
                $('[name="total_price"]').val(price);
            });


            function number_format(number, decimals, decPoint, thousandsSep){
                decimals = decimals || 2;
                decPoint = decPoint || '.';
                thousandsSep = thousandsSep || ',';

                number = parseFloat(number);

                if(!decPoint || !thousandsSep){
                    decPoint = '.';
                    thousandsSep = ',';
                }

                var roundedNumber = Math.round( Math.abs( number ) * ('1e' + decimals) ) + '';
                var numbersString = decimals ? roundedNumber.slice(0, decimals * -1) : roundedNumber;
                var decimalsString = decimals ? roundedNumber.slice(decimals * -1) : '';
                var formattedNumber = "";

                while(numbersString.length > 3){
                    formattedNumber += thousandsSep + numbersString.slice(-3)
                    numbersString = numbersString.slice(0,-3);
                }

                return (number < 0 ? '-' : '') + numbersString + formattedNumber + (decimalsString ? (decPoint + decimalsString) : '');
            }


        })

    </script>



@endsection