@extends('blog.layouts.index')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
<section class="tada-container content-posts blog-3-columns" style="background: #eff0f2">
    <h1 style="margin-left: 100px;font-weight: bold;font-style: italic;color: #9c8156;margin-bottom: 25px">
        {{$kind->title}}
    </h1>

    <!-- CONTENT COL 1 -->
    @foreach ($post as $value)
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-left: 10px;float: left;padding-right: 17px;">
        <article style="float: left;">
            <div style="float: left;">
                <img width="320px" height="150px" src="{{ asset('') }}upload/post/{{$value->image}}">
            </div>
            <span style="float: left;font-size: 22px;color: brown;margin-top: 10px;text-align: initial;height: 65px;">
                {{$value->title}}
            </span>                                
            <span style="float: left;text-align: initial;color: #999;height: 8em;">
                {!!$value->summary!!}
            </span>
        </article> 
    </div>
    @endforeach
    

    <div style="clear: both;float: left;width: 100%;height: 50px;"></div>
    <div style="clear: both;text-align: center">
        {{$post->links()}}
    </div>
    
    <!-- NAVIGATION -->
    {{-- <div class="navigation">
        <a href="#" class="prev"><i class="icon-arrow-left8"></i> Previous Posts</a>
        <a href="#" class="next">Next Posts <i class="icon-arrow-right8"></i></a>
        <div class="clearfix"></div>
    </div> --}}  


</section>

@endsection

@section('script')

@endsection