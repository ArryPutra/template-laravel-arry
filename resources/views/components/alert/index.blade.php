@php
    $type = $type ?? 'error';

    switch ($type) {
        case 'error':
            $type = 'bg-red-100 border-red-200 text-red-600';
            $closeButtonColor = 'fill-red-600';
            break;
        case 'success':
            $type = 'bg-green-100 border-green-200 text-green-600';
            $closeButtonColor = 'fill-green-600';
            break;
    }
@endphp

<div x-data="{ isClose: false }" x-show="!isClose" class="{{ $type }} mt-4 border-2 p-3 rounded flex justify-between">
    <span>{{ $slot }}</span>
    <box-icon @click="isClose = true" class="cursor-pointer {{ $closeButtonColor }}" name='x'></box-icon>
</div>
