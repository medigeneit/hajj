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
                    <li>Home</li><li>Edit Features</li>
                </ol>
        </div>

        <div id="content">
            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                    <h1 class="page-title txt-color-blueDark">
                        <i class="fa fa-edit fa-fw "></i>
                        Edit Features
                    </h1>
                </div>
            </div>

            @if(Session::has('message'))
                <div class="allert-message alert-success-message pgray  alert-lg" role="alert">
                    <p class=""> {{ Session::get('message') }}</p>
                </div>
            @endif


            <!-- widget grid -->
            <section id="widget-grid" class="">

                    <article class="">
                        <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
                            <header>
                                <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                                <h2>Edit Features </h2>
                            </header>
                            <div>
                                <div class="widget-body">
                                    {!! Form::open(['action'=>['Admin\FeaturesController@update',$features->id],'method'=>'PUT','files'=>true]) !!}
                                    <div class="row">
                                        <div class="col-md-8">

                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control" value="{{$features->title}}" required name="title">
                                            </div>

                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="text" class="form-control" value="{{$features->price}}" required name="price">
                                            </div>



                                            <div class="form-group">
                                                <label>Status</label>
                                                {!! Form::select('status', ['Active' => 'Active','InActive' => 'InActive'], $features->status,['class'=>'form-control']) !!}<i></i>
                                            </div>


                                        </div>




                                    </div>
                                        <footer>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <a  class="btn btn-default" href="{{url('admin/features')}}">Back</a>
                                        </footer>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </article>

            </section>



        </div>


    </div>
@endsection

@section('js')



    <script type="text/javascript">


        $(document).ready(function() {


        })

    </script>

@endsection