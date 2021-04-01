@extends('comet.layouts.app')
@section('main-content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-posts">

                    @foreach($all_data as $data)

                    @php
                    $featured = json_decode( $data -> featured );
                    @endphp
                    <article class="post-single">
                        <div class="post-info">
                            <h2><a href="#">{{ $data -> title }}</a></h2>
                            <h6 class="upper"><span>By</span><a href="#"> Admin</a><span class="dot"></span><span>28 September 2015</span><span class="dot"></span><a href="#" class="post-tag">Startups</a></h6>
                        </div>

                        @if( $featured -> post_type == 'Image' )
                        <div class="post-media">
                            <a href="#">
                                <img src="{{ URL::to('/') }}/media/posts/{{ $featured -> post_image }}" alt="" />
                            </a>
                        </div>
                        @endif

                        @if( $featured -> post_type == 'Gallery' )
                        <div class="post-media">
                            <div data-options='{"animation": "slide", "controlNav": true' class="flexslider nav-outside">
                                <ul class="slides">
                                    @foreach( $featured -> post_gall as $gall_img)
                                    <li>
                                        <img src="{{ URL::to('/') }}/media/posts/{{ $gall_img }}" alt="" />
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        @endif

                        @if( $featured -> post_type == 'Video' )
                        <div class="post-media">
                            <div class="media-video">
                                <iframe src="https://www.youtube.com/embed/rrT6v5sOwJg" frameborder="0"></iframe>
                            </div>
                        </div>
                        @endif

                        @if( $featured -> post_type == 'Audio' )
                        <div class="post-media">
                            <div class="media-audio">
                                <iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/51057943&amp;amp;color=ff5500&amp;amp;auto_play=false&amp;amp;hide_related=false&amp;amp;show_comments=true&amp;amp;show_user=true&amp;amp;show_reposts=false" frameborder="0"></iframe>
                            </div>
                        </div>
                        @endif

                        <div class="post-body">
                            {!! Str::of(htmlspecialchars_decode($data -> content)) -> words(30) !!}
                            <p><a href="#" class="btn btn-color btn-sm">Read More</a></p>
                        </div>
                    </article>
                    @endforeach
                    <!-- end of article-->

                </div>
                <ul class="pagination">
                    <li>
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true"><i class="ti-arrow-left"></i></span>
                        </a>
                    </li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true"><i class="ti-arrow-right"></i></span>
                        </a>
                    </li>
                </ul>
                <!-- end of pagination-->
            </div>
            <div class="col-md-3 col-md-offset-1">
                <div class="sidebar hidden-sm hidden-xs">
                    <div class="widget">
                        <h6 class="upper">Search blog</h6>
                        <form>
                            <input type="text" placeholder="Search.." class="form-control" />
                        </form>
                    </div>
                    <!-- end of widget        -->
                    <div class="widget">
                        <h6 class="upper">Categories</h6>
                        <ul class="nav">
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Tech</a></li>
                            <li><a href="#">Gaming</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Money</a></li>
                        </ul>
                    </div>
                    <!-- end of widget        -->
                    <div class="widget">
                        <h6 class="upper">Popular Tags</h6>
                        <div class="tags clearfix"><a href="#">Design</a><a href="#">Fashion</a><a href="#">Startups</a><a href="#">Tech</a><a href="#">Web</a><a href="#">Lifestyle</a></div>
                    </div>
                    <!-- end of widget      -->
                    <div class="widget">
                        <h6 class="upper">Latest Posts</h6>
                        <ul class="nav">
                            <li>
                                <a href="#">Checklists for Startups<i class="ti-arrow-right"></i><span>30 Sep, 2015</span></a>
                            </li>
                            <li>
                                <a href="#">The Death of Thought<i class="ti-arrow-right"></i><span>29 Sep, 2015</span></a>
                            </li>
                            <li>
                                <a href="#">Give it five minutes<i class="ti-arrow-right"></i><span>24 Sep, 2015</span></a>
                            </li>
                            <li>
                                <a href="#">Uber launches in Las Vegas<i class="ti-arrow-right"></i><span>20 Sep, 2015</span></a>
                            </li>
                            <li>
                                <a href="#">Fun with Product Hunt<i class="ti-arrow-right"></i><span>16 Sep, 2015</span></a>
                            </li>
                        </ul>
                    </div>
                    <!-- end of widget          -->
                </div>
                <!-- end of sidebar-->
            </div>
        </div>
        <!-- end of row-->
    </div>
    <!-- end of container-->
</section>
@endsection