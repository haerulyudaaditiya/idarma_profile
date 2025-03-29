@extends('layouts.admin.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Testimoni</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Testimoni</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Testimoni</h3>
                            <a href="{{ route('testimonials.create') }}" class="btn btn-primary btn-sm float-right">Tambah
                                Testimoni</a>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Rating</th>
                                        <th>Komentar</th>
                                        <th class="no-print">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testimonials as $index => $testimonial)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $testimonial->name }}</td>
                                            <td>
                                                @for ($i = 0; $i < $testimonial->rating; $i++)
                                                    <i class="fas fa-star text-warning"></i>
                                                @endfor
                                            </td>
                                            <td>{{ \Illuminate\Support\Str::limit(strip_tags($testimonial->comment), 100, '...') }}
                                            </td>
                                            <td>
                                                <a href="{{ route('testimonials.edit', $testimonial->id) }}"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <button class="btn btn-sm btn-danger btn-delete"
                                                    data-id="{{ $testimonial->id }}" title="Hapus">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <form id="delete-form-{{ $testimonial->id }}"
                                                    action="{{ route('testimonials.destroy', $testimonial->id) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    @include('layouts.admin.delete-confirmation')
@endsection
@include('layouts.admin.alert')
