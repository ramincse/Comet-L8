@extends('comet/layouts.app')
@section('page-title', $single_post->title)
@section('main-content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post-single">
                    <div class="post-info">
                        <h2><a href="#">{{ $single_post->title }}</a></h2>
                        <h6 class="upper"><span>By</span><a href="#"> {{ $single_post->user->name }}</a><span class="dot"></span><span>{{ date('d F, Y', strtotime($single_post->created_at)) }}</span><span class="dot"></span> @foreach($single_post->tags as $tag) <a href="#" class="post-tag">{{ $tag->name }}<span class="sptcoma">,</span></a> @endforeach </h6>
                    </div>
                    <div class="post-media">
                        @php
                        $featured = json_decode($single_post->featured);
                        @endphp

                        @if( $featured -> post_type == 'Image' )
                        <img src="{{ URL::to('/') }}/media/posts/{{ $featured -> post_image }}" alt="" />

                        @elseif( $featured -> post_type == 'Gallery' )
                        <div data-options='{"animation": "slide", "controlNav": true' class="flexslider nav-outside">
                            <ul class="slides">
                                @foreach( $featured -> post_gall as $gall_img)
                                <li>
                                    <img src="{{ URL::to('/') }}/media/posts/{{ $gall_img }}" alt="" />
                                </li>
                                @endforeach

                            </ul>
                        </div>

                        @elseif( $featured -> post_type == 'Video' )
                        <div class="media-video">
                            <iframe src="{{ $featured -> post_video }}" frameborder="0"></iframe>
                        </div>

                        @elseif( $featured -> post_type == 'Audio' )
                        <div class="media-audio">
                            <iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/51057943&amp;amp;color=ff5500&amp;amp;auto_play=false&amp;amp;hide_related=false&amp;amp;show_comments=true&amp;amp;show_user=true&amp;amp;show_reposts=false" frameborder="0"></iframe>
                        </div>
                        @endif

                    </div>
                    <div class="post-body">
                        {!! htmlspecialchars_decode($single_post -> content) !!}
                    </div>
                </article>
                <!-- end of article-->
                <div id="comments">
                    <h5 class="upper">3 Comments</h5>
                    <ul class="comments-list">
                        <li>
                            <div class="comment">
                                <div class="comment-pic">
                                    <img src="{{ URL::to('/') }}/comet/images/team/1.jpg" alt="" class="img-circle" />
                                </div>
                                <div class="comment-text">
                                    <h5 class="upper">Jesse Pinkman</h5>
                                    <span class="comment-date">Posted on 29 September at 10:41</span>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime distinctio et quam possimus velit dolor sunt nisi neque, harum, dolores rem incidunt, esse ipsa nam facilis eum doloremque
                                        numquam veniam.
                                    </p>
                                    <a href="#" class="comment-reply">Reply</a>
                                </div>
                            </div>
                            <ul class="children">
                                <li>
                                    <div class="comment">
                                        <div class="comment-pic">
                                            <img src="{{ URL::to('/') }}/comet/images/team/2.jpg" alt="" class="img-circle" />
                                        </div>
                                        <div class="comment-text">
                                            <h5 class="upper">Arya Stark</h5>
                                            <span class="comment-date">Posted on 29 September at 10:41</span>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque porro quae harum dolorem exercitationem voluptas illum ipsa sed hic, cum corporis autem molestias suscipit, illo
                                                laborum, vitae, dicta ullam minus.
                                            </p>
                                            <a href="#" class="comment-reply">Reply</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="comment">
                                <div class="comment-pic">
                                    <img src="{{ URL::to('/') }}/comet/images/team/3.jpg" alt="" class="img-circle" />
                                </div>
                                <div class="comment-text">
                                    <h5 class="upper">Rust Cohle</h5>
                                    <span class="comment-date">Posted on 29 September at 10:41</span>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deleniti sit beatae natus! Beatae velit labore, numquam excepturi, molestias reiciendis, ipsam quas iure distinctio quia, voluptate
                                        expedita autem explicabo illo.
                                    </p>
                                    <a href="#" class="comment-reply">Reply</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- end of comments-->
                <div id="respond">
                    <h5 class="upper">Leave a comment</h5>
                    <div class="comment-respond">
                        <form class="comment-form">
                            <div class="form-double">
                                <div class="form-group">
                                    <input name="author" type="text" placeholder="Name" class="form-control" />
                                </div>
                                <div class="form-group last">
                                    <input name="email" type="text" placeholder="Email" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea placeholder="Comment" class="form-control"></textarea>
                            </div>
                            <div class="form-submit text-right">
                                <button type="button" class="btn btn-color-out">Post Comment</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end of comment form-->
            </div>

            @include('comet.layouts.partials.sidebar')
            <!-- end of sidebar-->
        </div>
        <!-- end of row-->
    </div>
</section>
@endsection