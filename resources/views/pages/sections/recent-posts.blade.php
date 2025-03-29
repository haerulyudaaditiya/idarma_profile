<!-- Recent Posts Section -->
<section id="recent-posts" class="recent-posts section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Postingan Terbaru</h2>
        <p>Postingan Blog Terbaru<br></p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-4">
            @foreach ($latestNews as $news)
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <article>
                        <div class="post-img">
                            <img src="{{ asset('storage/' . $news->cover) }}" alt="{{ $news->title }}" class="img-fluid">
                        </div>

                        <p class="post-category">{{ $news->category->name_category ?? '-' }}</p>

                        <h2 class="title">
                            <a href="{{ route('user.news.show', $news->id) }}">
                                {{ Str::limit($news->title, 60) }}
                            </a>
                        </h2>

                        <div class="d-flex align-items-center">
                            <div class="post-meta">
                                <p class="post-date">
                                    <time datetime="{{ $news->created_at->toDateString() }}">
                                        {{ $news->created_at->format('M d, Y') }}
                                    </time>
                                </p>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div><!-- End recent posts list -->
    </div>
</section><!-- /Recent Posts Section -->
