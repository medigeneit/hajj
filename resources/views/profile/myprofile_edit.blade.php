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
                                                    <h4 class="panel-title">
                                                            Basic Information
                                                    </h4>
                                                </div>
                                                <div class="panel-collapse">
                                                    {!! Form::open(['url'=>'myprofile-update','files'=>true]) !!}
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="contacts-name">Title</label>
                                                                    <input type="text" name="title" value="{{ Auth::user()->title }}"  class="form-control" id="contacts-name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="contacts-name">Name</label>
                                                                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" id="contacts-name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="contacts-name">Email</label>
                                                                    <input type="text" name="email" value="{{ Auth::user()->email }}"  class="form-control" id="contacts-name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="contacts-name">Phone</label>
                                                                    <input type="text" required name="phone" value="{{ Auth::user()->phone }}"  class="form-control" id="contacts-name">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="contacts-name">Father Name</label>
                                                                    <input type="text" name="father_name" value="{{ Auth::user()->father_name }}" required  class="form-control" id="contacts-name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="contacts-name">Mother Name</label>
                                                                    <input type="text" name="mother_name" value="{{ Auth::user()->mother_name }}"  required class="form-control" id="contacts-name">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="contacts-name">Spouse Name</label>
                                                                    <input type="text" name="spouse_name" value="{{ Auth::user()->spouse_name }}" required  class="form-control" id="contacts-name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="contacts-name">Nationality</label>
                                                                    <input type="text" name="nationality" value="{{ Auth::user()->nationality }}" required  class="form-control" id="contacts-name">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="contacts-name">National ID Card</label>
                                                                    <input type="text" name="national_id_card" value="{{ Auth::user()->national_id_card }}" required  class="form-control" id="contacts-name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="contacts-name">Date of Birth</label>
                                                                    <input type="text" name="dob" autocomplete="off" value="{{ Auth::user()->dob }}" required class="form-control input-append date" id="datepicker">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="contacts-name">Birth Place</label>
                                                                    <input type="text"  name="birth_place" value="{{ Auth::user()->birth_place }}"  class="form-control" id="contacts-name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="contacts-name">Nominee</label>
                                                                    <input type="text" name="nominee" value="{{ Auth::user()->nominee }}"  class="form-control" id="contacts-name">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="contacts-name">Previous Year of Hajj</label>
                                                                    <select name="previous_year_hajj" class="form-control">
                                                                        <option value="">Select Year</option>
                                                                        @for($i=2000;$i<=2018;$i++)
                                                                        <option {{ (Auth::user()->previous_year_hajj==$i)?'selected':'' }} value="{{ $i }}">{{ $i }}</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label for="contacts-name">Image</label>
                                                                            <input type="file" name="image">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <a target="_blank" href="{{ Storage::url(Auth::user()->image) }}"><img src="{{ Storage::url(Auth::user()->image) }}" height="50" alt=""></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="contacts-name"> গ্রুপ লিডার হতে ইচ্ছুক?  </label><br>
                                                                    <label class=""><input type="radio" required {{ (Auth::user()->is_group_leader=='হ্যাঁ')?'checked':'' }} value="হ্যাঁ" name="is_group_leader">হ্যাঁ</label>
                                                                    <label class=""><input type="radio" required {{ (Auth::user()->is_group_leader=='না')?'checked':'' }} value="না" name="is_group_leader">না</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label for="contacts-name">National ID Card Photo</label>
                                                                            <input type="file" name="national_id_photo">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <a target="_blank" href="{{ Storage::url(Auth::user()->national_id_photo) }}"><img src="{{ Storage::url(Auth::user()->national_id_photo) }}" height="50" alt=""></a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="contacts-name">Gender</label>
                                                            <select name="gender" class="form-control">
                                                                <option value="">Select Gender</option>
                                                                <option {{ (Auth::user()->gender=='Male')?'selected':'' }} required value="Male">Male</option>
                                                                <option {{ (Auth::user()->gender=='Female')?'selected':'' }} required value="Female">Female</option>
                                                            </select>
                                                        </div>



                                                        <fieldset class="maharram-info{{ (Auth::user()->gender=='Male')?' maharram-none':'' }}">
                                                            <legend>Maharram Info</legend>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="contacts-name">Maharram</label>
                                                                        <input type="text" name="maharram" required value="{{ Auth::user()->maharram }}"  class="form-control" id="contacts-name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="contacts-name">Maharram Relation</label>
                                                                        <input type="text" required name="maharram_relation" value="{{ Auth::user()->maharram_relation }}"  class="form-control" id="contacts-name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="contacts-name">Maharram Mobile No</label>
                                                                        <input type="text" required name="maharram_mobile_no" value="{{ Auth::user()->maharram_mobile_no }}"  class="form-control" id="contacts-name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>

                                                        <fieldset>
                                                            <legend>Address</legend>

                                                            <div class="form-group">
                                                                <label for="contacts-name">Present Address</label>
                                                                <input type="text" name="present_address" value="{{ Auth::user()->present_address }}"  class="form-control" id="contacts-name">
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="contacts-name">Division</label>
                                                                        <div class="divisions-list">
                                                                            @php $divisions->prepend('বিভাগ নির্বাচন করুন','')  @endphp
                                                                            {!! Form::select('division_id', $divisions, Auth::user()->division_id,['class'=>'form-control','required'=>'required']) !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="contacts-name">Post Office</label>
                                                                        <input type="text" required name="per_post_office" value="{{ Auth::user()->per_post_office }}"  class="form-control" id="contacts-name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="contacts-name">District</label>
                                                                        <div class="districts-list">
                                                                            @php $districts->prepend('জেলা নির্বাচন করুন','')  @endphp
                                                                            {!! Form::select('district_id', $districts, Auth::user()->district_id,['class'=>'form-control','required'=>'required']) !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="contacts-name">Villege</label>
                                                                        <input type="text" name="per_villlege" required value="{{ Auth::user()->per_villlege }}"  class="form-control" id="contacts-name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="contacts-name">Thana</label>
                                                                        <div class="upzilla-list">
                                                                            @php $upazilas->prepend('উপজেলা নির্বাচন করুন','')  @endphp
                                                                            {!! Form::select('upzilla_id', $upazilas, Auth::user()->upzilla_id,['class'=>'form-control','required'=>'required']) !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>


                                                        <fieldset>
                                                            <legend>Profession And Educational Info</legend>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="contacts-name">Profession</label>
                                                                        <input type="text" required name="proffession" value="{{ Auth::user()->proffession }}"  class="form-control" id="contacts-name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="contacts-name">Institute</label>
                                                                        <input type="text" name="institute" value="{{ Auth::user()->institute }}"  class="form-control" id="contacts-name">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="row">

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="contacts-name">Educational Institute</label>
                                                                        <input type="text" name="educational_institute" value="{{ Auth::user()->educational_institute }}"  class="form-control" id="contacts-name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="contacts-name">Passing Year</label>
                                                                        <select name="passing_year" class="form-control">
                                                                            <option value="">Select Year</option>
                                                                            @for($i=2000;$i<=2018;$i++)
                                                                                <option {{ (Auth::user()->passing_year==$i)?'selected':'' }} value="{{ $i }}">{{ $i }}</option>
                                                                            @endfor
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </fieldset>


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

            $('#datepicker').datepicker({
                    format: 'yyyy-mm-dd',
                    startDate: '1900-01-01',
                    endDate: '2020-12-30',
                })

            var var_gender = "{{Auth::user()->gender}}";

            if(var_gender=='Female'){
                $('.maharram-info').show('slow');
                $('.maharram-info input').attr('required','required');
            }else{
                $('.maharram-info').hide('slow');
                $('.maharram-info input').removeAttr('required');
            }

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