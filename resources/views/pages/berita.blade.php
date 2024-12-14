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
@endsection
