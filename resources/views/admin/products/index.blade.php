<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - Manage Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <style>
        .category-section {
            margin-bottom: 3rem;
        }

        .category-heading {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e5e7eb;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .tab-button {
            padding: 12px 24px;
            margin-right: 8px;
            border: 2px solid #e5e7eb;
            background-color: #f9fafb;
            color: #6b7280;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .tab-button:hover {
            background-color: #f3f4f6;
            border-color: #d1d5db;
        }

        .tab-button.active {
            background-color: #1f2937;
            color: white;
            border-color: #1f2937;
        }

        .tabs-container {
            display: flex;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 8px;
        }

        .product-image {
            width: 48px;
            height: 48px;
            border-radius: 8px;
            object-fit: cover;
            border: 2px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .product-image:hover {
            border-color: #9ca3af;
            transform: scale(1.05);
        }

        .image-placeholder {
            width: 48px;
            height: 48px;
            background-color: #f3f4f6;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #e5e7eb;
        }

        .low-stock {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
        }

        .status-badge {
            transition: all 0.3s ease;
        }

        .action-button {
            transition: all 0.2s ease;
        }

        .action-button:hover {
            transform: translateY(-1px);
        }
    </style>
</head>

<body class="bg-gray-100 font-sans antialiased">

    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex justify-between items-center">
                <div class="flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="mr-4 text-gray-600 hover:text-gray-900 transition-colors group flex items-center">
                        <svg class="w-6 h-6 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        <span class="ml-2 text-sm font-medium opacity-0 group-hover:opacity-100 transition-opacity">Admin Panel</span>
                    </a>
                    <h1 class="text-3xl font-bold text-gray-900">Manage Products</h1>
                </div>
                <!-- Stats Summary -->
                <div class="hidden md:flex items-center space-x-4 text-sm text-gray-600">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-green-500 rounded-full mr-1"></div>
                        <span>{{ $products->where('is_active', true)->count() }} Active</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-red-500 rounded-full mr-1"></div>
                        <span>{{ $products->where('stock_quantity', '<=', 5)->count() }} Low Stock</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

                <!-- Add Product Button -->
                <div class="flex justify-between items-center mb-6">
                    <div class="text-sm text-gray-600">
                        Total Products: <span class="font-semibold">{{ $products->count() }}</span>
                    </div>
                    <a href="{{ route('admin.products.create') }}" class="btn-luxury flex items-center px-6 py-3 bg-orange-800 text-white rounded-lg hover:bg-gray-800 transition-all transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add New Product
                    </a>
                </div>

                <!-- Flash Messages -->
                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    {{ session('error') }}
                </div>
                @endif

                <!-- Category Tabs -->
                <div class="tabs-container">
                    <button class="tab-button active" onclick="showTab('women')">
                        <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        Women
                        <span class="ml-2 px-2 py-1 bg-white bg-opacity-20 text-xs rounded-full">
                            {{ $products->filter(fn($p) => $p->category && $p->category->name === 'Women')->count() }}
                        </span>
                    </button>
                    <button class="tab-button" onclick="showTab('men')">
                        <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Men
                        <span class="ml-2 px-2 py-1 bg-white bg-opacity-20 text-xs rounded-full">
                            {{ $products->filter(fn($p) => $p->category && $p->category->name === 'Men')->count() }}
                        </span>
                    </button>
                    <button class="tab-button" onclick="showTab('accessories')">
                        <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                        Accessories
                        <span class="ml-2 px-2 py-1 bg-white bg-opacity-20 text-xs rounded-full">
                            {{ $products->filter(fn($p) => $p->category && $p->category->name === 'Accessories')->count() }}
                        </span>
                    </button>
                </div>

                <!-- Women's Products Section -->
                <div id="women-tab" class="tab-content active">
                    <div class="category-section">
                        <h2 class="category-heading">Women's Products</h2>
                        <div class="bg-white rounded-xl shadow overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Product</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Category</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Price</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Stock</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @php
                                    $womenProducts = $products->filter(function($product) {
                                    return $product->category && $product->category->name === 'Women';
                                    });
                                    @endphp

                                    @forelse($womenProducts as $product)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <!-- Product Image -->
                                                @if($product->images && count($product->images) > 0)
                                                <img
                                                    src="{{ $product->getImageUrl(0) }}"
                                                    alt="{{ $product->name }}"
                                                    class="product-image mr-4">
                                                @else
                                                <div class="image-placeholder mr-4">
                                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                </div>
                                                @endif
                                                <div>
                                                    <div class="text-sm font-semibold text-gray-900">{{ $product->name }}</div>
                                                    <div class="text-xs text-gray-500 font-mono">{{ $product->sku }}</div>
                                                    @if($product->is_featured)
                                                    <div class="mt-1">
                                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">
                                                            ⭐ Featured
                                                        </span>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $product->category->name }}</div>
                                            <div class="text-xs text-gray-500">{{ $product->subcategory->name ?? 'No subcategory' }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">${{ number_format($product->price, 2) }}</div>
                                            @if($product->sale_price)
                                            <div class="text-sm text-red-600 font-semibold">${{ number_format($product->sale_price, 2) }} (Sale)</div>
                                            <div class="text-xs text-green-600">Save ${{ number_format($product->price - $product->sale_price, 2) }}</div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="text-sm font-medium {{ $product->stock_quantity <= 5 ? 'text-red-600 low-stock' : ($product->stock_quantity <= 10 ? 'text-yellow-600' : 'text-gray-900') }}">
                                                {{ $product->stock_quantity }}
                                                @if($product->stock_quantity <= 5)
                                                    <span class="text-xs block text-red-500">Low Stock!</span>
                                            @elseif($product->stock_quantity <= 10)
                                                <span class="text-xs block text-yellow-500">Running Low</span>
                                                @endif
                                                </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1 text-xs rounded-full font-medium status-badge {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $product->is_active ? '✓ Active' : '✗ Inactive' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <div class="flex space-x-3">
                                                <a href="{{ route('admin.products.edit', $product) }}" class="action-button text-indigo-600 hover:text-indigo-800 font-medium">
                                                    ✏️ Edit
                                                </a>
                                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-button text-red-600 hover:text-red-800 font-medium">
                                                        🗑️ Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-12 text-center">
                                            <div class="text-gray-500">
                                                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2M4 13h2m13-4h-2M4 9h2" />
                                                </svg>
                                                <p class="text-lg font-medium">No women's products found</p>
                                                <p class="text-sm text-gray-400 mt-1">Add some women's products to see them here</p>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Men's Products Section -->
                <div id="men-tab" class="tab-content">
                    <div class="category-section">
                        <h2 class="category-heading">Men's Products</h2>
                        <div class="bg-white rounded-xl shadow overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Product</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Category</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Price</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Stock</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @php
                                    $menProducts = $products->filter(function($product) {
                                    return $product->category && $product->category->name === 'Men';
                                    });
                                    @endphp

                                    @forelse($menProducts as $product)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <!-- Product Image -->
                                                @if($product->images && count($product->images) > 0)
                                                <img
                                                    src="{{ $product->getImageUrl(0) }}"
                                                    alt="{{ $product->name }}"
                                                    class="product-image mr-4">
                                                @else
                                                <div class="image-placeholder mr-4">
                                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                </div>
                                                @endif
                                                <div>
                                                    <div class="text-sm font-semibold text-gray-900">{{ $product->name }}</div>
                                                    <div class="text-xs text-gray-500 font-mono">{{ $product->sku }}</div>
                                                    @if($product->is_featured)
                                                    <div class="mt-1">
                                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">
                                                            ⭐ Featured
                                                        </span>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $product->category->name }}</div>
                                            <div class="text-xs text-gray-500">{{ $product->subcategory->name ?? 'No subcategory' }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">${{ number_format($product->price, 2) }}</div>
                                            @if($product->sale_price)
                                            <div class="text-sm text-red-600 font-semibold">${{ number_format($product->sale_price, 2) }} (Sale)</div>
                                            <div class="text-xs text-green-600">Save ${{ number_format($product->price - $product->sale_price, 2) }}</div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="text-sm font-medium {{ $product->stock_quantity <= 5 ? 'text-red-600 low-stock' : ($product->stock_quantity <= 10 ? 'text-yellow-600' : 'text-gray-900') }}">
                                                {{ $product->stock_quantity }}
                                                @if($product->stock_quantity <= 5)
                                                    <span class="text-xs block text-red-500">Low Stock!</span>
                                            @elseif($product->stock_quantity <= 10)
                                                <span class="text-xs block text-yellow-500">Running Low</span>
                                                @endif
                                                </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1 text-xs rounded-full font-medium status-badge {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $product->is_active ? '✓ Active' : '✗ Inactive' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <div class="flex space-x-3">
                                                <a href="{{ route('admin.products.edit', $product) }}" class="action-button text-indigo-600 hover:text-indigo-800 font-medium">
                                                    ✏️ Edit
                                                </a>
                                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-button text-red-600 hover:text-red-800 font-medium">
                                                        🗑️ Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-12 text-center">
                                            <div class="text-gray-500">
                                                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2M4 13h2m13-4h-2M4 9h2" />
                                                </svg>
                                                <p class="text-lg font-medium">No men's products found</p>
                                                <p class="text-sm text-gray-400 mt-1">Add some men's products to see them here</p>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Accessories Section -->
                <div id="accessories-tab" class="tab-content">
                    <div class="category-section">
                        <h2 class="category-heading">Accessories</h2>
                        <div class="bg-white rounded-xl shadow overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Product</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Category</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Price</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Stock</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @php
                                    $accessoryProducts = $products->where('category.name', 'Accessories');
                                    @endphp

                                    @forelse($accessoryProducts as $product)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <!-- Product Image -->
                                                @if($product->images && count($product->images) > 0)
                                                <img
                                                    src="{{ $product->getImageUrl(0) }}"
                                                    alt="{{ $product->name }}"
                                                    class="product-image mr-4">
                                                @else
                                                <div class="image-placeholder mr-4">
                                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                </div>
                                                @endif
                                                <div>
                                                    <div class="text-sm font-semibold text-gray-900">{{ $product->name }}</div>
                                                    <div class="text-xs text-gray-500 font-mono">{{ $product->sku }}</div>
                                                    @if($product->is_featured)
                                                    <div class="mt-1">
                                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">
                                                            ⭐ Featured
                                                        </span>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $product->category->name }}</div>
                                            <div class="text-xs text-gray-500">{{ $product->subcategory->name ?? 'No subcategory' }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">${{ number_format($product->price, 2) }}</div>
                                            @if($product->sale_price)
                                            <div class="text-sm text-red-600 font-semibold">${{ number_format($product->sale_price, 2) }} (Sale)</div>
                                            <div class="text-xs text-green-600">Save ${{ number_format($product->price - $product->sale_price, 2) }}</div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="text-sm font-medium {{ $product->stock_quantity <= 5 ? 'text-red-600 low-stock' : ($product->stock_quantity <= 10 ? 'text-yellow-600' : 'text-gray-900') }}">
                                                {{ $product->stock_quantity }}
                                                @if($product->stock_quantity <= 5)
                                                    <span class="text-xs block text-red-500">Low Stock!</span>
                                            @elseif($product->stock_quantity <= 10)
                                                <span class="text-xs block text-yellow-500">Running Low</span>
                                                @endif
                                                </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1 text-xs rounded-full font-medium status-badge {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $product->is_active ? '✓ Active' : '✗ Inactive' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <div class="flex space-x-3">
                                                <a href="{{ route('admin.products.edit', $product) }}" class="action-button text-indigo-600 hover:text-indigo-800 font-medium">
                                                    ✏️ Edit
                                                </a>
                                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-button text-red-600 hover:text-red-800 font-medium">
                                                        🗑️ Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-12 text-center">
                                            <div class="text-gray-500">
                                                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2M4 13h2m13-4h-2M4 9h2" />
                                                </svg>
                                                <p class="text-lg font-medium">No accessories found</p>
                                                <p class="text-sm text-gray-400 mt-1">Add some accessories to see them here</p>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function showTab(tabName) {
            // Hide all tab contents
            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(content => {
                content.classList.remove('active');
            });

            // Remove active class from all tab buttons
            const tabButtons = document.querySelectorAll('.tab-button');
            tabButtons.forEach(button => {
                button.classList.remove('active');
            });

            // Show the selected tab content
            const selectedTab = document.getElementById(tabName + '-tab');
            if (selectedTab) {
                selectedTab.classList.add('active');
            }

            // Add active class to the clicked button
            const clickedButton = event.target.closest('.tab-button');
            if (clickedButton) {
                clickedButton.classList.add('active');
            }

            // Update URL hash for bookmarking
            window.location.hash = tabName;
        }

        // Initialize tab from URL hash on page load
        document.addEventListener('DOMContentLoaded', function() {
            const hash = window.location.hash.substring(1);
            if (hash && ['women', 'men', 'accessories'].includes(hash)) {
                // Find and click the appropriate tab button
                const tabButton = document.querySelector(`[onclick="showTab('${hash}')"]`);
                if (tabButton) {
                    // Remove active from all
                    document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
                    document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));

                    // Activate selected
                    tabButton.classList.add('active');
                    document.getElementById(hash + '-tab').classList.add('active');
                }
            }
        });
    </script>

</body>

</html>