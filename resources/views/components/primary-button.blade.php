<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-black focus:ring-0 focus:outline-none font-medium text-md px-4 py-2 text-center bg-gray-100 hover:bg-black hover:text-orange-500']) }}>
    {{ $slot }}
</button>
