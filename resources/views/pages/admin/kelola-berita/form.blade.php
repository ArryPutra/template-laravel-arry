@extends('layouts.auth.layout')

@section('content')
    <x-button.back href="{{ route('kelola-berita.index') }}" />
    <form action="{{ $route['action'] }}" method="POST" enctype="multipart/form-data"
        class="flex bg-white rounded-lg flex-col gap-2 mt-4">
        @csrf
        @method($route['method'])
        <x-textfield name="judul" value="{{ old('judul', $berita->judul ?? '') }}" placeholder="Masukkan judul berita"
            label="Judul Berita" />
        <x-textfield.area name="isi" value="{{ old('isi', $berita->isi ?? '') }}" placeholder="Masukkan isi berita"
            label="Isi Berita" />
        <x-file-input name="gambar" label="Unggah Gambar" />
        <x-button type="submit" class="w-fit mt-2">
            @if ($route['method'] == 'POST')
                Tambah
            @else
                Perbarui
            @endif
            Berita
        </x-button>
    </form>
@endsection
