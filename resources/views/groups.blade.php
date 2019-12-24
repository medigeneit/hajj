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
                                    <div class="col-md-12">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>Group Name</th>
                                                <th>Group Leader</th>
                                                <th>Address</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Image</th>
                                            </tr>
                                            <tr>
                                                <td>Al Amin Hajj group</td>
                                                <td>Md Al Amin Khan</td>
                                                <td>Chordunail, Borodunail,Shahjadpur, Sirajgonj</td>
                                                <td>alamin@gmail.com</td>
                                                <td>017873468567</td>
                                                <td><a target="_blank" href="http://localhost:8181/storage/images/cjbkigxPK7Jyd9s576IsgvrMTPSnUzAblKCcANnd.png"><img src="http://localhost:8181/storage/images/cjbkigxPK7Jyd9s576IsgvrMTPSnUzAblKCcANnd.png" height="50" alt=""></a></td>
                                            </tr>
                                        </table>
                                    </div>



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