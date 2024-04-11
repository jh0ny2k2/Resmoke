<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black']) }}>
    {{ $slot }}
</button>
