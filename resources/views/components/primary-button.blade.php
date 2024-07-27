<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-green-500 border-transparent rounded-md font-semibold text-xs text-zinc-50 uppercase tracking-widest hover:bg-green-400 focus:bg-white active:bg-gray-300 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
