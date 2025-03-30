@extends('layouts.admin.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Berita</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Berita</a></li>
                        <li class="breadcrumb-item active">Detail Berita</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $news->title }}</h3>
                </div>

                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Judul</dt>
                        <dd class="col-sm-9">{{ $news->title }}</dd>

                        <dt class="col-sm-3">Kategori</dt>
                        <dd class="col-sm-9">{{ $news->category->name_category ?? '-' }}</dd>

                        <dt class="col-sm-3">Tags</dt>
                        <dd class="col-sm-9">
                            @forelse ($news->tags as $tag)
                                <span class="badge bg-primary">{{ $tag->name_tag }}</span>
                            @empty
                                <span class="text-muted">-</span>
                            @endforelse
                        </dd>

                        <dt class="col-sm-3">Isi Berita</dt>
                        <dd class="col-sm-9">{!! $news->content !!}</dd>

                        <dt class="col-sm-3">Gambar Cover</dt>
                        <dd class="col-sm-9">
                            @if ($news->cover)
                                <img src="{{ asset('storage/' . $news->cover) }}" alt="Cover" width="200">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </dd>

                        <dt class="col-sm-3">Tanggal Dibuat</dt>
                        <dd class="col-sm-9">{{ $news->created_at->format('d M Y') }}</dd>
                    </dl>

                    <!-- Komentar Pengguna -->
                    <hr>
                    <h5 class="mb-3">Komentar Pengguna</h5>

                    @forelse ($news->comments->whereNull('parent_id') as $comment)
                        <div class="card mb-4"
                            style="background-color: #dfdede; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);">
                            <div class="card-body">
                                {{-- Header Komentar --}}
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex flex-column">
                                        <strong class="mb-1">{{ $comment->name }}</strong>
                                        <small class="text-muted">{{ $comment->created_at->format('d M Y H:i') }}</small>
                                    </div>
                                    <form action="{{ route('news-comments.destroy', $comment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-link text-danger p-0" title="Hapus Komentar">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>

                                {{-- Isi Komentar --}}
                                <p class="mb-0">{{ $comment->comment }}</p>

                                {{-- Replies --}}
                                @foreach ($comment->replies as $reply)
                                    <div class="card mt-3 ms-4 border-start"
                                        style="background-color: #f8f9fa; border-left: 4px solid #dee2e6;">
                                        <div class="card-body py-2 px-3">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <div class="d-flex flex-column">
                                                    <strong class="mb-1">{{ $reply->name }}</strong>
                                                    <small
                                                        class="text-muted">{{ $reply->created_at->format('d M Y H:i') }}</small>
                                                </div>
                                                <form action="{{ route('news-comments.destroy', $reply->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-link text-danger p-0"
                                                        title="Hapus Balasan">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <p class="mb-0">{{ $reply->comment }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">Belum ada komentar.</p>
                    @endforelse
                </div>

                <div class="card-footer">
                    <a href="{{ route('news.index') }}" class="btn btn-secondary">Kembali</a>

                    <a href="{{ route('news.edit', $news->id) }}" class="btn btn-warning">Edit</a>

                    <button class="btn btn-danger btn-delete" data-id="{{ $news->id }}">
                        Hapus
                    </button>

                    <form id="delete-form-{{ $news->id }}" action="{{ route('news.destroy', $news->id) }}"
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
