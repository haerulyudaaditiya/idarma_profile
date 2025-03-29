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
                    <h5>Komentar Pengguna</h5>

                    @forelse ($news->comments->whereNull('parent_id') as $comment)
                        <div class="border rounded p-3 mb-3">
                            <strong>{{ $comment->name }}</strong>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    {{ $comment->created_at->format('d M Y H:i') }}
                                </small>
                                <form action="{{ route('news-comments.destroy', $comment->id) }}" method="POST"
                                    class="ms-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-link text-danger btn-delete"
                                        title="Hapus Komentar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                            <p class="mb-1 mt-2">{{ $comment->comment }}</p>

                            {{-- Balasan Komentar --}}
                            @foreach ($comment->replies as $reply)
                                <div class="ms-4 mt-2 p-2 border-start bg-light">
                                    <strong>{{ $reply->name }}</strong>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            {{ $reply->created_at->format('d M Y H:i') }}
                                        </small>
                                        <form action="{{ route('news-comments.destroy', $reply->id) }}" method="POST"
                                            class="ms-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-link text-danger btn-delete"
                                                title="Hapus Komentar Balasan">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <p class="mb-1 mt-2">{{ $reply->comment }}</p>
                                </div>
                            @endforeach
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
