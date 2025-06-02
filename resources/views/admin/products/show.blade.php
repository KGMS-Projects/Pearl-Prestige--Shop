<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - Manage Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <style>
        .btn-luxury {
            background-color: black;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            transition: background-color 0.3s;
        }

        .btn-luxury:hover {
            background-color: #333;
        }

        .product-card {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .product-card:hover {
            transform: translateY(-2px);
        }

        .status-active {
            background-color: #dcfce7;
            color: #166534;
        }

        .status-inactive {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .featured-yes {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .featured-no {
            background-color: #f3f4f6;
            color: #4b5563;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans antialiased">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex justify-between items-center">
                <div class="flex items-center">
                    <button onclick="window.history.back()" class="mr-4 text-gray-600 hover:text-gray-900">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </button>
                    <h1 class="text-3xl font-bold text-gray-900">Manage Products</h1>
                </div>
                <div>
                    <a href="{{ route('admin.products.create') }}" class="btn-luxury flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add Product
                    </a>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <!-- Flash Messages -->
                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    {{ session('error') }}
                </div>
                @endif

                <!-- Category Sections -->
                <div class="space-y-8">
                    <!-- Women's Products -->
                    <div class="product-section">
                        <h2 class="text-2xl font-bold mb-4 pb-2 border-b border-gray-200">Women's Products</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($products->where('category.name', 'Women') as $product)
                            <div class="product-card p-4">
                                <div class="flex items-start space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="w-16 h-16 bg-gray-200 rounded-lg overflow-hidden">
                                            @if($product->images && count($product->images) > 0)
                                            <img src="{{ $product->images[0] }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                            @else
                                            <div class="w-full h-full bg-gray-300 flex items-center justify-center">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-lg font-medium text-gray-900 truncate">{{ $product->name }}</h3>
                                        <p class="text-sm text-gray-500">{{ $product->sku }}</p>
                                        <div class="mt-2 flex items-center justify-between">
                                            <span class="text-lg font-semibold">${{ number_format($product->price, 2) }}</span>
                                            <span class="text-sm {{ $product->stock_quantity <= 5 ? 'text-red-600' : 'text-gray-600' }}">
                                                {{ $product->stock_quantity }} in stock
                                            </span>
                                        </div>
                                        <div class="mt-2 flex items-center space-x-2">
                                            <span class="px-2 py-1 text-xs rounded-full {{ $product->is_active ? 'status-active' : 'status-inactive' }}">
                                                {{ $product->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                            <span class="px-2 py-1 text-xs rounded-full {{ $product->is_featured ? 'featured-yes' : 'featured-no' }}">
                                                {{ $product->is_featured ? 'Featured' : 'Standard' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 flex justify-end space-x-2">
                                    <a href="{{ route('admin.products.show', $product) }}" class="text-sm text-blue-600 hover:text-blue-800">View</a>
                                    <a href="{{ route('admin.products.edit', $product) }}" class="text-sm text-indigo-600 hover:text-indigo-800">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm text-red-600 hover:text-red-800" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Men's Products -->
                    <div class="product-section">
                        <h2 class="text-2xl font-bold mb-4 pb-2 border-b border-gray-200">Men's Products</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($products->where('category.name', 'Men') as $product)
                            <div class="product-card p-4">
                                <div class="flex items-start space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="w-16 h-16 bg-gray-200 rounded-lg overflow-hidden">
                                            @if($product->images && count($product->images) > 0)
                                            <img src="{{ $product->images[0] }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                            @else
                                            <div class="w-full h-full bg-gray-300 flex items-center justify-center">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-lg font-medium text-gray-900 truncate">{{ $product->name }}</h3>
                                        <p class="text-sm text-gray-500">{{ $product->sku }}</p>
                                        <div class="mt-2 flex items-center justify-between">
                                            <span class="text-lg font-semibold">${{ number_format($product->price, 2) }}</span>
                                            <span class="text-sm {{ $product->stock_quantity <= 5 ? 'text-red-600' : 'text-gray-600' }}">
                                                {{ $product->stock_quantity }} in stock
                                            </span>
                                        </div>
                                        <div class="mt-2 flex items-center space-x-2">
                                            <span class="px-2 py-1 text-xs rounded-full {{ $product->is_active ? 'status-active' : 'status-inactive' }}">
                                                {{ $product->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                            <span class="px-2 py-1 text-xs rounded-full {{ $product->is_featured ? 'featured-yes' : 'featured-no' }}">
                                                {{ $product->is_featured ? 'Featured' : 'Standard' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 flex justify-end space-x-2">
                                    <a href="{{ route('admin.products.show', $product) }}" class="text-sm text-blue-600 hover:text-blue-800">View</a>
                                    <a href="{{ route('admin.products.edit', $product) }}" class="text-sm text-indigo-600 hover:text-indigo-800">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm text-red-600 hover:text-red-800" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Accessories -->
                    <div class="product-section">
                        <h2 class="text-2xl font-bold mb-4 pb-2 border-b border-gray-200">Accessories</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($products->where('category.name', 'Accessories') as $product)
                            <div class="product-card p-4">
                                <div class="flex items-start space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="w-16 h-16 bg-gray-200 rounded-lg overflow-hidden">
                                            @if($product->images && count($product->images) > 0)
                                            <img src="{{ $product->images[0] }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                            @else
                                            <div class="w-full h-full bg-gray-300 flex items-center justify-center">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-lg font-medium text-gray-900 truncate">{{ $product->name }}</h3>
                                        <p class="text-sm text-gray-500">{{ $product->sku }}</p>
                                        <div class="mt-2 flex items-center justify-between">
                                            <span class="text-lg font-semibold">${{ number_format($product->price, 2) }}</span>
                                            <span class="text-sm {{ $product->stock_quantity <= 5 ? 'text-red-600' : 'text-gray-600' }}">
                                                {{ $product->stock_quantity }} in stock
                                            </span>
                                        </div>
                                        <div class="mt-2 flex items-center space-x-2">
                                            <span class="px-2 py-1 text-xs rounded-full {{ $product->is_active ? 'status-active' : 'status-inactive' }}">
                                                {{ $product->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                            <span class="px-2 py-1 text-xs rounded-full {{ $product->is_featured ? 'featured-yes' : 'featured-no' }}">
                                                {{ $product->is_featured ? 'Featured' : 'Standard' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 flex justify-end space-x-2">
                                    <a href="{{ route('admin.products.show', $product) }}" class="text-sm text-blue-600 hover:text-blue-800">View</a>
                                    <a href="{{ route('admin.products.edit', $product) }}" class="text-sm text-indigo-600 hover:text-indigo-800">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm text-red-600 hover:text-red-800" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>