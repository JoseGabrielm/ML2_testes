<button {{ $attributes->merge(['class' => 'px-4 py-2 font-medium tracking-wide capitalize transition-colors duration-200 transform rounded-md focus:outline-none ']) }}>
    {{ $slot }}
</button>