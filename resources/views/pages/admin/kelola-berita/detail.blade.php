@extends('layouts.auth.layout')

@section('content')
    <x-button.back></x-button.back>
    <div class="flex flex-col gap-3">
        <div>
            <h1 class="mt-4">Judul:</h1>
            <h1 class="font-bold text-lg">{{ $berita->judul }}</h1>
        </div>
        <div>
            <h1>Isi:</h1>
            <h1 class="font-bold text-lg">{{ $berita->isi }}</h1>
        </div>
        <div>
            <h1>Gambar:</h1>
            <img class="aspect-[3/2] h-40 object-cover object-center" src="{{ asset('storage/' . $berita->gambar) }}">
        </div>
        <div>
            <h1>Tanggal Dibuat:</h1>
            <h1 class="font-bold text-lg">{{ $berita->created_at }}</h1>
        </div>
    </div>
@endsection
