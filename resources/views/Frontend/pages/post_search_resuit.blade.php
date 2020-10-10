@extends('layouts.app')
@section('title', 'Blood | posts')
@section('main_content')
<section class="page-header" data-stellar-background-ratio="1.2">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">


                <h3>
                    Search By:- #{{ $searchValue }}
                </h3>

                <br>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->

<!--  MAIN CONTENT  -->

<section class="main-content">

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-sm-12">
                @if($searchResuit->count() > 0)
                @foreach($searchResuit as $row)
                <article class="post single-post">

                    <div class="single-post-content">

                        <a title="" href="#">
                            <img alt="{{ $row->image }}" src="{{ asset('Backend/assets/media/posts/'.$row->image) }}" />
                        </a>

                    </div> <!-- end .bd-view  -->

                    <div class="single-post-title">

                        <h2>
                            <a href="{{ route('blood.post.view', $row->slug) }}">
                                {{ $row->title }}
                            </a>
                        </h2> <!--  end blog-post-title  -->

                        <p class="single-post-meta">                           

                            <i class="fa fa-user"></i>
                            &nbsp; {{ $row->user->name }}

                            &nbsp;<i class="fa fa-book"></i>
                            &nbsp;<a title="View all posts" href="#"> Relation </a>

                            &nbsp;<i class="fa fa-calendar"></i>
                            &nbsp; {{ $row->created_at->diffForHumans() }} | {{ date('d-m-Y', strtotime($row->created_at)) }}

                        </p>

                        <p>
                           {!!  Illuminate\Support\Str::words($row->body, 70, ' .....') !!}
                        </p>


                    </div> <!-- end col-sm-8  -->

                </article>
                @endforeach
                @else
                <h3 class="text-danger text-center">
                    This Keyword Post Not Found:)
                </h3>
                @endif
            </div> <!--  end col-sm-8 -->


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
                    @foreach($related_post as $row)
                    <div class="single-recent-post">
                        <a href="{{ route('blood.post.view', $row->slug) }}">{{ $row->title }}</a>
                        <span><i class="fa fa-calendar icon-color"></i>&nbsp; 
                            {{ $row->created_at->diffForHumans() }} | {{ date('d-m-Y', strtotime($row->created_at)) }} 
                        </span>
                    </div>
                    @endforeach
                </div> <!--  end .widget -->

            </div> <!-- end .col-sm-4  -->

        </div> <!--  end row  -->

    </div> <!--  end container -->

</section> <!-- end .main-content  --> 
@endsection