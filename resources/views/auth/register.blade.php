@extends('layouts.app')

@section('content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ url('') }}">Home</a></li>
                <li class="active">Create new account</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SIDEBAR -->
                <div class="sidebar col-md-2 col-sm-2">

                </div>
                <!-- END SIDEBAR -->

                <!-- BEGIN CONTENT -->
                <div class="col-md-10 col-sm-10">
                    <h1>Create an account</h1>
                    <div class="content-form-page">
                        <div class="row">
                            <div class="col-md-8 col-sm-8">
                                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                    {{ csrf_field() }}
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="firstname" class="col-lg-4 control-label">Title</label>
                                            <div class="col-lg-8">
                                                <input type="text" placeholder="" value="{{ old('title') }}" name="title" class="form-control" id="firstname">
                                                <span class="help-block">Md/Mr.</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="lastname" class="col-lg-4 control-label">Name <span class="require">*</span></label>
                                            <div class="col-lg-8">
                                                <input type="text" value="{{ old('name') }}" placeholder="Enter Name" required name="name" class="form-control" id="lastname">
                                                <span class="text-warning">{{ $errors->first('name') }}  </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="lastname" class="col-lg-4 control-label">Phone <span class="require">*</span></label>
                                            <div class="col-lg-8">
                                                <input type="text" value="{{ old('phone') }}" placeholder="Enter Phone" required name="phone" class="form-control" id="lastname">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email"  class="col-lg-4 control-label">Email <span class="require">*</span></label>
                                            <div class="col-lg-8">
                                                <input type="email" value="{{ old('email') }}"  placeholder="Enter Email" required name="email" class="form-control" id="email">
                                                @if ($errors->has('email'))
                                                    <span class="text-warning">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-lg-4 control-label">Password <span class="require">*</span></label>
                                            <div class="col-lg-8">
                                                <input type="password" placeholder="Enter Password" required name="password" class="form-control" id="password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm-password" class="col-lg-4 control-label">Confirm password <span class="require">*</span></label>
                                            <div class="col-lg-8">
                                                <input type="password" placeholder="Enter Confirm Password Like Password" required class="form-control" name="password_confirmation" id="confirm-password">
                                            </div>
                                        </div>
                                    </fieldset>


                                    <div class="row">
                                        <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                                            <button type="submit" class="btn btn-primary">Create an account</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>
@endsection
