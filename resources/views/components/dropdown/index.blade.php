@if ($label ?? false)
    <label for="{{ $label }}" class="text-black font-medium text-lg">{{ $label }}</label>
@endif
<select name="{{ $name }}" class="bg-gray-100 border rounded-lg p-2">
    @if ($label ?? false)
        <option selected disabled>{{ $label }}</option>
    @endif
    {{ $slot }}
</select>
@error($attributes->get('name'))
    <p class="text-red-600">{{ $message }}</p>
@enderror
