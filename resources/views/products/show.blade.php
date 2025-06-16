<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('products.index') }}" class="text-indigo-600 hover:text-indigo-900 mb-4 inline-block">&larr; Back to Products</a>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            @if($product->image_url)
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-auto object-cover rounded-lg shadow-md mb-4">
                            @else
                                <div class="w-full h-64 bg-gray-200 flex items-center justify-center rounded-lg shadow-md mb-4">
                                    <span class="text-gray-500">No Image Available</span>
                                </div>
                            @endif
                        </div>
                        <div>
                            <h3 class="text-2xl font-semibold mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-600 text-sm mb-1"><strong>Brand:</strong> {{ $product->brand }}</p>
                            <p class="text-2xl font-bold text-indigo-600 my-2">${{ number_format($product->price, 2) }}</p>
                            <p class="text-gray-700 mb-4">{{ $product->description }}</p>

                            <h4 class="font-semibold mt-4 mb-2">Specifications:</h4>
                            <ul class="list-disc list-inside text-gray-700 space-y-1">
                                <li><strong>Screen Size:</strong> {{ $product->screen_size }}</li>
                                <li><strong>RAM:</strong> {{ $product->ram }}</li>
                                <li><strong>Storage:</strong> {{ $product->storage }}</li>
                                <li><strong>Color:</strong> {{ $product->color }}</li>
                                <li><strong>Operating System:</strong> {{ $product->operating_system }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
