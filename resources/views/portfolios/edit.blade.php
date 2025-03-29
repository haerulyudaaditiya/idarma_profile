@extends('layouts.admin.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Form Edit Portfolio</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('portfolios.index') }}">Portfolio</a></li>
                        <li class="breadcrumb-item active">Edit Portfolio</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Data Portfolio</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('portfolios.update', $portfolio->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Judul Portfolio -->
                        <div class="form-group">
                            <label for="title">Judul Portfolio</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $portfolio->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Gambar Portfolio -->
                        <div class="form-group">
                            <label for="image">Gambar Portfolio</label>
                            <input type="file" name="image" id="image"
                                class="form-control-file @error('image') is-invalid @enderror">
                            @if ($portfolio->image)
                                <p class="mt-2">Gambar Saat Ini:</p>
                                <img src="{{ asset('storage/' . $portfolio->image) }}" alt="Image" width="150px">
                            @endif
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('portfolios.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@include('layouts.admin.alert')
