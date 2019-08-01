@extends('blog.layouts.index')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
<section class="tada-container content-posts">
    <div class="content col-xs-8">
        <!-- ARTICLE 1 -->
        <article>
            <div class="post-text" style="background: #eeeeee">
                @foreach ($category as $cate)
                    @if (count($cate->kind)>0)
                        <h2 style="float: left;width: 30%;clear:both">
                            <a href="#">{{$cate->title }}</a>
                        </h2>
                        @foreach ($cate->kind as $value)
                            <a style="float: left;margin-top: 18px;margin-left: 10px" href="{{ asset('') }}blog/kind/{{$value->id}}/{{$value->thumbnail}}.html"> 
                              
                                {{$value->title}}/           
                            </a>
                        @endforeach
                        <div style="width:100%;clear: both;float: left;height: 25px;"></div>
                        <div style="clear: both; margin-bottom: 300px">
                            <?php 
                                $data = $cate->Post->where('important',1)->sortByDesc('created_at')->take(5);
                                $post1 = $data->shiFt();
                            ?>
                            <img style="float: left; height: 200px" class="col-md-6 col-lg-6" src="{{ asset('') }}upload/post/{{$post1['image']}}">

                            <p style="float: left;" class="col-md-6 col-lg-6 text" >
                                <b style="width: 100%;float: left;font-size: 25px;text-align: initial;">
                                    <a href="#">
                                        {!!$post1['title']!!}
                                    </a>
                                </b>
                                {!!$post1['summary']!!}

                            </p>
                            <a style="clear:both;float: right;" class="btn btn-xs btn-info" href="{{ asset('') }}blog/post/{{$post1['id']}}/{{$post1['thumbnail']}}.html">
                                Xem thêm
                                <i class="icon-arrow-right2"></i>
                            </a>
                        </div>
                    @endif
                @endforeach

            </div>
            <div class="post-info">
                <div class="post-by">Post By <a href="#">AD-Theme</a></div>
                <div class="extra-info">
                    <a href="#"><i class="icon-facebook5"></i></a>
                    <a href="#"><i class="icon-twitter4"></i></a>
                    <a href="#"><i class="icon-google-plus"></i></a>
                    <span class="comments">25 <i class="icon-bubble2"></i></span>
                </div>
                <div class="clearfix"></div>
            </div>
        </article>          

        <div class="navigation">
            <a href="#" class="prev"><i class="icon-arrow-left8"></i> Previous Posts</a>
            <a href="#" class="next">Next Posts <i class="icon-arrow-right8"></i></a>
            <div class="clearfix"></div>
        </div>

    </div>
    <!-- SIDEBAR -->
    <div class="sidebar col-xs-4" style="background: #eeeeee;">
        <!-- LATEST POSTS --> 
        <div class="widget latest-posts">
            <h3 class="widget-title" style="background: #eeeeee30;">
                Tin Khác
            </h3>
            <div class="posts-container" style="background: #eeeeee30;">
                @foreach ($category as $cate)
                @if (count($cate->kind)>0)
                <?php
                $data = $cate->Post->where('important',1)->sortByDesc('created_at')->take(5);
                ?>
                @foreach ($data->all() as $post)
                <a href="{{ asset('') }}blog/post/{{$post['id']}}/{{$post['thumbnail']}}.html"" style="margin-top: 15px;float: left;width: 100%;">
                    <div class="item" style="text-transform: none">
                        <i class="icon-arrow-right2"></i>  
                        {{$post['title']}}
                    </div> 
                </a>
                @endforeach
                @endif
                @endforeach

                <div class="clearfix"></div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>           
    <!-- ADVERTISING -->                              
    <div class="widget advertising">
        <div class="advertising-container">
            <img src="{{ asset('blog_assets/img/350x300.png') }}" alt="banner 350x300">
        </div>
    </div>                 
</div>
</section>
@endsection

@section('script')

@endsection