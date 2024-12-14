@extends('layouts.auth.layout')

@section('content')
    <x-button.back></x-button.back>
    <div class="flex flex-col gap-3">
        <div>
            <h1 class="mt-4">Nama:</h1>
            <h1 class="font-bold text-lg">{{ $pegawai->nama }}</h1>
        </div>
        <div>
            <h1>Nama Pengguna:</h1>
            <h1 class="font-bold text-lg">{{ $pegawai->nama_pengguna }}</h1>
        </div>
        <div>
            <h1>Tanggal Dibuat:</h1>
            <h1 class="font-bold text-lg">{{ $pegawai->created_at }}</h1>
        </div>
    </div>
@endsection
