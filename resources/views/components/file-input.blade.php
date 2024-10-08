
<input
    {{ $attributes }}
    type="file"
    wire:model{!! $attributes->wire('model')->value !!}
    name="{{ $attributes->get('name') }}"
    id="{{ $attributes->get('id') }}"
    {{ $attributes->get('required') ? 'required' : '' }}
    {{ $attributes->get('disabled') ? 'disabled' : '' }}
    class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
>