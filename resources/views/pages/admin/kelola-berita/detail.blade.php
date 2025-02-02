@extends('layouts.auth.layout')

@section('content')
    <x-button.back></x-button.back>
    <div class="flex flex-col gap-3">
        <div>
            <h1 class="mt-4 font-bold text-lg">Judul:</h1>
            <h1>{{ $berita->judul }}</h1>
        </div>
        <div>
            <h1 class="font-bold text-lg">Isi:</h1>
            <h1 class="text-lg">{{ $berita->isi }}</h1>
        </div>
        <div>
            <h1 class="font-bold text-lg">Gambar:</h1>
            <a href="{{ asset('storage/' . $berita->gambar) }}" target="_blank">
                <img class="w-60 object-cover object-center rounded-md" src="{{ asset('storage/' . $berita->gambar) }}">
            </a>
        </div>
        <div>
            <h1 class="font-bold text-lg">Tanggal Dibuat:</h1>
            <h1>{{ $berita->created_at }}</h1>
        </div>
    </div>
@endsection
