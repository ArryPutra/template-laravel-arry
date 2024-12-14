@extends('layouts.auth.layout')

@section('content')
    <x-button.back href="{{ route('kelola-pegawai.index') }}" />
    <form action="{{ $route['action'] }}" method="POST" class="flex bg-white rounded-lg flex-col gap-2 mt-4">
        @csrf
        @method($route['method'])
        <x-textfield name="nama" value="{{ old('nama', $pegawai->nama ?? '') }}" placeholder="Masukkan nama pegawai"
            label="Nama Pegawai" />
        <x-textfield name="nama_pengguna" value="{{ old('nama_pengguna', $pegawai->nama_pengguna ?? '') }}"
            placeholder="Masukkan nama pengguna" label="Nama Pengguna" />
        @if ($route['method'] == 'POST')
            <x-textfield name="password" placeholder="Masukkan password" label="Password" type="password" />
            <x-textfield name="konfirmasi_password" placeholder="Masukkan password" label="Konfirmasi Password"
                type="password" />
        @else
            <x-textfield name="password" placeholder="Masukkan password baru" label="Password Baru" type="password" />
            <x-textfield name="konfirmasi_password" placeholder="Masukkan konfirmasi password baru"
                label="Konfirmasi Password Baru" type="password" />
        @endif
        <x-button type="submit" class="w-fit mt-2">
            @if ($route['method'] == 'POST')
                Tambah
            @else
                Perbarui
            @endif
            Pegawai
        </x-button>
    </form>
@endsection
