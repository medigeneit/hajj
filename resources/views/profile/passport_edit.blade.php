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
                                                    <h4 class="panel-title">Passport</h4>
                                                </div>
                                                <div class="panel-collapse">
                                                    {!! Form::open(['url'=>'passport-update','files'=>true]) !!}
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label for="contacts-name">Passport No</label>
                                                            <input type="text" name="passport_no" value="{{ $passport->passport_no }}"  class="form-control" id="contacts-name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="contacts-name">Issue Date</label>
                                                            <input type="text" name="issue_date" value="{{ $passport->issue_date }}"  class="form-control input-append date" id="datepicker1">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="contacts-name">Expire Date</label>
                                                            <input type="text" name="expired_date" value="{{ $passport->expired_date }}"  class="form-control input-append date" id="datepicker2">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="contacts-name">Issue Place</label>
                                                            <input type="text" name="issue_place" value="{{ $passport->issue_place }}"  class="form-control">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="contacts-name">Passport Type</label>
                                                            <select name="passport_type" required class="form-control">
                                                                <option value="">Select Passport Type</option>
                                                                <option {{ ($passport->passport_type=='Ordinary international passport')?'selected':'' }} value="Ordinary international passport">Ordinary international passport</option>
                                                                <option {{ ($passport->passport_type=='Official passport')?'selected':'' }} value="Official passport">Official passport</option>
                                                                <option {{ ($passport->passport_type=='Diplomatic passport')?'selected':'' }} value="Diplomatic passport">Diplomatic passport</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="contacts-name">Passport Photo</label>
                                                                    <input type="file" name="passport_photo">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <a target="_blank" href="{{ Storage::url($passport->passport_photo) }}"><img src="{{ Storage::url($passport->passport_photo) }}" height="50" alt=""></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="contacts-name">  আপনার পাসপোর্ট জমা দিয়েছেন কি? </label><br>
                                                            <label class=""><input type="radio" {{ ($passport->is_submit_passport=='হ্যাঁ')?'checked':'' }} value="হ্যাঁ" name="is_submit_passport">হ্যাঁ</label>
                                                            <label class=""><input type="radio" {{ ($passport->is_submit_passport=='না')?'checked':'' }} value="না" name="is_submit_passport">না</label>
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

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>


    <script type="text/javascript">

        $(document).ready(function() {

            $('#datepicker1').datepicker({
                format: 'yyyy-mm-dd',
                startDate: '1900-01-01',
                endDate: '2020-12-30',
            })

            $('#datepicker2').datepicker({
                format: 'yyyy-mm-dd',
                startDate: '1900-01-01',
                endDate: '2020-12-30',
            })

            $('#datepicker3').datepicker({
                format: 'yyyy-mm-dd',
                startDate: '1900-01-01',
                endDate: '2020-12-30',
            })

            $('[name="gender"]').on('change', function() {
                var gender = $(this).val();

                if(gender=='Male'){
                    $('.maharram-info').hide('slow');
                    $('.maharram-info input').removeAttr('required');
                }else{
                    $('.maharram-info').show('slow');
                    $('.maharram-info input').attr('required','required');
                }
            })

            $('[name="division_id"]').on('change', function() {
                var division_id = $(this).val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: '/division-district',
                    dataType: 'HTML',
                    data: {division_id: division_id},
                    success: function( msg ) {
                        $('.districts-list').html(msg);
                    }
                });
            })


            $("body").on( "change", "[name='district_id']", function() {
                var district_id = $(this).val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: '/district-upzilla',
                    dataType: 'HTML',
                    data: {district_id: district_id},
                    success: function( msg ) {
                        $('.upzilla-list').html(msg);
                    }
                });
            })
        })

    </script>



@endsection