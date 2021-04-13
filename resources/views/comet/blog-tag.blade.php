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
                            <h6 class="upper"><span>By</span><a href="{{ $data -> user_id }}"> {{ $data -> user -> name }}</a><span class="dot"></span><span>{{ date('d F, Y', strtotime( $data -> created_at )) }}</span><span class="dot"></span>
                                <a href="#" class="post-tag">Startups</a>
                                @foreach( $data->categories as $cat )
                                <a href="#" class="post-tag">{{ $cat -> name }}</a>,
                                @endforeach

                            </h6>
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
                                <iframe src="{{ $featured -> post_video }}" frameborder="0"></iframe>
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
                <!-- end of pagination-->
            </div>


            <!-- Sidebar Section -->
            @include('comet.layouts.partials.sidebar')


        </div>
        <!-- end of row-->
    </div>
    <!-- end of container-->
</section>
@endsection