@extends('layouts.main')
@section('content')
<!-- Page Title -->
<div class="page-title dark-background">
    <div class="container position-relative">
      <h1>Blog</h1>
      <p>Temukan berbagai artikel, tips, dan informasi terbaru seputar teknologi, pengembangan Website, Aplikasi Mobile, dan Desktop. Idarma Digital Technology berbagi wawasan untuk mendukung transformasi digital Anda.</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ route('home') }}">Home</a></li>
          <li class="current">Blog</li>
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->

  <!-- Blog Posts Section -->
  <section id="blog-posts" class="blog-posts section">

    <div class="container">
      <div class="row gy-4">

        <div class="col-lg-4">
          <article>

            <div class="post-img">
              <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
            </div>

            <p class="post-category">Politics</p>

            <h2 class="title">
                <a href="{{ route('blog.details') }}">Dolorum optio tempore voluptas dignissimos</a>
            </h2>

            <div class="d-flex align-items-center">
              <div class="post-meta">
                <p class="post-date">
                  <time datetime="2022-01-01">Jan 1, 2022</time>
                </p>
              </div>
            </div>

          </article>
        </div><!-- End post list item -->

        <div class="col-lg-4">
          <article>

            <div class="post-img">
              <img src="assets/img/blog/blog-2.jpg" alt="" class="img-fluid">
            </div>

            <p class="post-category">Sports</p>

            <h2 class="title">
                <a href="{{ route('blog.details') }}">Nisi magni odit consequatur autem nulla dolorem</a>
            </h2>

            <div class="d-flex align-items-center">
              <div class="post-meta">
                <p class="post-date">
                  <time datetime="2022-01-01">Jun 5, 2022</time>
                </p>
              </div>
            </div>

          </article>
        </div><!-- End post list item -->

        <div class="col-lg-4">
          <article>

            <div class="post-img">
              <img src="assets/img/blog/blog-3.jpg" alt="" class="img-fluid">
            </div>

            <p class="post-category">Entertainment</p>

            <h2 class="title">
                <a href="{{ route('blog.details') }}">Possimus soluta ut id suscipit ea ut in quo quia et soluta</a>
            </h2>

            <div class="d-flex align-items-center">
              <div class="post-meta">
                <p class="post-date">
                  <time datetime="2022-01-01">Jun 22, 2022</time>
                </p>
              </div>
            </div>

          </article>
        </div><!-- End post list item -->

        <div class="col-lg-4">
          <article>

            <div class="post-img">
              <img src="assets/img/blog/blog-4.jpg" alt="" class="img-fluid">
            </div>

            <p class="post-category">Sports</p>

            <h2 class="title">
                <a href="{{ route('blog.details') }}">Non rem rerum nam cum quo minus olor distincti</a>
            </h2>

            <div class="d-flex align-items-center">
              <div class="post-meta">
                <p class="post-date">
                  <time datetime="2022-01-01">Jun 30, 2022</time>
                </p>
              </div>
            </div>

          </article>
        </div><!-- End post list item -->

        <div class="col-lg-4">
          <article>

            <div class="post-img">
              <img src="assets/img/blog/blog-5.jpg" alt="" class="img-fluid">
            </div>

            <p class="post-category">Politics</p>

            <h2 class="title">
                <a href="{{ route('blog.details') }}">Accusamus quaerat aliquam qui debitis facilis consequatur</a>
            </h2>

            <div class="d-flex align-items-center">
              <div class="post-meta">
                <p class="post-date">
                  <time datetime="2022-01-01">Jan 30, 2022</time>
                </p>
              </div>
            </div>

          </article>
        </div><!-- End post list item -->

        <div class="col-lg-4">
          <article>

            <div class="post-img">
              <img src="assets/img/blog/blog-6.jpg" alt="" class="img-fluid">
            </div>

            <p class="post-category">Entertainment</p>

            <h2 class="title">
                <a href="{{ route('blog.details') }}">Distinctio provident quibusdam numquam aperiam aut</a>
            </h2>

            <div class="d-flex align-items-center">
              <div class="post-meta">
                <p class="post-date">
                  <time datetime="2022-01-01">Feb 14, 2022</time>
                </p>
              </div>
            </div>

          </article>
        </div><!-- End post list item -->

      </div>
    </div>

  </section><!-- /Blog Posts Section -->

  <!-- Blog Pagination Section -->
  <section id="blog-pagination" class="blog-pagination section">

    <div class="container">
      <div class="d-flex justify-content-center">
        <ul>
          <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
          <li><a href="#">1</a></li>
          <li><a href="#" class="active">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li>...</li>
          <li><a href="#">10</a></li>
          <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
        </ul>
      </div>
    </div>

  </section><!-- /Blog Pagination Section -->    
@endsection