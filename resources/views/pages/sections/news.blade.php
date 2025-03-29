@extends('layouts.home.main')
@section('content')

    <!-- Page Title -->
    <div class="page-title dark-background">
        <div class="container position-relative">
            <h1>News</h1>
            <p>Temukan berbagai artikel, tips, dan informasi terbaru seputar teknologi, pengembangan Website, Aplikasi
                Mobile, dan Desktop. Idarma Digital Technology berbagi wawasan untuk mendukung transformasi digital Anda.
            </p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">News</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Blog Posts Section -->
    <section id="blog-posts" class="blog-posts section">
        <div class="container">
            <div class="row gy-4">

                @forelse ($news as $item)
                    <div class="col-lg-4">
                        <article>
                            <div class="post-img">
                                <img src="{{ asset('storage/' . $item->cover) }}" alt="{{ $item->title }}"
                                    class="img-fluid" style="height: 220px; object-fit: cover;">
                            </div>

                            <p class="post-category">
                                {{ $item->category->name_category ?? '-' }}
                            </p>

                            <h2 class="title">
                                <a href="{{ route('user.news.show', $item->id) }}">
                                    {{ \Illuminate\Support\Str::limit($item->title, 70) }}
                                </a>
                            </h2>

                            <div class="d-flex align-items-center">
                                <div class="post-meta">
                                    <p class="post-date">
                                        <time
                                            datetime="{{ $item->created_at }}">{{ $item->created_at->format('d M Y') }}</time>
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">Belum ada berita untuk saat ini.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </section>
    <!-- /Blog Posts Section -->

    <section id="blog-pagination" class="blog-pagination section">
        <div class="container">
          <div class="d-flex justify-content-center">
            <ul>
              {{-- Tombol Sebelumnya --}}
              @if (!$news->onFirstPage())
                <li><a href="{{ $news->previousPageUrl() }}"><i class="bi bi-chevron-left"></i></a></li>
              @endif

              {{-- Numbered Pages + Ellipsis --}}
              @php
                  $total = $news->lastPage();
                  $current = $news->currentPage();
                  $range = 2;
                  $dotShown = false;
              @endphp

              @for ($i = 1; $i <= $total; $i++)
                  @if (
                      $i == 1 || $i == $total ||
                      ($i >= $current - $range && $i <= $current + $range)
                  )
                      @php $dotShown = false; @endphp
                      @if ($i == $current)
                          <li><a href="#" class="active">{{ $i }}</a></li>
                      @else
                          <li><a href="{{ $news->url($i) }}">{{ $i }}</a></li>
                      @endif
                  @elseif (!$dotShown)
                      <li><span>...</span></li>
                      @php $dotShown = true; @endphp
                  @endif
              @endfor

              {{-- Tombol Berikutnya --}}
              @if ($news->hasMorePages())
                <li><a href="{{ $news->nextPageUrl() }}"><i class="bi bi-chevron-right"></i></a></li>
              @endif
            </ul>
          </div>
        </div>
      </section>

@endsection
