@extends('layouts.admin.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Pesan Pengguna</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('contacts.index') }}">Pesan Pengguna</a></li>
                        <li class="breadcrumb-item active">Detail Pesan Pengguna</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pesan dari: {{ $contact->name }}</h3>
                </div>

                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Nama</dt>
                        <dd class="col-sm-9">{{ $contact->name }}</dd>

                        <dt class="col-sm-3">Email</dt>
                        <dd class="col-sm-9">{{ $contact->email }}</dd>

                        <dt class="col-sm-3">Telepon</dt>
                        <dd class="col-sm-9">{{ $contact->telp }}</dd>

                        <dt class="col-sm-3">Layanan</dt>
                        <dd class="col-sm-9">{{ $contact->service->name_service ?? '-' }}</dd>

                        <dt class="col-sm-3">Pesan</dt>
                        <dd class="col-sm-9">{{ $contact->message }}</dd>

                        <dt class="col-sm-3">Tanggal Dikirim</dt>
                        <dd class="col-sm-9">{{ $contact->created_at->format('d M Y') }}</dd>
                    </dl>
                </div>

                <div class="card-footer">
                    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Kembali</a>

                    <button class="btn btn-danger btn-delete" data-id="{{ $contact->id }}">
                        Hapus
                    </button>

                    <form id="delete-form-{{ $contact->id }}" action="{{ route('contacts.destroy', $contact->id) }}"
                        method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.admin.delete-confirmation')
@endsection
@include('layouts.admin.alert')
