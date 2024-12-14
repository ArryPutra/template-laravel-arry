<div class="flex flex-col">
    @if ($label ?? false)
        <label for="{{ $label }}" class="text-black font-medium text-lg mb-2">{{ $label }}</label>
    @endif
    <input id="{{ $name }}" type="{{ $attributes->get('type') ?? 'text' }}"
        placeholder="{{ $attributes->get('placeholder') }}" name="{{ $attributes->get('name') }}"
        value="{{ $attributes->get('value') }}"
        class="w-full px-3 py-2 bg-gray-100 outline-none rounded-lg focus:ring-4 duration-150 {{ $attributes->get('class') }}">
    @error($attributes->get('name'))
        <p class="text-red-600 mt-2">{{ $message }}</p>
    @enderror
</div>
