@extends('layouts.admin.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Berita</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Berita</li>
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
                            <h3 class="card-title">Data Berita</h3>
                            <a href="{{ route('news.create') }}" class="btn btn-primary btn-sm float-right">Tambah
                                Berita</a>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Tag</th>
                                        <th>Cover</th>
                                        <th>Isi</th>
                                        <th class="no-print">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->category->name_category ?? '-' }}</td>
                                            <td>
                                                @forelse ($item->tags as $tag)
                                                    <span class="badge bg-info">{{ $tag->name_tag }}</span>
                                                @empty
                                                    <span class="text-muted">-</span>
                                                @endforelse
                                            </td>
                                            <td>
                                                <img src="{{ asset('storage/' . $item->cover) }}" alt="Cover"
                                                    width="60" class="img-thumbnail">
                                            </td>
                                            <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->content), 100, '...') }}
                                            </td>
                                            <td>
                                                <a href="{{ route('news.show', $item->id) }}" class="btn btn-sm btn-info"
                                                    title="Detail">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                <button class="btn btn-sm btn-danger btn-delete"
                                                    data-id="{{ $item->id }}" title="Hapus">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <form id="delete-form-{{ $item->id }}"
                                                    action="{{ route('news.destroy', $item->id) }}" method="POST"
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
