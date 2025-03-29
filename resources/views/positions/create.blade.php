@extends('layouts.admin.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Form Tambah Jabatan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('positions.index') }}">Jabatan</a></li>
                        <li class="breadcrumb-item active">Tambah Jabatan</li>
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
                            <h3 class="card-title">Form Tambah Jabatan</h3>
                        </div>

                        <form action="{{ route('positions.store') }}" method="POST">
                            @csrf
                            <div class="card-body">

                                <!-- Nama Jabatan -->
                                <div class="form-group">
                                    <label for="name_position">Nama Jabatan</label>
                                    <input type="text" name="name_position"
                                        class="form-control @error('name_position') is-invalid @enderror" id="name_position"
                                        value="{{ old('name_position') }}" placeholder="Masukkan nama jabatan" required>
                                    @error('name_position')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Serial -->
                                <div class="form-group">
                                    <label for="serial">Serial</label>
                                    <input type="text" name="serial"
                                        class="form-control @error('serial') is-invalid @enderror" id="serial"
                                        value="{{ old('serial') }}" placeholder="Masukkan serial jabatan" required>
                                    @error('serial')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Atasan Langsung -->
                                <div class="form-group">
                                    <label for="structure">Atasan Langsung (Opsional)</label>
                                    <select name="structure" id="structure"
                                        class="form-control @error('structure') is-invalid @enderror">
                                        <option value="">-- Pilih Atasan --</option>
                                        @foreach ($availableStructures as $parent)
                                            <option value="{{ $parent->serial }}"
                                                {{ old('structure') == $parent->serial ? 'selected' : '' }}>
                                                {{ $parent->name_position }} ({{ $parent->serial }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('structure')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('positions.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@include('layouts.admin.alert')
