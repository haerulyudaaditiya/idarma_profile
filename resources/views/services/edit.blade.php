@extends('layouts.admin.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Form Edit Layanan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Layanan</a></li>
                        <li class="breadcrumb-item active">Edit Layanan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Form Edit Layanan</h3>
                        </div>

                        <form action="{{ route('services.update', $service->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <!-- Nama Layanan -->
                                <div class="form-group">
                                    <label for="name_service">Nama Layanan</label>
                                    <input type="text" name="name_service"
                                        class="form-control @error('name_service') is-invalid @enderror" id="name_service"
                                        value="{{ old('name_service', $service->name_service) }}"
                                        placeholder="Masukkan nama layanan" required>
                                    @error('name_service')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Icon -->
                                <div class="form-group">
                                    <label for="icon">Icon</label>
                                    <input type="file" accept="image/*" name="img"
                                        class="form-control-file @error('img') is-invalid @enderror" id="img">
                                    @if ($service->icon)
                                        <p class="mt-2">Foto saat ini:</p>
                                        <img src="{{ asset('storage/' . $service->icon) }}" alt="Foto" width="80px">
                                    @endif
                                    @error('img')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Deskripsi -->
                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea name="description" id="description" rows="3"
                                        class="form-control @error('description') is-invalid @enderror" placeholder="Masukkan deskripsi layanan..."
                                        required>{{ old('description', $service->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{ route('services.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@include('layouts.admin.alert')
