@extends('layouts.admin.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Portfolio</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Portfolio</li>
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
                            <h3 class="card-title">Data Portfolio</h3>
                            <a href="{{ route('portfolios.create') }}" class="btn btn-primary btn-sm float-right">Tambah
                                Portfolio</a>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Gambar</th>
                                        <th class="no-print">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($portfolios as $index => $portfolio)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $portfolio->title }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $portfolio->image) }}" alt="Portfolio Image"
                                                    width="100">
                                            </td>
                                            <td>
                                                <a href="{{ route('portfolios.edit', $portfolio->id) }}"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <button class="btn btn-sm btn-danger btn-delete"
                                                    data-id="{{ $portfolio->id }}" title="Hapus">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <form id="delete-form-{{ $portfolio->id }}"
                                                    action="{{ route('portfolios.destroy', $portfolio->id) }}"
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
