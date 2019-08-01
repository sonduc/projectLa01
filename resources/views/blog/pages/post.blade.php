@extends('blog.layouts.index')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
<section class="tada-container content-posts post sidebar-right">


    <!-- CONTENT -->
    <div class="content col-xs-8">


        <!-- ARTICLE 1 -->    
        <article>
            <div class="post-image">
                <img width="708px" height="365px" src="{{ asset('') }}upload/post/{{$post->image}}"> 
            </div>
            <div class="post-text">
                <span class="date">{{$post->created_at}}</span>
                <h2>
                    {!!$post->title!!}
                </h2>
            </div>                 
            <div class="post-text text-content" style="padding-bottom: 0px">                  
                <div class="text">
                    <p>
                      {!!$post->content!!}              
                  </p>                    

                  <div class="clearfix"></div>
              </div>
          </div>

          <!-- COMMENTS -->    

          <div class="comments" style="padding-top: 0px;padding-left: 0">
            @foreach ($post->comment as $value)
            <div class="comments-list" style="border: 1px solid #ccc;">

                <div class="main-comment">
                    <div class="comment-info">
                        <div class="comment-name-date">
                            <span class="comment-name">{{$value->User->name}}</span>
                            <div class="clearfix">                                
                            </div>
                        </div>
                        <span class="comment-description">
                            {!!$value->content!!}
                        </div>
                        <div class="clearfix"></div>
                    </div>          
                </div>
                @endforeach
            </div>                                  


            <!-- COMMENT FORM -->
            @if (Auth::check())
            <div class="comment-form" style="padding-top: 0px;padding-left: 0">
                <h3 style="float: left;width: 100%;padding-bottom: 0">COMMENT</h3>
                <form action="{{ asset('') }}comment/{{$post->id}}" method="POST">
                   {{csrf_field()}}

                   {{-- <div style="float: left;width: 100%;margin-top: 0"> --}}
                    <div style="float: left;width:10%;height: 50px;background: gray">
                        <img src="">
                    </div>
                    <div style="float: left;width:90%;height: 50px;background: black">
                        <input style="width: 100%;height: 100%;margin-top: 0;border-radius: 0" type="text" name="content" placeholder="comment...">
                    </div>
                </div>            
                <button class="btn btn-xs" style="margin-top: 3px;" type="submit">Send Comment</button>
            </form>                
        </div> 
        @endif

    </article>
</div>


<!-- SIDEBAR -->
<div class="sidebar col-xs-4">

    <!-- LATEST POSTS -->                              
    <div class="widget latest-posts">
        <h3 class="widget-title">
            Tin khác
        </h3>
        <div class="posts-container">
            @foreach ($post_type as $value)
            <div class="item">
                <img src="{{ asset('') }}upload/post/{{$value->image}}" width="100px" class="post-image">
                <div class="info-post">
                    <a style="color:#9c8156" href="">{!!$value->title!!}</a>
                </div> 
                <div class="clearfix"></div>   
            </div>
            @endforeach


            <div class="clearfix"></div>
        </div>
    </div>  

</div> <!-- #SIDEBAR -->

<div class="clearfix"></div>


</section>
@endsection

@section('script')

@endsection