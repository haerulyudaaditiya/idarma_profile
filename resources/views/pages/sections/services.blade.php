<!-- Services Section -->
<section id="services" class="services section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Layanan</h2>
        <p>Apa yang Kami Tawarkan</p>
    </div>

    <div class="container">
        <div class="row gy-4">
            @foreach ($services as $service)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 + 100 }}">
                    <div class="service-item position-relative text-center p-5">
                        <img src="{{ asset('storage/' . $service->icon) }}" alt="Icon" class="mb-3"
                            style="width: 50px; height: 80px; object-fit: contain;">

                        <h3>{{ $service->name_service }}</h3>
                        <p>{{ $service->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
