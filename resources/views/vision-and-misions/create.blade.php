@extends('layouts.admin.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Form Tambah Visi & Misi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('vision-and-misions.index') }}">Visi & Misi</a></li>
                    <li class="breadcrumb-item active">Tambah Visi & Misi</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Visi & Misi</h3>
                    </div>

                    <form action="{{ route('vision-and-misions.store') }}" method="POST">
                        @csrf
                        <div class="card-body">

                            <!-- Visi -->
                            <div class="form-group">
                                <label for="vision">Visi</label>
                                <textarea name="vision" id="vision"
                                    class="form-control summernote @error('vision') is-invalid @enderror"
                                    placeholder="Tulis visi organisasi...">{{ old('vision') }}</textarea>
                                @error('vision')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Misi -->
                            <div class="form-group">
                                <label for="mision">Misi</label>
                                <textarea name="mision" id="mision"
                                    class="form-control summernote @error('mision') is-invalid @enderror"
                                    placeholder="Tulis misi organisasi...">{{ old('mision') }}</textarea>
                                @error('mision')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('vision-and-misions.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@include('layouts.admin.alert')

@push('styles')
<!-- Summernote CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush

@push('scripts')
<!-- Summernote JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['view', ['fullscreen', 'codeview']],
            ]
        });
    });
</script>
@endpush
