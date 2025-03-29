@extends('layouts.admin.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Form Edit Jabatan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('positions.index') }}">Jabatan</a></li>
                        <li class="breadcrumb-item active">Edit Jabatan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <section class="content">
        <div class="container-fluid">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Data Jabatan</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('positions.update', $position->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Name Position -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_position">Nama Jabatan</label>
                                    <input type="text" name="name_position" id="name_position"
                                        class="form-control @error('name_position') is-invalid @enderror"
                                        value="{{ old('name_position', $position->name_position) }}" required>
                                    @error('name_position')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Serial -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="serial">Serial</label>
                                    <input type="text" name="serial" id="serial"
                                        class="form-control @error('serial') is-invalid @enderror"
                                        value="{{ old('serial', $position->serial) }}" required>
                                    @error('serial')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Structure (Dropdown Atasan Langsung) -->
                        <div class="form-group">
                            <label for="structure">Atasan Langsung (Struktur)</label>
                            <select name="structure" id="structure"
                                class="form-control @error('structure') is-invalid @enderror">
                                <option value="">-- Tidak Ada Atasan --</option>
                                @foreach ($availableStructures as $parent)
                                    <option value="{{ $parent->serial }}"
                                        {{ old('structure', $position->structure) == $parent->serial ? 'selected' : '' }}>
                                        {{ $parent->name_position }} ({{ $parent->serial }})
                                    </option>
                                @endforeach
                            </select>
                            @error('structure')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('positions.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@include('layouts.admin.alert')
