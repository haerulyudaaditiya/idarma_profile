@extends('layouts.home.main')

@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>{{ $news->title }}</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('news') }}">News</a></li>
                    <li class="current"
                        style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"
                        title="{{ $news->title }}">
                        {{ $news->title }}
                    </li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <!-- Blog Details -->
                <section id="blog-details" class="blog-details section">
                    <div class="container">
                        <article class="article">

                            <div class="post-img">
                                <img src="{{ asset('storage/' . $news->cover) }}" alt="{{ $news->title }}"
                                    class="img-fluid">
                            </div>

                            <h2 class="title">{{ $news->title }}</h2>

                            <div class="meta-top">
                                <ul>
                                    <li><i class="bi bi-folder"></i> {{ $news->category->name_category ?? '-' }}</li>
                                    <li><i class="bi bi-clock"></i> <time
                                            datetime="{{ $news->created_at }}">{{ $news->created_at->format('d M Y') }}</time>
                                    </li>
                                    <li><i class="bi bi-chat-dots"></i> {{ $news->comments->count() }} Komentar</li>
                                </ul>
                            </div>

                            <div class="content">
                                {!! $news->content !!}
                            </div>

                            <div class="meta-bottom mt-4">
                                <i class="bi bi-tags"></i>
                                <ul class="tags">
                                    @foreach ($news->tags as $tag)
                                        <li>{{ $tag->name_tag }}</li>
                                    @endforeach
                                </ul>
                            </div>

                        </article>
                    </div>
                </section>

                <!-- Blog Comments Section -->
                <section id="blog-comments" class="blog-comments section">
                    <div class="container"">
                        <h4 class="comments-count">{{ $news->comments->count() }} Komentar</h4>

                        {{-- Komentar Utama --}}
                        @foreach ($news->comments->whereNull('parent_id') as $comment)
                            <div class="comment py-2 border-bottom" style="border-color: #ddd;">
                                <div class="d-flex align-items-start">
                                    <div class="comment-img me-3">
                                        <img src="{{ asset('assets/img/team/user.png') }}" alt="avatar"
                                            style="width: 42px; height: 42px; object-fit: cover; border-radius: 50%;">
                                    </div>
                                    <div class="w-100">
                                        <h6 class="mb-1">
                                            <strong>{{ $comment->name }}</strong>
                                            <a href="#comment-form" class="reply ms-2 "
                                                onclick="document.getElementById('parent_id').value = '{{ $comment->id }}'">
                                                <i class="bi bi-reply-fill"></i> Reply
                                            </a>
                                        </h6>
                                        <small
                                            class="text-muted d-block mb-1">{{ $comment->created_at->format('d M Y') }}</small>
                                        <p class="mb-1">{{ $comment->comment }}</p>
                                    </div>
                                </div>

                                {{-- Balasan --}}
                                @foreach ($comment->replies as $reply)
                                    <div class="comment comment-reply ms-5 ps-2 mt-3 border-top pt-2"
                                        style="border-color: #eee;">
                                        <div class="d-flex align-items-start">
                                            <div class="comment-img me-3">
                                                <img src="{{ asset('assets/img/team/user.png') }}" alt="avatar"
                                                    style="width: 36px; height: 36px; object-fit: cover; border-radius: 50%;">
                                            </div>
                                            <div class="w-100">
                                                <h6 class="mb-1"><strong>{{ $reply->name }}</strong></h6>
                                                <small
                                                    class="text-muted d-block mb-1">{{ $reply->created_at->format('d M Y') }}</small>
                                                <p class="mb-1">{{ $reply->comment }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </section>

                <!-- Comment Form Section -->
                <section id="comment-form" class="comment-form section">
                    <div class="container">
                        <form action="{{ route('news-comments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="news_id" value="{{ $news->id }}">
                            <input type="hidden" name="parent_id" id="parent_id">

                            <h4>Unggah Komentar</h4>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input name="name" type="text" class="form-control" placeholder="Nama Anda"
                                        required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col form-group">
                                    <textarea name="comment" class="form-control" placeholder="Tulis komentar Anda..." required></textarea>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                            </div>
                        </form>
                    </div>
                </section>


            </div>

            <div class="col-lg-4 sidebar">
                <div class="widgets-container">

                    <!-- Recent Posts -->
                    <div class="recent-posts-widget widget-item">
                        <h3 class="widget-title">Recent Posts</h3>
                        @foreach ($recentNews as $recent)
                            <div class="post-item">
                                <h4><a href="{{ route('user.news.show', $recent->id) }}">{{ $recent->title }}</a></h4>
                                <time
                                    datetime="{{ $recent->created_at }}">{{ $recent->created_at->format('d M Y') }}</time>
                            </div>
                        @endforeach
                    </div>

                    <!-- Active Category Only -->
                    <div class="tags-widget widget-item">
                        <h3 class="widget-title">Category</h3>
                        <ul>
                            <li>
                                <a href="javascript:void(0)" style="text-decoration: none; cursor: default;">
                                    {{ $news->category->name_category ?? '-' }}
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Tags (All, not clickable) -->
                    <div class="tags-widget widget-item">
                        <h3 class="widget-title">Tags</h3>
                        <ul>
                            @foreach ($allTags as $tag)
                                <li>
                                    <a href="javascript:void(0)" style="text-decoration: none; cursor: default;">
                                        {{ $tag->name_tag }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function setReply(commentId) {
            document.getElementById('parent_id').value = commentId;
        }
    </script>
@endpush
