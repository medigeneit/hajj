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
                                                    <h4 class="panel-title">Group <a class="text-right" style="float: right" href="{{ url('group-create') }}">Add</a></h4>
                                                </div>
                                                <div class="panel-collapse">
                                                    @if($groups->count())
                                                        <table class="table table-hover">
                                                            <tr>
                                                                <th>Group Name</th>
                                                                <th>Year</th>
                                                                <th>Type</th>
                                                                <th>Status</th>
                                                            </tr>
                                                            @foreach($groups as $row)
                                                                <tr>
                                                                    <td><a href="{{ url('group-edit/'.$row->id) }}">{{ $row->title }}</a></td>
                                                                    <td>{{ $row->year }}</td>
                                                                    <td>{{ $row->type }}</td>
                                                                    <td>{{ $row->status }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    @else
                                                       No Group Created <a class="text-right" style="float: right" href="{{ url('group-create') }}">Add</a>
                                                    @endif
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
                    }
                });
            })


        })

    </script>



@endsection