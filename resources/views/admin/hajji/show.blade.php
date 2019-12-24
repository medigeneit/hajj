@extends('admin.layouts.app')

@section('content')

    <div id="main" role="main">
        <div id="ribbon">
				<span class="ribbon-button-alignment">
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"></i>
					</span>
				</span>
            <ol class="breadcrumb">
                <li>Home</li><li>Hajji Detail</li>
            </ol>
        </div>

        <div id="content">



            @if(Session::has('message'))
                <div class="allert-message alert-success-message pgray  alert-lg" role="alert">
                    <p class=""> {{ Session::get('message') }}</p>
                </div>
            @endif


        <!-- widget grid -->
            <section id="widget-grid" class="">

                <article class="sortable-grid ui-sortable">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false" role="widget">

                        <header>
                            <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                            <h2>Hajji Detail</h2>
                        </header>

                        <!-- widget div-->
                        <div role="content">

                            <!-- widget edit box -->
                            <div class="jarviswidget-editbox">
                                <!-- This area used as dropdown edit box -->

                            </div>
                            <!-- end widget edit box -->

                            <!-- widget content -->
                            <div class="widget-body no-padding">

                                <div class="panel-group smart-accordion-default" id="accordion-2">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-2" href="#collapseOne-1" aria-expanded="true" class=""> <i class="fa fa-fw fa-plus-circle txt-color-green"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i> Basic Information </a></h4>
                                        </div>
                                        <div id="collapseOne-1" class="panel-collapse collapse in" aria-expanded="true" style="">
                                            <table class="table table-hover">
                                                <tbody>
                                                <tr>
                                                    <th>Name</th>
                                                    <td>{{ $user->title.' '.$user->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>{{ $user->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Phone</th>
                                                    <td>{{ $user->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Mother Name</th>
                                                    <td>{{ $user->mother_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Father Name</th>
                                                    <td>{{ $user->father_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Spouse Name</th>
                                                    <td>{{ $user->spouse_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nationality</th>
                                                    <td>{{ $user->nationality }}</td>
                                                </tr>
                                                <tr>
                                                    <th>National ID Card</th>
                                                    <td>{{ $user->national_id_card }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Date of Birth</th>
                                                    <td>{{ ($user->dob !='0000-00-00')?$user->dob:'' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Birth Place</th>
                                                    <td>{{ $user->birth_place }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nominee</th>
                                                    <td>{{ $user->nominee }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Previous Year of Hajj</th>
                                                    <td>{{ ($user->previous_year_hajj)?$user->previous_year_hajj:'' }}</td>
                                                </tr><tr>
                                                    <th>Image</th>
                                                    <td><a target="_blank" href="{{ Storage::url($user->image) }}"><img src="{{ Storage::url($user->image) }}" height="50" alt=""></a></td>
                                                </tr>
                                                <tr>
                                                    <th>National ID Card Photo</th>
                                                    <td><a target="_blank" href="{{ Storage::url($user->national_id_photo) }}"><img src="{{ Storage::url($user->national_id_photo) }}" height="50" alt=""></a></td>
                                                </tr>
                                                <tr>
                                                    <th>Groupn Leader</th>
                                                    <td>{{ $user->is_group_leader }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Gender</th>
                                                    <td>{{ $user->gender }}</td>
                                                </tr>
                                                @if($user->gender=='Female')
                                                    <tr>
                                                        <th>Maharram</th>
                                                        <td>{{ $user->maharram }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Maharram Relation</th>
                                                        <td>{{ $user->maharram_relation }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Maharram Mobile No</th>
                                                        <td>{{ $user->maharram_mobile_no }}</td>
                                                    </tr>
                                                @endif

                                                <tr>
                                                    <th>Present Address</th>
                                                    <td>{{ $user->present_address }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Division</th>
                                                    <td>{{ $add['division'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>District</th>
                                                    <td>{{ $add['district'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Upazilla</th>
                                                    <td>{{ $add['upazila'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Post Office</th>
                                                    <td>{{ $user->per_post_office }}</td>
                                                </tr><tr>
                                                    <th>Villege</th>
                                                    <td>{{ $user->per_villlege }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Profession</th>
                                                    <td>{{ $user->proffession }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Institute</th>
                                                    <td>{{ $user->institute }}</td>
                                                </tr><tr>
                                                    <th>Educational Institute</th>
                                                    <td>{{ $user->educational_institute }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Passing Year</th>
                                                    <td>{{ ($user->passing_year)?$user->passing_year:'' }}</td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-2" href="#collapseTwo-1" class="collapsed" aria-expanded="false"> <i class="fa fa-fw fa-plus-circle txt-color-green"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i> Phisical Information</a></h4>
                                        </div>
                                        <div id="collapseTwo-1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <table class="table table-hover">
                                                    <tbody>
                                                    <tr>
                                                        <th>আপনার জটিল রোগ</th>
                                                        <td>{{ $physical_info->strong_disease or '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>রক্ত চাপের অবস্থা</th>
                                                        <td>{{ $physical_info->blood_pressure or '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>রক্তের গ্রুপ</th>
                                                        <td>{{ $physical_info->blood_group or '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>ডায়াবেটিস এর অবস্থা</th>
                                                        <td>{{ $physical_info->diabetes or '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>খাবারে মৌলিক সমস্যা</th>
                                                        <td>{{ $physical_info->food_problem or '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>হাঁটা-চলায় সমস্যা</th>
                                                        <td>{{ $physical_info->walking_problem or '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>ইংলিশ কমোড ব্যবহার করেছেন?</th>
                                                        <td>{{ $physical_info->is_use_english_commode or '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>দেখে-দেখে কুরআন পরতে পারেন?</th>
                                                        <td>{{ $physical_info->is_reading_quran or '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>সহীহভাবে কুরআন পরতে পারেন?</th>
                                                        <td>{{ $physical_info->is_read_quran_sahih or '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>সালাতের সূরা ও তাজবীহ সহীহভাবে পড়তে পারেন?</th>
                                                        <td>{{ $physical_info->is_salat_sahih_reading or '' }}</td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-2" href="#collapseThree-1" class="collapsed" aria-expanded="false"> <i class="fa fa-fw fa-plus-circle txt-color-green"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i> Passport </a></h4>
                                        </div>
                                        <div id="collapseThree-1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <table class="table table-hover">
                                                    <tbody>
                                                    <tr>
                                                        <th>Passport No</th>
                                                        <td>{{ $passport_info->passport_no or '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Issue Date</th>
                                                        <td>{{ $passport_info->issue_date or '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Expire Date</th>
                                                        <td>{{ $passport_info->expired_date or '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Issue Place</th>
                                                        <td>{{ $passport_info->issue_place or '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Passport Photo</th>
                                                        @if(isset($passport_info->passport_photo))
                                                        <td><a target="_blank" href="{{ Storage::url($passport_info->passport_photo) }}"><img src="{{ Storage::url($passport_info->passport_photo) }}" height="50" alt=""></a></td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <th>Passport Type</th>
                                                        <td>{{ $passport_info->passport_type or '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Pussport Submit</th>
                                                        <td>{{ $passport_info->is_submit_passport or '' }}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-2" href="#collapseFour-4" class="collapsed" aria-expanded="false"> <i class="fa fa-fw fa-plus-circle txt-color-green"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i>Payments  </a></h4>
                                        </div>
                                        <div id="collapseFour-4" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <table class="table table-hover">
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Transaction ID</th>
                                                        <th>Amount</th>
                                                        <th>Transaction Type</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    @foreach($payments as $payment)
                                                        <tr>
                                                            <td>{{ $payment->date }}</td>
                                                            <td>{{ $payment->transaction_id }}</td>
                                                            <td>{{ $payment->amount }}</td>
                                                            <td>{{ $payment->transaction_type }}</td>
                                                            <td>{{ $payment->status }}</td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-2" href="#collapseFive-5" class="collapsed" aria-expanded="false"> <i class="fa fa-fw fa-plus-circle txt-color-green"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i> Hajj/Umrah </a></h4>
                                        </div>
                                        <div id="collapseFive-5" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <table class="table table-hover">
                                                    <tr>
                                                        <th>Year</th>
                                                        <th>type</th>
                                                        <th>Package</th>
                                                        <th>Group</th>
                                                        <th>Price</th>
                                                        <th>Status</th>
                                                        <th>View</th>
                                                    </tr>
                                                    @foreach($hajj as $row)
                                                        <tr>
                                                            <td>{{ $row->year }}</td>
                                                            <td>{{ $row->type }}</td>
                                                            <td>{{ $row->package }}</td>
                                                            <td>{{ $row->group }}</td>
                                                            <td>{{ $row->total_price }}</td>
                                                            <td>{{ $row->status }}</td>
                                                            <td><a href="{{ url('hajj-detail/'.$row->id) }}">Detail</a></td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-2" href="#collapseSix-6" class="collapsed" aria-expanded="false"> <i class="fa fa-fw fa-plus-circle txt-color-green"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i> Groups </a></h4>
                                        </div>
                                        <div id="collapseSix-6" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">

                                            </div>
                                        </div>
                                    </div>





                                </div>

                            </div>
                            <!-- end widget content -->

                        </div>
                        <!-- end widget div -->

                    </div>
                    <!-- end widget -->

                </article>



            </section>



        </div>


    </div>
@endsection

@section('js')

    <script src="{{ asset('js/libs/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/plugin/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function() {


            $(function () {

                $(".datepicker").datepicker({
                    changeMonth: true,
                    numberOfMonths: 1,
                    prevText: '<i class="fa fa-chevron-left"></i>',
                    nextText: '<i class="fa fa-chevron-right"></i>',
                    dateFormat: 'yy-mm-dd',
                });

            })
        })

    </script>

@endsection




