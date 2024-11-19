<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full py-3 px-6 text-sm tracking-wider font-semibold rounded-md bg-blue-600 hover:bg-blue-700 text-white focus:outline-none']) }}>
    {{ $slot }}
</button>
