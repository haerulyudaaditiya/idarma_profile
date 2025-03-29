@extends('layouts.admin.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Visi & Misi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Visi & Misi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Visi & Misi</h3>

                    @if ($visions->count() == 0)
                        <a href="{{ route('vision-and-misions.create') }}"
                            class="btn btn-primary btn-sm float-right">Tambah</a>
                    @endif
                </div>

                <div class="card-body">
                    @forelse ($visions as $vision)
                        <div class="mb-4">
                            <h5><strong>Visi:</strong></h5>
                            <p>{!! strip_tags($vision->vision, '<ul><ol><li><p><strong><em><br>') !!}</p>

                            <h5><strong>Misi:</strong></h5>
                            <p>{!! strip_tags($vision->mision, '<ul><ol><li><p><strong><em><br>') !!}</p>

                            <div class="mt-3">
                                <a href="{{ route('vision-and-misions.edit', $vision->id) }}"
                                    class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $vision->id }}">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>

                                <form id="delete-form-{{ $vision->id }}"
                                    action="{{ route('vision-and-misions.destroy', $vision->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                        <hr>
                    @empty
                        <p>Belum ada data visi & misi.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </section>
    @include('layouts.admin.delete-confirmation')
@endsection

@include('layouts.admin.alert')
