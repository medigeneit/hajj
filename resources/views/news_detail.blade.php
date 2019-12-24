@extends('layouts.app')

@section('content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ url('') }}">Home</a></li>
                <li>{{ $news_detail->title }}</li>
            </ul>

            <div class="row margin-bottom-40">
                <div class="col-md-9 col-sm-9">
                    <h3>{{ $news_detail->short_description }}</h3>
                    <img src="{{ $news_detail->image }}" alt="">
                    <br>
                    {!! $news_detail->description !!}
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