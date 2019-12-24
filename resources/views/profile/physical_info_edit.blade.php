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
                                                            Physical Information
                                                    </h4>
                                                </div>
                                                <div class="panel-collapse">
                                                    {!! Form::open(['url'=>'physical-info-update','files'=>true]) !!}
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label for="contacts-name">আপনার জটিল রোগ থাকলে বিস্তারিত লিখুন </label>
                                                            <input type="text" name="strong_disease" value="{{ $physical_info->strong_disease }}"  class="form-control" id="contacts-name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="contacts-name"> রক্ত চাপের অবস্থা লিখুন  </label>
                                                            <input type="text" name="blood_pressure" required value="{{ $physical_info->blood_pressure }}"  class="form-control" id="contacts-name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="contacts-name"> রক্তের গ্রুপ  </label>
                                                            <select name="blood_group" required class="form-control" id="sel1">
                                                                <option value="">রক্তের গ্রুপ নির্বাচন করুন</option>
                                                                <option {{ ($physical_info->blood_group=='O+')?'selected':'' }} value="O+">O+</option>
                                                                <option {{ ($physical_info->blood_group=='O-')?'selected':'' }} value="O-">O-</option>
                                                                <option {{ ($physical_info->blood_group=='A+')?'selected':'' }} value="A+">A+</option>
                                                                <option {{ ($physical_info->blood_group=='A-')?'selected':'' }} value="A-">A-</option>
                                                                <option {{ ($physical_info->blood_group=='B+')?'selected':'' }} value="B+">B+</option>
                                                                <option {{ ($physical_info->blood_group=='B-')?'selected':'' }} value="B-">B-</option>
                                                                <option {{ ($physical_info->blood_group=='AB+')?'selected':'' }} value="AB+">AB+</option>
                                                                <option {{ ($physical_info->blood_group=='AB-')?'selected':'' }} value="AB-">AB-</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="contacts-name"> ডায়াবেটিস এর অবস্থা লিখুন  </label>
                                                            <input type="text" name="diabetes" required value="{{ $physical_info->diabetes }}"  class="form-control" id="contacts-name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="contacts-name"> খাবারে  মৌলিক সমস্যা থাকলে লিখুন </label>
                                                            <input type="text" required name="food_problem" value="{{ $physical_info->food_problem }}"  class="form-control" id="contacts-name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="contacts-name"> হাঁটা-চলায় সমস্যা থাকলে লিখুন  </label>
                                                            <input type="text" required name="walking_problem" value="{{ $physical_info->walking_problem }}"  class="form-control" id="contacts-name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="contacts-name">  ইংলিশ কমোড ব্যবহার করেছেন?  </label><br>
                                                            <label class=""><input type="radio" required {{ ($physical_info->is_use_english_commode=='হ্যাঁ')?'checked':'' }} value="হ্যাঁ" name="is_use_english_commode">হ্যাঁ</label>
                                                            <label class=""><input type="radio" {{ ($physical_info->is_use_english_commode=='না')?'checked':'' }} value="না" name="is_use_english_commode">না</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="contacts-name"> দেখে-দেখে কুরআন পরতে পারেন?  </label><br>
                                                            <label class=""><input type="radio" required {{ ($physical_info->is_reading_quran=='হ্যাঁ')?'checked':'' }} value="হ্যাঁ" name="is_reading_quran">হ্যাঁ</label>
                                                            <label class=""><input type="radio" required {{ ($physical_info->is_reading_quran=='না')?'checked':'' }} value="না" name="is_reading_quran">না</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="contacts-name"> সহীহভাবে কুরআন পরতে পারেন?  </label><br>
                                                            <label class=""><input type="radio" required {{ ($physical_info->is_read_quran_sahih=='হ্যাঁ')?'checked':'' }} value="হ্যাঁ" name="is_read_quran_sahih">হ্যাঁ</label>
                                                            <label class=""><input type="radio" required {{ ($physical_info->is_read_quran_sahih=='না')?'checked':'' }} value="না" name="is_read_quran_sahih">না</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="contacts-name"> সালাতের সূরা ও তাজবীহ সহীহভাবে পড়তে পারেন?  </label><br>
                                                            <label class=""><input type="radio" required {{ ($physical_info->is_salat_sahih_reading=='হ্যাঁ')?'checked':'' }} value="হ্যাঁ" name="is_salat_sahih_reading">হ্যাঁ</label>
                                                            <label class=""><input type="radio" required {{ ($physical_info->is_salat_sahih_reading=='না')?'checked':'' }} value="না" name="is_salat_sahih_reading">না</label>
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

// countdown



            jQuery(function(){
                $('#ic-countdown').simplyCountdown({
                    year: '@php echo date('Y',strtotime(settings('countdown_ending_date', $settings))) @endphp',
                    month: '@php echo date('n',strtotime(settings('countdown_ending_date', $settings))) @endphp',
                    day: '@php echo date('j',strtotime(settings('countdown_ending_date', $settings) )) @endphp',
                    hours: '@php echo date('G',strtotime(settings('countdown_ending_time', $settings))) @endphp',
                    minutes: '@php echo date('i',strtotime(settings('countdown_ending_time', $settings))) @endphp'
                    // enableUtc: false
                });
            });
        })

    </script>



@endsection