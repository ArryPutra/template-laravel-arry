{{-- 

    COPY:
    
    <section class="w-full flex justify-center">
        <span id="berita" class="absolute -translate-y-20"></span>
        <div class="w-full max-w-4xl flex flex-col p-8 max-sm:p-4">
            <h1 class="text-3xl font-bold text-primary w-fit mb-8">
                Berita Kami
                <div class="w-3/4 h-1 bg-primary mt-2"></div>
            </h1>
            // Code here ....
        </div>
    </section>

--}}

@php
    use Carbon\Carbon;
@endphp

@extends('layouts.layout')

@section('content')
    @include('layouts.header')

    <main class="pt-20">
        <section class="w-full flex justify-center p-8 max-sm:p-4">
            <div class="w-full max-w-4xl flex flex-col">
                <x-button.back class="w-fit mb-4" />
                <div class="aspect-[3/1.75] flex rounded-2xl overflow-hidden">
                    <img class="w-full h-full object-cover object-center hover:scale-110 duration-300"
                        src="{{ '/storage/' . $berita->gambar }}">
                </div>
                <h1 class="text-gray-500 text-sm mt-2">
                    {{ Carbon::parse($berita->created_at)->translatedFormat('d F Y H:i:s') }}
                </h1>
                <h1 class="text-2xl font-bold mt-4 mb-2">{{ $berita->judul }}</h1>
                <p>
                    {!! $berita->isi !!}
                </p>

                <div id="disqus_thread"></div>
            </div>
        </section>
    </main>
@endsection
