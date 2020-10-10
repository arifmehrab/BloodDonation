@extends('layouts.app')
@section('title', 'Blood | post-details')
@section('main_content')
<section class="page-header" data-stellar-background-ratio="1.2">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">


                <h3>
                    @if(Session::get('language') == 'english')
                    Post Details
                    @else
                    পোস্ট ডিটেলস 
                    @endif
                </h3>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->

<section class="section-content-block">

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-sm-12">

                <article class="post single-post-inner">

                    <div class="post-inner-featured-content">
                        <img alt="" src="images/blog_3.jpg">
                    </div>

                    <div class="single-post-inner-title">
                        <h2>{{ $postDetails->title }}</h2>
                        <p class="single-post-meta"><i class="fa fa-user"></i>&nbsp; {{ $postDetails->user->name }} &nbsp; &nbsp; <i class="fa fa-share"></i>&nbsp; 
                        </p>
                    </div>

                    <div class="single-post-inner-content">
                        <p>
                            {!! $postDetails->body !!}
                        </p>
                    </div>
                    <div class="single-post-inner-meta">
                        <div class="tag-list">
                            @foreach($catPost as $row)
                            <a href="{{ route('blood.category.post', $row->category_slug) }}">{{ $row->category_name}}</a>
                            @endforeach
                        </div>
                    </div>
                    <br>
                    <div>
                        <li><i class="fa fa-eye"></i>{{ $postDetails->view_count }}</li>
                    </div>

                </article> <!--  end single-post-container -->

                <div class="article-author clearfix">

                    <figure class="author-avatar">
                        <a href="#">
                            <img src="{{ asset('Frontend/assets/media/avator/'.$postDetails->user->profile) }}" alt="{{ $postDetails->user->profile }}">
                        </a>
                    </figure>
                    <div class="about_author">
                        <h4>Post by <a href="#">{{ $postDetails->user->name }}</a></h4>
                    </div>

                    <div class="social-icons margin-top-11 clearfix">
                        <!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                    </div>

                </div> <!-- end .article-author  -->

                <div class="comments-area" id="comments">
                    <a href="#respond" class="article-add-comments"><i class="fa fa-plus"></i></a>         
                    <div class="topic-bold-header clearfix">
                        <h4>comments</h4>
                        <div class="comments-area" id="comments">
                            <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="10" data-width=""></div>
                        </div> <!-- end comments-area-->
                    </div> <!-- end .topic-bold-header  -->

                </div> <!-- end comments-area-->

                <div class="related-post">

                    <div class="topic-bold-header clearfix">
                        <h4>Related Posts</h4>
                    </div> <!-- end .topic-bold-header  -->

                    <ul>
                        @foreach($related_post as $row)
                        <li><a href="{{ route('blood.post.view', $row->slug) }}">{{ $row->title }}</a></li>
                        @endforeach
                    </ul>

                </div> <!-- end .related-post  -->

            </div> <!--  end .single-post-container -->

            <div class="col-md-4 col-sm-12">

                <div class="widget site-sidebar">

                    <h2 class="widget-title">Search</h2>

                    <form action="{{ route('blood.post.search') }}" id="search-form" class="search-form" role="form" method="POST">
                        @csrf
                            <div class="input-group">
                                <input name="search" type="text" class="form-control" placeholder="Search....">
                                <span class="input-group-addon">
                                    <button style="background: #fe3c47; border: none;" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
    
                        </form> <!-- end #search-form  -->

                </div> <!--  end .widget -->            


                <div class="widget site-sidebar">

                    <h2 class="widget-title">Categories</h2>

                    <ul class="widget-post-category clearfix">
                        @foreach($categories as $row)
                        <li>
                            <a title="View all posts filed under Environment" href="{{ route('blood.category.post', $row->category_slug) }}">{{ $row->category_name }}</a>
                        </li>
                        @endforeach
                    </ul>


                </div> <!--  end .widget -->

                <div class="widget site-sidebar">

                    <h2 class="widget-title">Recent Posts</h2>
                    @foreach($latest_post as $row)
                    <div class="single-recent-post">
                        <a href="{{ route('blood.post.view', $row->slug) }}">{{ $row->title }}</a>
                        <span><i class="fa fa-calendar icon-color"></i>&nbsp; {{ $row->created_at->diffForHumans() }} | {{ date('d-m-Y', strtotime($row->created_at)) }}</span>
                    </div>
                    @endforeach

                </div> <!--  end .widget -->

            </div> <!-- end .col-sm-4  -->

        </div> <!--  end row  -->

    </div> <!--  end container -->

</section> <!-- end .section-content-block  -->
@endsection
@push('js')
<!-- fb comment plugin -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0" nonce="poEhO68F"></script>
<!-- Social share plugin -->
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2d8c43e543350013c372aa&product=powr-social-feed' async='async'></script>
@endpush