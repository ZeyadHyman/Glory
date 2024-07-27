@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-gray-700 bg-white/80 text-cyan-950 focus:border-indigo-600 focus:ring-indigo-600 rounded-md shadow-sm',
]) !!}>
