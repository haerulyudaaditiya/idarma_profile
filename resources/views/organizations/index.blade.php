@extends('layouts.admin.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Struktur Jabatan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Struktur Jabatan</li>
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
                            <h3 class="card-title">Struktur Jabatan</h3>
                            <a href="{{ route('organizations.create') }}" class="btn btn-primary btn-sm float-right">
                                Tambah Struktur
                            </a>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Jabatan</th>
                                        <th>Atasan Langsung</th>
                                        <th class="no-print">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($organizations as $index => $organization)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $organization->user->name ?? '-' }}</td>
                                            <td>{{ $organization->position->name_position ?? '-' }}</td>
                                            <td>{{ $organization->position->parent?->name_position ?? '-' }}</td>
                                            <td>
                                                <a href="{{ route('organizations.edit', $organization->id) }}"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <button class="btn btn-sm btn-danger btn-delete"
                                                    data-id="{{ $organization->id }}" title="Hapus">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <form id="delete-form-{{ $organization->id }}"
                                                    action="{{ route('organizations.destroy', $organization->id) }}"
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
