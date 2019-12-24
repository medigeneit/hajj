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
                                                    <h4 class="panel-title">Hajj <a class="text-right" style="float: right" href="#">Add</a></h4>
                                                </div>
                                                <div class="panel-collapse">
                                                    {!! Form::open(['url'=>'hajj-insert','files'=>true]) !!}
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label for="contacts-name">Year</label>
                                                            <select name="year" class="form-control" required>
                                                                <option value="">Select Year</option>
                                                                @for($i=date('Y');$i<=2030;$i++)
                                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Type</label>
                                                            {!! Form::select('type', ['' => 'Select Type','Hajj' => 'Hajj','Umrah' => 'Umrah'], old('type'),['class'=>'form-control','required'=>'required']) !!}<i></i>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">Package/Features</div>
                                                                    <div class="panel-body">
                                                                        <div class="packages">

                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Features</label>
                                                                            <div class="funkyradio">
                                                                                @foreach($features as $feature)
                                                                                    <div class="funkyradio-primary">
                                                                                        <input type="checkbox" name="checkbox" id="checkbox{{$feature->id}}"/>
                                                                                        <label class="feature-add" data-id="{{$feature->id}}" for="checkbox{{$feature->id}}">
                                                                                            {{$feature->title}}<br>
                                                                                            {{$feature->price}}
                                                                                        </label>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>


                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">Selected Package/Features</div>
                                                                    <div class="panel-body">
                                                                        <label>Package</label>
                                                                        <div class="package">

                                                                        </div>
                                                                        <label>Features</label>
                                                                        <div class="feature">

                                                                        </div>
                                                                    <div class="panel-footer">
                                                                        Total Price = <span class="total-price">0.00</span><input type="hidden" name="total_price">
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="packageDetail" tabindex="-1" role="dialog" aria-labelledby="packageDetail" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <br>
                                                        <div class="form-group">
                                                            <label>Group</label>
                                                            @php $groups->prepend('Select Group','') @endphp
                                                            {!! Form::select('group_id', $groups, old('group_id'),['class'=>'form-control']) !!}<i></i>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                    {!! Form::close() !!}

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
                        $('.package').html('');

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

            $("body").on('click', '.package-add', function(){


                var package_id = $(this).data("id");

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


            $("body").on('click', '.feature-add', function(){


                var feature_id = $(this).data("id");

                if($('#checkbox'+feature_id).attr('checked')){
                    $(".checkbox"+feature_id).remove();
                    return true;
                }

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

                var feature_id = $(this).data("id");

                var type = $(this).data("type");
                if(type=='feature'){
                    $('#checkbox'+feature_id).attr('checked', false);
                }else{
                    $('#radio'+feature_id).attr('checked', false);
                }


                /*total price calculation*/
                var price =0;
                $('.price').each(function() {
                    var this_price = parseInt($(this).text());
                    price = this_price+price;
                });
                $(".total-price").text(number_format(price));
                $('[name="total_price"]').val(price);
            });

            $("body").on( "keyup mouseup", "[name='quantity[]']", function() {
                var quantity = $(this).val();
                var price = $(this).data('price');
                var total_price = quantity*price;

                $(this).next().text(total_price);

                /*total price calculation*/
                var price =0;
                $('.price').each(function() {
                    var this_price = parseInt($(this).text());
                    price = this_price+price;
                });
                $(".total-price").text(number_format(price));
                $('[name="total_price"]').val(price);


            });

            $("body").on( "click", ".package-detail", function() {

                var package_id = $(this).data('id');

                $('.modal-content').load('/package-modal',{package_id: package_id, _token: '{{csrf_token()}}'},function(){
                    $('#packageDetail').modal({show:true});
                });


            })


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