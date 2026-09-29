@extends('welcome')


@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <article class="card shadow-sm border-0">
                <img src="{{ asset('berita/'.$berita->foto) }}" class="card-img-top rounded-top"
                    alt="{{ $berita->judul }}">

                <div class="card-body p-4">
                    <h2 class="fw-bold mb-3">{{ $berita->judul }}</h2>

                    <div class="d-flex align-items-center mb-3 text-muted">
                        <i class="fa fa-user me-2"></i> {{ $berita->user->nama }}
                        <span class="mx-2">|</span>
                        <i class="fa fa-calendar me-2"></i> {{ $berita->created_at->format('d M Y') }}
                    </div>

                    <div class="border-top pt-3">
                        {!! nl2br(e($berita->isi)) !!}
                    </div>
                </div>
            </article>

            <div class="text-center mt-4">
                <a href="{{ url('/') }}" class="btn btn-outline-secondary rounded-pill">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection