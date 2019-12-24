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
                                                    <h4 class="panel-title">Basic Information <a class="text-right" style="float: right" href="{{ url('myprofile-edit') }}">Edit</a></h4>
                                                </div>
                                                <div class="panel-collapse">
                                                    <div class="panel-body">
                                                        <table class="table table-hover">
                                                            <tbody>
                                                            <tr>
                                                                <th>Name</th>
                                                                <td>{{ Auth::user()->title.' '.Auth::user()->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Email</th>
                                                                <td>{{ Auth::user()->email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Phone</th>
                                                                <td>{{ Auth::user()->phone }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Mother Name</th>
                                                                <td>{{ Auth::user()->mother_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Father Name</th>
                                                                <td>{{ Auth::user()->father_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Spouse Name</th>
                                                                <td>{{ Auth::user()->spouse_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Nationality</th>
                                                                <td>{{ Auth::user()->nationality }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>National ID Card</th>
                                                                <td>{{ Auth::user()->national_id_card }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Date of Birth</th>
                                                                <td>{{ (Auth::user()->dob !='0000-00-00')?Auth::user()->dob:'' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Birth Place</th>
                                                                <td>{{ Auth::user()->birth_place }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Nominee</th>
                                                                <td>{{ Auth::user()->nominee }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Previous Year of Hajj</th>
                                                                <td>{{ (Auth::user()->previous_year_hajj)?Auth::user()->previous_year_hajj:'' }}</td>
                                                            </tr><tr>
                                                                <th>Image</th>
                                                                <td><a target="_blank" href="{{ Storage::url(Auth::user()->image) }}"><img src="{{ Storage::url(Auth::user()->image) }}" height="50" alt=""></a></td>
                                                            </tr>
                                                            <tr>
                                                                <th>National ID Card Photo</th>
                                                                <td><a target="_blank" href="{{ Storage::url(Auth::user()->national_id_photo) }}"><img src="{{ Storage::url(Auth::user()->national_id_photo) }}" height="50" alt=""></a></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Groupn Leader</th>
                                                                <td>{{ Auth::user()->is_group_leader }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Gender</th>
                                                                <td>{{ Auth::user()->gender }}</td>
                                                            </tr>
                                                            @if(Auth::user()->gender=='Female')
                                                                <tr>
                                                                    <th>Maharram</th>
                                                                    <td>{{ Auth::user()->maharram }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Maharram Relation</th>
                                                                    <td>{{ Auth::user()->maharram_relation }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Maharram Mobile No</th>
                                                                    <td>{{ Auth::user()->maharram_mobile_no }}</td>
                                                                </tr>
                                                            @endif

                                                            <tr>
                                                                <th>Present Address</th>
                                                                <td>{{ Auth::user()->present_address }}</td>
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
                                                                <td>{{ Auth::user()->per_post_office }}</td>
                                                            </tr><tr>
                                                                <th>Villege</th>
                                                                <td>{{ Auth::user()->per_villlege }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Profession</th>
                                                                <td>{{ Auth::user()->proffession }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Institute</th>
                                                                <td>{{ Auth::user()->institute }}</td>
                                                            </tr><tr>
                                                                <th>Educational Institute</th>
                                                                <td>{{ Auth::user()->educational_institute }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Passing Year</th>
                                                                <td>{{ (Auth::user()->passing_year)?Auth::user()->passing_year:'' }}</td>
                                                            </tr>

                                                            </tbody>
                                                        </table>


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


        })

    </script>



@endsection