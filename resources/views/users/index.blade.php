@extends('layouts.admin.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Data Users</li>
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
                            <h3 class="card-title">Data Users</h3>
                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right">Tambah User</a>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th class="no-print">Social</th>
                                        <th class="no-print">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <img src="{{ $user->img ? asset('storage/' . $user->img) : asset('assets/img/team/user.png') }}"
                                                    alt="User Photo" style="width: 50px; height: 50px; border-radius: 50%;">
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <span
                                                    class="badge badge-{{ $user->role === 'admin' ? 'danger' : 'secondary' }}">
                                                    {{ ucfirst($user->role) }}
                                                </span>
                                            </td>
                                            <td>
                                                @if ($user->twiter)
                                                    <a href="{{ $user->twiter }}" target="_blank" rel="noopener noreferrer">
                                                        <i class="fab fa-twitter"></i>
                                                    </a>
                                                @endif
                                                @if ($user->facebok)
                                                    <a href="{{ $user->facebok }}" target="_blank"
                                                        rel="noopener noreferrer">
                                                        <i class="fab fa-facebook"></i>
                                                    </a>
                                                @endif
                                                @if ($user->instagram)
                                                    <a href="{{ $user->instagram }}" target="_blank"
                                                        rel="noopener noreferrer">
                                                        <i class="fab fa-instagram"></i>
                                                    </a>
                                                @endif
                                                @if ($user->linkedin)
                                                    <a href="{{ $user->linkedin }}" target="_blank"
                                                        rel="noopener noreferrer">
                                                        <i class="fab fa-linkedin"></i>
                                                    </a>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <button class="btn btn-sm btn-danger btn-delete"
                                                    data-id="{{ $user->id }}" title="Hapus">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <form id="delete-form-{{ $user->id }}"
                                                    action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                    style="display: none;">
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
