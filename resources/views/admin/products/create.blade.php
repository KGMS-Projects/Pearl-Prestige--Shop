<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - Create Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <style>
        .btn-luxury {
            background-color: orangered;
            color: black;
            padding: 0.5rem 1.5rem;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        .btn-luxury:hover {
            background-color: gray;
            color: white;
        }

        .btn-outline-luxury {
            border: 1px solid orangered;
            color: orangered;
            padding: 0.5rem 1.5rem;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-outline-luxury:hover {
            background-color: orangered;
            color: white;
        }

        .form-input {
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            padding: 0.5rem 0.75rem;
            width: 100%;
            transition: border-color 0.2s;
        }

        .form-input:focus {
            outline: none;
            border-color: orangered;
            box-shadow: 0 0 0 1px orangered;
        }

        .form-input-error {
            border-color: #ef4444;
        }

        .section-title {
            font-size: 1.125rem;
            font-weight: 500;
            color: #111827;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .checkbox-style {
            height: 1rem;
            width: 1rem;
            color: orangered;
            border-color: #d1d5db;
            border-radius: 0.25rem;
        }

        .checkbox-style:focus {
            ring-color: orangered;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans antialiased">
    <div class="min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Header with back button -->
            <div class="flex items-center mb-8">
                <a href="{{ route('admin.products') }}" class="text-gray-500 hover:text-gray-700 mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <h1 class="text-2xl font-bold text-gray-900">Create New Product</h1>
            </div>

            <!-- Error Messages -->
            @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                {{ session('error') }}
            </div>
            @endif

            <!-- Form container -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                    @csrf

                    <!-- Image Upload Section -->
                    <div class="mb-8">
                        <h2 class="section-title">Product Images</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Main Image *</label>
                                <input type="file" name="images[]" accept="image/*" class="form-input @error('images.0') form-input-error @enderror" required>
                                @error('images.0')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Additional Image 1</label>
                                <input type="file" name="images[]" accept="image/*" class="form-input">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Additional Image 2</label>
                                <input type="file" name="images[]" accept="image/*" class="form-input">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Additional Image 3</label>
                                <input type="file" name="images[]" accept="image/*" class="form-input">
                            </div>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">First image will be the main product image. Maximum file size: 2MB each.</p>
                    </div>

                    <!-- Product Details Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <!-- Product Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Product Name *</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="form-input @error('name') form-input-error @enderror" required>
                            @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- SKU -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">SKU *</label>
                            <input type="text" name="sku" value="{{ old('sku') }}" placeholder="e.g., PROD001"
                                class="form-input @error('sku') form-input-error @enderror" required>
                            @error('sku')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Price *</label>
                            <input type="number" step="0.01" name="price" value="{{ old('price') }}" placeholder="0.00"
                                class="form-input @error('price') form-input-error @enderror" required>
                            @error('price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Sale Price -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Sale Price</label>
                            <input type="number" step="0.01" name="sale_price" value="{{ old('sale_price') }}" placeholder="0.00"
                                class="form-input @error('sale_price') form-input-error @enderror">
                            @error('sale_price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                            <select name="category_id" class="form-input @error('category_id') form-input-error @enderror" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Subcategory -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Subcategory *</label>
                            <select name="subcategory_id" class="form-input @error('subcategory_id') form-input-error @enderror" required>
                                <option value="">Select Subcategory</option>
                                @foreach($categories as $category)
                                @foreach($category->subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}" {{ old('subcategory_id') == $subcategory->id ? 'selected' : '' }}>
                                    {{ $category->name }} - {{ $subcategory->name }}
                                </option>
                                @endforeach
                                @endforeach
                            </select>
                            @error('subcategory_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Stock Quantity -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Stock Quantity *</label>
                            <input type="number" name="stock_quantity" value="{{ old('stock_quantity', 0) }}"
                                class="form-input @error('stock_quantity') form-input-error @enderror" required>
                            @error('stock_quantity')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Short Description -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Short Description</label>
                            <input type="text" name="short_description" value="{{ old('short_description') }}"
                                placeholder="Brief product description"
                                class="form-input @error('short_description') form-input-error @enderror">
                            @error('short_description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-8">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                        <textarea name="description" rows="4" placeholder="Detailed product description"
                            class="form-input @error('description') form-input-error @enderror" required>{{ old('description') }}</textarea>
                        @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Variants Section -->
                    <div class="mb-8">
                        <h2 class="section-title">Product Variants</h2>

                        <!-- Sizes -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Sizes</label>
                            <input type="text" name="sizes_string" value="{{ old('sizes_string') }}"
                                placeholder="XS, S, M, L, XL or 39, 40, 41, 42"
                                class="form-input">
                            <p class="mt-1 text-sm text-gray-500">Enter sizes separated by commas</p>
                        </div>

                        <!-- Colors -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Colors</label>
                            <input type="text" name="colors_string" value="{{ old('colors_string') }}"
                                placeholder="Black, White, Navy, Red"
                                class="form-input">
                            <p class="mt-1 text-sm text-gray-500">Enter colors separated by commas</p>
                        </div>
                    </div>

                    <!-- Status Toggles -->
                    <div class="flex flex-wrap gap-6 mb-8">
                        <div class="flex items-center">
                            <input type="checkbox" name="is_featured" id="is_featured" value="1"
                                {{ old('is_featured') ? 'checked' : '' }}
                                class="checkbox-style">
                            <label for="is_featured" class="ml-2 block text-sm text-gray-700">Featured Product</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" value="1"
                                {{ old('is_active', true) ? 'checked' : '' }}
                                class="checkbox-style">
                            <label for="is_active" class="ml-2 block text-sm text-gray-700">Active</label>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-between border-t pt-6">
                        <a href="{{ route('admin.products') }}" class="btn-outline-luxury">Cancel</a>
                        <button type="submit" class="btn-luxury">Create Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>