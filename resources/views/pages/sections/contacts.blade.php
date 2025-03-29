<!-- Contact Section -->
<section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Kontak</h2>
        <p>Kontak Kami</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade" data-aos-delay="100">

        <div class="row gy-4">

            <div class="col-lg-4">
                <!-- Alamat -->
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                    <i class="bi bi-geo-alt flex-shrink-0"></i>
                    <div>
                        <h3>Alamat</h3>
                        <p>
                            <a href="https://www.google.com/maps?q=Malangsari,+Pedes,+Karawang,+Jawa+Barat"
                                target="_blank" style="color: inherit; text-decoration: none;">
                                Malangsari, Pedes, Karawang, Jawa Barat
                            </a>
                        </p>
                    </div>
                </div>

                <!-- WhatsApp -->
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                    <i class="bi bi-telephone flex-shrink-0"></i>
                    <div>
                        <h3>Hubungi Kami</h3>
                        <p>
                            <a href="https://wa.me/62811171505" target="_blank"
                                style="color: inherit; text-decoration: none;">
                                +62 8111 71505
                            </a>
                        </p>
                    </div>
                </div>

                <!-- Email -->
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                    <i class="bi bi-envelope flex-shrink-0"></i>
                    <div>
                        <h3>Email Kami</h3>
                        <p>
                            <a href="mailto:idarmadigitaltechnology@gmail.com"
                                style="color: inherit; text-decoration: none;">
                                idarmadigitaltechnology@gmail.com
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <form action="{{ route('contacts.store') }}#contact" method="POST" class="php-email-form"
                    data-aos="fade-up" data-aos-delay="200">
                    @csrf
                    <div class="row gy-4">

                        <!-- Nama -->
                        <div class="col-md-6">
                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Nama Anda"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Email Anda"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Telepon -->
                        <div class="col-md-6">
                            <input type="tel" name="telp"
                                class="form-control @error('telp') is-invalid @enderror" placeholder="Nomor Telepon"
                                value="{{ old('telp') }}" required>
                            @error('telp')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Layanan -->
                        <div class="col-md-6">
                            <select name="service_id" class="form-select @error('service_id') is-invalid @enderror"
                                required>
                                <option value="" disabled {{ old('service_id') ? '' : 'selected' }}>-- Pilih
                                    Layanan --</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}"
                                        {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                        {{ $service->name_service }}
                                    </option>
                                @endforeach
                            </select>
                            @error('service_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Pesan -->
                        <div class="col-md-12">
                            <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="6"
                                placeholder="Tulis pesan Anda..." required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tombol -->
                        <div class="col-md-12 text-center">
                            <div class="loading">Loading</div>
                            @if (session('success'))
                                <div class="sent-message d-block">{{ session('success') }}</div>
                            @endif
                            <button type="submit">Kirim Pesan</button>
                        </div>
                    </div>
                </form>
            </div><!-- End Contact Form -->

        </div>

    </div>

</section><!-- /Contact Section -->
