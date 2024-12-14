@extends('layouts.layout')

@push('head')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush

@section('content')
    <main class="bg-blue-50 w-full min-h-screen flex flex-col items-center justify-center">

        <section class="bg-white p-6 rounded-lg border-2 border-blue-100 shadow w-full max-w-xl">


            <h1 class="font-extrabold text-3xl text-primary">{{ $title }}</h1>

            @error('login')
                <div x-data="{ isClose: false }" x-show="!isClose"
                    class="mt-4 bg-red-100 border-2 border-red-200 text-red-600 p-3 rounded flex justify-between">
                    <span>Login gagal.</span>
                    <box-icon @click="isClose = true" class="fill-red-600 cursor-pointer" name='x'></box-icon>
                </div>
            @enderror


            <form action="{{ route('register.post') }}" method="POST" class="flex flex-col gap-2 mt-6">
                @csrf

                <x-textfield name="nama" label="Nama Anda" placeholder="Nama Anda" />
                <x-textfield name="nama_pengguna" label="Nama Pengguna" placeholder="Nama Pengguna" />
                <x-textfield name="password" label="Password" placeholder="Password" type="password" />
                <x-textfield name="konfirmasi_password" label="Konfirmasi Password" placeholder="Konfirmasi Password"
                    type="password" />
                <p>Sudah punya akun? <a href="{{ route('login') }}"
                        class="font-semibold text-primary hover:underline">Login</a>
                </p>
                <div class="g-recaptcha mt-2" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                @error('g-recaptcha-response')
                    <p class="text-red-600">ReCaptcha wajib diisi.</p>
                @enderror
                <x-button class="w-full mt-2">Register</x-button>
            </form>
        </section>

        <a href="/" class="text-blue-500 hover:underline text-start w-full max-w-xl mt-4 max-sm:pl-4 max-sm:pb-4">
            Kembali Halaman Beranda
        </a>

    </main>

    <script>
        function resizeRecaptcha() {
            const recaptchaWidget = document.querySelector('.g-recaptcha');
            if (recaptchaWidget) {
                // Get the parent width
                const containerWidth = recaptchaWidget.parentElement.offsetWidth;

                // Define the default reCAPTCHA width
                const reCaptchaWidth = 305; // Default reCAPTCHA width in pixels
                const scale = Math.min(containerWidth / reCaptchaWidth, 1); // Ensure the scale does not exceed 1

                // Apply the scale to the widget
                recaptchaWidget.style.transform = `scale(${scale})`;
                recaptchaWidget.style.transformOrigin = '0 0';
                recaptchaWidget.style.width = `${reCaptchaWidth * scale}px`;
                recaptchaWidget.style.height = `${78 * scale}px`; // Default reCAPTCHA height
            }
        }

        // Run the function on load and on resize
        window.onload = resizeRecaptcha;
        window.onresize = resizeRecaptcha;
    </script>
@endsection
