<!-- Portfolio Section -->
<section id="portfolio" class="portfolio section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
        <p>Apa Yang Kami Sudah Kerjakan</p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                @foreach ($portfolios as $portfolio)
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <img src="{{ asset('storage/' . $portfolio->image) }}" class="img-fluid"
                            alt="{{ $portfolio->title }}">
                        <div class="portfolio-info">
                            <h4>{{ $portfolio->title }}</h4>
                            <a href="{{ asset('storage/' . $portfolio->image) }}" title="{{ $portfolio->title }}"
                                data-gallery="portfolio-gallery-app" class="glightbox preview-link">
                                <i class="bi bi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</section><!-- /Portfolio Section -->
