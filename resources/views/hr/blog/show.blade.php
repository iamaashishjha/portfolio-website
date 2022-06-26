@extends('layouts.hr')

@section('title')
    {{ $blog->meta_title }}
@endsection

@section('content')
<section class="inner-banner">
    <div class="container">
        <h2 class="inner-banner__title">{{ __('home.blog.details.sub-heading') }}</h2><!-- /.inner-banner__title -->
        <ul class="list-unstyled thm-breadcrumb">
            <li><a href="/">{{ __('home.menuItems.home') }}</a></li>
            <li><a href="{{ route('home.blogs.index') }}">{{ __('home.menuItems.posts.blogs') }}</a></li>
            <li>{{ __('home.blog.details.sub-heading') }}</li>
        </ul><!-- /.list-unstyled -->
    </div><!-- /.container -->
</section><!-- /.inner-banner -->

<section class="blog-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-one__single">
                    <div class="blog-one__image">
                        <img src="{{ $blog->image }}" alt="{{ $blog->title }}">
                    </div><!-- /.blog-one__image -->
                    <div class="blog-one__content">
                        <ul class="list-unstyled blog-one__meta">
                            <li><a href="#">By {{ $blog->createdUser->name }}</a></li>
                            <li><a href="#">{{ $blog->created_at->format('d M, Y') }}</a></li>
                            {{-- <li><a href="#">2 Comments</a></li> --}}
                        </ul><!-- /.list-unstyled -->
                        <h3 class="blog-one__title">
                            {{ $blog->title }}
                        </h3><!-- /.blog-one__title -->
                        <p class="blog-one__text">
                        </p>

                        {!! $blog->content !!}
                        </p>
                        <!-- /.blog-one__text -->
                        <div class="share-block">
                            @if (isset($blog->blogTags))
                                <div class="left-block">
                                    <p>{{ __('home.blog.details.tag') }}:
                                        @foreach ($blog->tags as $tag)
                                            <a href="">{{ $tag->title }}</a>
                                        @endforeach
                                        {{-- {!! $blog->getBlogTags() !!} --}}
                                    </p>
                                </div><!-- /.left-block -->
                            @endif

                            <div class="social-block">
                                <a class="fa fa-twitter" href="https://twitter.com/intent/tweet?text={{ route('home.blogs.show', $blog->id) }}" target="_blank"></a>
                                <a class="fa fa-facebook-square" href="https://www.facebook.com/sharer/sharer.php?u={{ route('home.blogs.show', $blog->id) }}" target="_blank"></a>
                                {{-- <a class="fa fa-instagram" href="#"></a> --}}
                                {{-- <a class="fa fa-pinterest-p" href="#"></a> --}}
                            </div><!-- /.social-block -->
                        </div><!-- /.share-block -->
                    </div><!-- /.blog-one__content -->
                </div><!-- /.blog-one__single -->

                <div class="blog-details__author">
                    <div class="blog-details__author-image">
                        <img src="{{ isset($blog->createdUser->image) ? $blog->createdUser->image : Avatar::create($blog->createdUser->name)->toBase64(); }}" alt="{{ $blog->createdUser->name }}" />
                    </div><!-- /.blog-details__image -->
                    <div class="blog-details__author-content">
                        <h3>{{ $blog->createdUser->name }}</h3>
                        @if (isset($blog->description))
                        <p>
                            {{ $blog->description }}
                        </p>
                        @endif
                    </div><!-- /.blog-details__content -->
                </div><!-- /.blog-details__author -->

                <h2 class="blog-details__content-title">{{ $blog->comments->count() }} Comments</h2><!-- /.blog-details__content-title -->
                <div class="comment-one">
                    @foreach ($blog->comments as $comment)
                    <div class="comment-one__single">
                        <div class="comment-one__image">
                            <div class="inner-block">
                                <img src="{{ Avatar::create($comment->name)->toBase64(); }}" alt="{{ $comment->name }}" />
                            </div><!-- /.inner-block -->
                        </div><!-- /.comment-one__image -->
                        <div class="comment-one__content">
                            <div class="comment-one__content-top">
                                <div class="comment-one__top-left">
                                    <h3 class="comment-one__author">{{ $comment->name }}</h3>
                                    <!-- /.comment-one__author -->
                                    <p class="comment-one__date">{{ $comment->created_at->format('d M, Y') }} <span
                                            class="comment-one__date-sep">.</span>{{ $comment->created_at->format('h:i A') }}</p>
                                    <!-- /.comment-one__date -->
                                    <p class="comment-one__text">{{ $comment->message }}</p>
                                    <!-- /.comment-one__text -->
                                </div><!-- /.comment-one__top-left -->
                                {{-- <div class="comment-one__top-right">
                                    <a href="{{ route() }}" class="thm-btn comment-one__reply">Reply</a>
                                </div><!-- /.comment-one__top-right --> --}}

                            </div><!-- /.comment-one__content-top -->
                        </div><!-- /.comment-one__content -->
                    </div><!-- /.comment-one__single -->
                    @endforeach
                    

                </div><!-- /.comment-one -->
                <h2 class="blog-details__content-title">Leave a Comment</h2><!-- /.blog-details__content-title -->
                <form action="{{ route('home.blogs.comment', $blog->id) }}" class="reply-form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" placeholder="Your name" name="name" class="reply-form__field">
                        </div><!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <input type="text" placeholder="Enter email" name="email" class="reply-form__field">
                        </div><!-- /.col-lg-6 -->
                        <div class="col-lg-12">
                            <textarea placeholder="Write message" name="message" class="reply-form__field"></textarea>
                            <button class="reply-form__btn thm-btn" type="submit">Submit Comment</button>
                        </div><!-- /.col-lg-12 -->
                    </div><!-- /.row -->
                </form><!-- /.reply-form -->
            </div><!-- /.col-lg-8 -->
            <div class="col-lg-4">
                <div class="sidebar">
                    {{-- <div class="sidebar__single sidebar__search">
                        <h3 class="sidebar__title">Search</h3><!-- /.sidebar__title -->
                        <form action="#" class="sidebar__search-form">
                            <input type="text" name="search" placeholder="Search here...">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div><!-- /.sidebar__single --> --}}
                    <div class="sidebar__single sidebar__post">
                        <h3 class="sidebar__title">{{ __('home.blog.details.latest') }}</h3><!-- /.sidebar__title -->
                        <div class="sidebar__post-wrap">
                            @foreach ($latestBlogs as $post)
                            <div class="sidebar__post__single">
                                <div class="sidebar__post-image">
                                    <div class="inner-block"><img src="{{ $post->image }}"
                                            alt="{{ $post->title }}" /></div>
                                    <!-- /.inner-block -->
                                </div><!-- /.sidebar__post-image -->
                                <div class="sidebar__post-content">
                                    <h4 class="sidebar__post-title">
                                        <a href="{{ route('home.blogs.categoryShow', $post->category->id) }}">
                                            {!! Str::limit($post->content, 20, '...') !!}
                                        </a>
                                    </h4>
                                    <!-- /.sidebar__post-title -->
                                </div><!-- /.sidebar__post-content -->
                            </div><!-- /.sidebar__post__single -->
                            @endforeach
                            
                            
                        </div><!-- /.sidebar__post-wrap -->
                    </div><!-- /.sidebar__single -->
                    <div class="sidebar__single sidebar__category">
                        <h3 class="sidebar__title">{{ __('home.blog.details.category') }}</h3><!-- /.sidebar__title -->
                        <ul class="sidebar__category-list">
                            @foreach ($blogCategories as $category)
                            <li class="sidebar__category-list-item">
                                <a href="{{ route('home.blogs.categoryShow', $category->id) }}">
                                    {{ $category->title }} {{ ' ('.count($category->posts).')' }}
                                </a>
                            </li>
                            @endforeach
                        </ul><!-- /.sidebar__category-list -->
                    </div><!-- /.sidebar__single -->
                    <div class="sidebar__single sidebar__tags">
                        <h3 class="sidebar__title">{{ __('home.blog.details.tag') }}</h3><!-- /.sidebar__title -->
                        <ul class="sidebar__tags-list">
                            @foreach ($blogTags as $tag)
                            <li class="sidebar__tags-list-item"><a href="#">{{ $tag->title }}</a></li>
                            @endforeach
                        </ul><!-- /.sidebar__category-list -->
                    </div><!-- /.sidebar__single -->
                </div><!-- /.sidebar -->
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.blog-details -->
@endsection