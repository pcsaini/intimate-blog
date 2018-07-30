@extends('layouts.master')

@section('page_title','Intimate Blog - Home')

@section('hero')

    <section class="text-center" id="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="intro-area">
                        <h3>Welcome To</h3>
                        <h2 class="page-title">Intimate Blog</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('content')

    @foreach($posts as $post)
        <article>
            <!-- Blog item Start -->
            <div class="blog-item-wrap">
                <!-- Post Format icon Start -->
                <div class="post-format">
                    <span><i class="fa fa-camera"></i></span>
                </div><!-- Post Format icon End -->
                <h2 class="blog-title"><a href="{{ route('blog.single_blog',$post->post_url) }}">{{$post->post_title}}</a></h2><!-- Entry Meta Start-->
                <div class="entry-meta">
                    <span class="meta-part"><i class="ico-user"></i> <a href="#">{{ $post->user->name }}</a></span>
                    <span class="meta-part"><i class="ico-calendar-alt-fill"></i> <a href="#">{{$post->created_at}}</a></span>
                    <span class="meta-part"><i class="ico-comments"></i>
                    <a href="#">20</a></span> <span class="meta-part"><i class="ico-tag"></i> <a href="#">{{ $post->category->category }}</a></span>
                    <span class="meta-part"><i class="ico-star"></i> <a href="#">7.5</a></span>
                </div><!-- Entry Meta End-->
                <!-- Feature inner Start -->
                <div class="feature-inner">
                    <a data-lightbox="roadtrip" href=""><img alt="" src="{{ asset('Blog/img/blog/blog-01.jpg') }}"></a>
                </div><!-- Feature inner End -->
                <!-- Post Content Start -->
                <div class="post-content">
                    <?php
                        $post_cantent = str_limit($post->post,1000);
                        echo $post_cantent;
                    ?>

                </div><!-- Post Content End -->
                <div class="entry-more">
                    <div class="pull-left">
                        <a class="btn btn-common" href="{{ route('blog.single_blog',$post->post_url) }}">Read More <i class="ico-arrow-right"></i></a>
                    </div>
                    <div class="share-icon pull-right">
                        <span class="socialShare"></span>
                    </div>
                </div>
            </div><!-- Blog item End -->
        </article>
    @endforeach


@endsection

