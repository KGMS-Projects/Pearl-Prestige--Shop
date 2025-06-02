<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Exception;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard
     */
    public function dashboard()
    {
        try {
            // Handle missing models gracefully
            $stats = [
                'total_products' => class_exists(Product::class) ? Product::count() : 0,
                'total_orders' => class_exists(Order::class) ? Order::count() : 0,
                'total_users' => User::count(),
                'total_revenue' => class_exists(Order::class) ? Order::where('payment_status', 'completed')->sum('total_amount') : 0,
                'pending_orders' => class_exists(Order::class) ? Order::where('status', 'pending')->count() : 0,
                'low_stock_products' => class_exists(Product::class) ? Product::where('stock_quantity', '<=', 5)->count() : 0,
            ];

            $recentOrders = class_exists(Order::class) ?
                Order::with('user')->orderBy('created_at', 'desc')->take(5)->get() :
                collect();

            $lowStockProducts = class_exists(Product::class) ?
                Product::where('stock_quantity', '<=', 5)->orderBy('stock_quantity', 'asc')->take(5)->get() :
                collect();

            return view('admin.dashboard', compact('stats', 'recentOrders', 'lowStockProducts'));
        } catch (Exception $e) {
            Log::error('Admin dashboard error: ' . $e->getMessage());

            // Fallback data if models don't exist yet
            $stats = [
                'total_products' => 0,
                'total_orders' => 0,
                'total_users' => User::count(),
                'total_revenue' => 0,
                'pending_orders' => 0,
                'low_stock_products' => 0,
            ];
            $recentOrders = collect();
            $lowStockProducts = collect();

            return view('admin.dashboard', compact('stats', 'recentOrders', 'lowStockProducts'))
                ->with('warning', 'Some dashboard data could not be loaded. This may be because your database models are not set up yet.');
        }
    }

    // ============ PRODUCT CRUD OPERATIONS ============

    /**
     * Display all products
     */
    public function products()
    {
        try {
            if (!class_exists(Product::class)) {
                return view('admin.products.index', ['products' => collect()])
                    ->with('info', 'Product model not found. Please create your Product model first.');
            }

            $products = Product::with(['category', 'subcategory'])
                ->orderBy('created_at', 'desc')
                ->paginate(100);

            return view('admin.products.index', compact('products'));
        } catch (Exception $e) {
            Log::error('Error loading products: ' . $e->getMessage());
            return view('admin.products.index', ['products' => collect()])
                ->with('error', 'Unable to load products: ' . $e->getMessage());
        }
    }

    /**
     * Show create product form
     */
    public function createProduct()
    {
        try {
            if (!class_exists(Category::class)) {
                return redirect()->route('admin.products')
                    ->with('error', 'Category model not found. Please create your Category model first.');
            }

            $categories = Category::with('subcategories')->where('is_active', true)->get();

            if ($categories->isEmpty()) {
                return redirect()->route('admin.categories.create')
                    ->with('info', 'Please create categories first before adding products.');
            }

            return view('admin.products.create', compact('categories'));
        } catch (Exception $e) {
            Log::error('Error loading create product form: ' . $e->getMessage());
            return redirect()->route('admin.products')
                ->with('error', 'Unable to load create form: ' . $e->getMessage());
        }
    }

    /**
     * Store new product
     */
    public function storeProduct(Request $request)
    {
        try {
            if (!class_exists(Product::class)) {
                return redirect()->route('admin.products')
                    ->with('error', 'Product model not found. Please create your Product model first.');
            }

            // Log the incoming request for debugging
            Log::info('Product creation attempt', [
                'request_data' => $request->except(['images']),
                'has_files' => $request->hasFile('images')
            ]);

            // Validate input
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|min:10',
                'short_description' => 'nullable|string|max:500',
                'price' => 'required|numeric|min:0|max:999999.99',
                'sale_price' => 'nullable|numeric|min:0|max:999999.99|lt:price',
                'sku' => 'required|string|max:50|unique:products,sku',
                'category_id' => 'required|exists:categories,id',
                'subcategory_id' => 'nullable|exists:subcategories,id',
                'stock_quantity' => 'required|integer|min:0|max:999999',
                'sizes_string' => 'nullable|string|max:500',
                'colors_string' => 'nullable|string|max:500',
                'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120' // 5MB max
            ]);

            // Generate unique slug
            $baseSlug = Str::slug($validated['name']);
            $slug = $baseSlug;
            $counter = 1;

            while (Product::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            // Process sizes
            $sizes = null;
            if (!empty($validated['sizes_string'])) {
                $sizes = array_map('trim', explode(',', $validated['sizes_string']));
                $sizes = array_filter($sizes, function ($size) {
                    return !empty($size);
                });
            }

            // Process colors
            $colors = null;
            if (!empty($validated['colors_string'])) {
                $colors = array_map('trim', explode(',', $validated['colors_string']));
                $colors = array_filter($colors, function ($color) {
                    return !empty($color);
                });
            }

            // Handle image uploads
            $imagePaths = [];
            if ($request->hasFile('images')) {
                $uploadPath = public_path('images/products');

                // Create directory if it doesn't exist
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                foreach ($request->file('images') as $index => $image) {
                    if ($image && $image->isValid()) {
                        // Generate unique filename
                        $imageName = time() . '_' . $index . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                        // Move the file
                        if ($image->move($uploadPath, $imageName)) {
                            $imagePaths[] = '/images/products/' . $imageName;
                            Log::info('Image uploaded successfully: ' . $imageName);
                        } else {
                            Log::warning('Failed to upload image: ' . $index);
                        }
                    }
                }
            }

            // Use default placeholder if no images uploaded
            if (empty($imagePaths)) {
                $imagePaths = ['/images/placeholder.jpg'];
            }

            // Create product data array
            $productData = [
                'name' => $validated['name'],
                'slug' => $slug,
                'description' => $validated['description'],
                'short_description' => $validated['short_description'],
                'price' => $validated['price'],
                'sale_price' => $validated['sale_price'],
                'sku' => strtoupper($validated['sku']),
                'category_id' => $validated['category_id'],
                'subcategory_id' => $validated['subcategory_id'],
                'stock_quantity' => $validated['stock_quantity'],
                'sizes' => $sizes,
                'colors' => $colors,
                'images' => $imagePaths,
                'is_featured' => $request->has('is_featured'),
                'is_active' => $request->has('is_active') || !$request->has('_token'), // Default to active
                'sort_order' => 0
            ];

            // Create the product
            $product = Product::create($productData);

            Log::info('Product created successfully', [
                'product_id' => $product->id,
                'product_name' => $product->name
            ]);

            return redirect()
                ->route('admin.products')
                ->with('success', 'Product "' . $product->name . '" created successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Product creation validation failed', [
                'errors' => $e->errors(),
                'input' => $request->except(['images'])
            ]);

            return back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Please check the form for errors.');
        } catch (Exception $e) {
            Log::error('Product creation failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'input' => $request->except(['images'])
            ]);

            return back()
                ->withInput()
                ->with('error', 'Failed to create product: ' . $e->getMessage());
        }
    }

    /**
     * Show single product
     */
    public function showProduct(Product $product)
    {
        try {
            $product->load(['category', 'subcategory']);
            return view('admin.products.show', compact('product'));
        } catch (Exception $e) {
            Log::error('Error showing product: ' . $e->getMessage());
            return redirect()->route('admin.products')
                ->with('error', 'Unable to load product details.');
        }
    }

    /**
     * Show edit product form
     */
    public function editProduct(Product $product)
    {
        try {
            $categories = Category::with('subcategories')->where('is_active', true)->get();
            return view('admin.products.edit', compact('product', 'categories'));
        } catch (Exception $e) {
            Log::error('Error loading edit form: ' . $e->getMessage());
            return redirect()->route('admin.products')
                ->with('error', 'Unable to load edit form.');
        }
    }

    /**
     * Update product
     */
    public function updateProduct(Request $request, Product $product)
    {
        try {
            Log::info('Product update attempt', [
                'product_id' => $product->id,
                'request_data' => $request->except(['images'])
            ]);

            // Validate input
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|min:10',
                'short_description' => 'nullable|string|max:500',
                'price' => 'required|numeric|min:0|max:999999.99',
                'sale_price' => 'nullable|numeric|min:0|max:999999.99|lt:price',
                'sku' => 'required|string|max:50|unique:products,sku,' . $product->id,
                'category_id' => 'required|exists:categories,id',
                'subcategory_id' => 'nullable|exists:subcategories,id',
                'stock_quantity' => 'required|integer|min:0|max:999999',
                'sizes_string' => 'nullable|string|max:500',
                'colors_string' => 'nullable|string|max:500',
                'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120'
            ]);

            // Update slug if name changed
            $slug = $product->slug;
            if ($validated['name'] !== $product->name) {
                $baseSlug = Str::slug($validated['name']);
                $slug = $baseSlug;
                $counter = 1;

                while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                    $slug = $baseSlug . '-' . $counter;
                    $counter++;
                }
            }

            // Process sizes
            $sizes = null;
            if (!empty($validated['sizes_string'])) {
                $sizes = array_map('trim', explode(',', $validated['sizes_string']));
                $sizes = array_filter($sizes, function ($size) {
                    return !empty($size);
                });
            }

            // Process colors
            $colors = null;
            if (!empty($validated['colors_string'])) {
                $colors = array_map('trim', explode(',', $validated['colors_string']));
                $colors = array_filter($colors, function ($color) {
                    return !empty($color);
                });
            }

            // Handle image uploads
            $imagePaths = $product->images ?? ['/images/placeholder.jpg'];
            if ($request->hasFile('images')) {
                $newImagePaths = [];
                $uploadPath = public_path('images/products');

                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                foreach ($request->file('images') as $index => $image) {
                    if ($image && $image->isValid()) {
                        $imageName = time() . '_' . $index . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                        if ($image->move($uploadPath, $imageName)) {
                            $newImagePaths[] = '/images/products/' . $imageName;
                        }
                    }
                }

                if (!empty($newImagePaths)) {
                    $imagePaths = $newImagePaths;
                }
            }

            // Update product
            $product->update([
                'name' => $validated['name'],
                'slug' => $slug,
                'description' => $validated['description'],
                'short_description' => $validated['short_description'],
                'price' => $validated['price'],
                'sale_price' => $validated['sale_price'],
                'sku' => strtoupper($validated['sku']),
                'category_id' => $validated['category_id'],
                'subcategory_id' => $validated['subcategory_id'],
                'stock_quantity' => $validated['stock_quantity'],
                'sizes' => $sizes,
                'colors' => $colors,
                'images' => $imagePaths,
                'is_featured' => $request->has('is_featured'),
                'is_active' => $request->has('is_active'),
            ]);

            Log::info('Product updated successfully', [
                'product_id' => $product->id,
                'product_name' => $product->name
            ]);

            return redirect()
                ->route('admin.products')
                ->with('success', 'Product "' . $product->name . '" updated successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Please check the form for errors.');
        } catch (Exception $e) {
            Log::error('Product update failed', [
                'error' => $e->getMessage(),
                'product_id' => $product->id
            ]);

            return back()
                ->withInput()
                ->with('error', 'Failed to update product: ' . $e->getMessage());
        }
    }

    /**
     * Delete product
     */
    public function destroyProduct(Product $product)
    {
        try {
            $productName = $product->name;

            // Delete associated images
            if ($product->images) {
                foreach ($product->images as $imagePath) {
                    if ($imagePath !== '/images/placeholder.jpg') {
                        $fullPath = public_path($imagePath);
                        if (file_exists($fullPath)) {
                            unlink($fullPath);
                        }
                    }
                }
            }

            $product->delete();

            Log::info('Product deleted successfully', [
                'product_name' => $productName
            ]);

            return redirect()
                ->route('admin.products')
                ->with('success', 'Product "' . $productName . '" deleted successfully!');
        } catch (Exception $e) {
            Log::error('Product deletion failed', [
                'error' => $e->getMessage(),
                'product_id' => $product->id ?? 'unknown'
            ]);

            return redirect()->route('admin.products')
                ->with('error', 'Failed to delete product: ' . $e->getMessage());
        }
    }

    // ============ CATEGORY CRUD OPERATIONS ============

    /**
     * Display all categories
     */
    public function categories()
    {
        try {
            if (!class_exists(Category::class)) {
                return view('admin.categories.index', ['categories' => collect()])
                    ->with('info', 'Category model not found. Please create your Category model first.');
            }

            $categories = Category::with('subcategories')->paginate(15);
            return view('admin.categories.index', compact('categories'));
        } catch (Exception $e) {
            Log::error('Error loading categories: ' . $e->getMessage());
            return view('admin.categories.index', ['categories' => collect()])
                ->with('error', 'Unable to load categories.');
        }
    }

    /**
     * Show create category form
     */
    public function createCategory()
    {
        return view('admin.categories.create');
    }

    /**
     * Store new category
     */
    public function storeCategory(Request $request)
    {
        try {
            if (!class_exists(Category::class)) {
                return redirect()->route('admin.categories')
                    ->with('error', 'Category model not found. Please create your Category model first.');
            }

            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:categories,name',
                'description' => 'nullable|string',
            ]);

            $validated['slug'] = Str::slug($validated['name']);
            $validated['is_active'] = $request->has('is_active');

            $category = Category::create($validated);

            return redirect()
                ->route('admin.categories')
                ->with('success', 'Category "' . $category->name . '" created successfully!');
        } catch (Exception $e) {
            Log::error('Category creation failed: ' . $e->getMessage());
            return back()
                ->withInput()
                ->with('error', 'Failed to create category: ' . $e->getMessage());
        }
    }

    /**
     * Show edit category form
     */
    public function editCategory(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update category
     */
    public function updateCategory(Request $request, Category $category)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
                'description' => 'nullable|string',
            ]);

            if ($validated['name'] !== $category->name) {
                $validated['slug'] = Str::slug($validated['name']);
            }

            $validated['is_active'] = $request->has('is_active');

            $category->update($validated);

            return redirect()
                ->route('admin.categories')
                ->with('success', 'Category "' . $category->name . '" updated successfully!');
        } catch (Exception $e) {
            Log::error('Category update failed: ' . $e->getMessage());
            return back()
                ->withInput()
                ->with('error', 'Failed to update category: ' . $e->getMessage());
        }
    }

    /**
     * Delete category
     */
    public function destroyCategory(Category $category)
    {
        try {
            // Check if category has products
            if (method_exists($category, 'products') && $category->products()->count() > 0) {
                return back()->with('error', 'Cannot delete category with existing products!');
            }

            $categoryName = $category->name;
            $category->delete();

            return redirect()
                ->route('admin.categories')
                ->with('success', 'Category "' . $categoryName . '" deleted successfully!');
        } catch (Exception $e) {
            Log::error('Category deletion failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete category: ' . $e->getMessage());
        }
    }

    // ============ ORDER MANAGEMENT ============

    /**
     * Display all orders
     */
    public function orders()
    {
        try {
            if (!class_exists(Order::class)) {
                return view('admin.orders.index', ['orders' => collect()])
                    ->with('info', 'Order model not found. Please create your Order model first.');
            }

            $orders = Order::with('user')
                ->orderBy('created_at', 'desc')
                ->paginate(15);

            return view('admin.orders.index', compact('orders'));
        } catch (Exception $e) {
            Log::error('Error loading orders: ' . $e->getMessage());
            return view('admin.orders.index', ['orders' => collect()])
                ->with('error', 'Unable to load orders.');
        }
    }

    /**
     * Show single order
     */
    public function showOrder(Order $order)
    {
        try {
            $order->load('user', 'orderItems.product');
            return view('admin.orders.show', compact('order'));
        } catch (Exception $e) {
            Log::error('Error showing order: ' . $e->getMessage());
            return redirect()->route('admin.orders')
                ->with('error', 'Unable to load order details.');
        }
    }

    /**
     * Update order status
     */
    public function updateOrderStatus(Request $request, Order $order)
    {
        try {
            $validated = $request->validate([
                'status' => 'required|in:pending,processing,shipped,delivered,cancelled'
            ]);

            $order->update($validated);

            return back()->with('success', 'Order status updated successfully!');
        } catch (Exception $e) {
            Log::error('Order status update failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to update order status.');
        }
    }

    // ============ USER MANAGEMENT ============

    /**
     * Display all users
     */
    public function users()
    {
        try {
            $users = User::orderBy('created_at', 'desc')->paginate(15);
            return view('admin.users.index', compact('users'));
        } catch (Exception $e) {
            Log::error('Error loading users: ' . $e->getMessage());
            return view('admin.users.index', ['users' => collect()])
                ->with('error', 'Unable to load users.');
        }
    }

    /**
     * Show single user
     */
    public function showUser(User $user)
    {
        try {
            if (method_exists($user, 'orders')) {
                $user->load('orders');
            }
            return view('admin.users.show', compact('user'));
        } catch (Exception $e) {
            Log::error('Error showing user: ' . $e->getMessage());
            return redirect()->route('admin.users')
                ->with('error', 'Unable to load user details.');
        }
    }

    /**
     * Toggle user admin status
     */
    public function toggleAdmin(User $user)
    {
        try {
            $user->update(['is_admin' => !$user->is_admin]);

            $status = $user->is_admin ? 'promoted to admin' : 'removed from admin';

            return back()->with('success', 'User ' . $user->name . ' ' . $status . ' successfully!');
        } catch (Exception $e) {
            Log::error('User admin toggle failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to update user status.');
        }
    }

    // ============ ANALYTICS & REPORTS ============

    /**
     * Display analytics
     */
    public function analytics()
    {
        try {
            $data = [
                'monthly_sales' => $this->getMonthlySales(),
                'top_products' => class_exists(Product::class) ?
                    Product::withCount('orderItems')->orderBy('order_items_count', 'desc')->take(10)->get() :
                    collect(),
                'top_categories' => class_exists(Category::class) ?
                    Category::withCount('products')->orderBy('products_count', 'desc')->take(5)->get() :
                    collect(),
            ];

            return view('admin.analytics', compact('data'));
        } catch (Exception $e) {
            Log::error('Analytics error: ' . $e->getMessage());
            return view('admin.analytics', ['data' => [
                'monthly_sales' => collect(),
                'top_products' => collect(),
                'top_categories' => collect(),
            ]])->with('error', 'Unable to load analytics.');
        }
    }

    /**
     * Sales report
     */
    public function salesReport()
    {
        try {
            if (!class_exists(Order::class)) {
                return view('admin.reports.sales', ['orders' => collect()])
                    ->with('info', 'Order model not found. Please create your Order model first.');
            }

            $orders = Order::with('user')
                ->where('payment_status', 'completed')
                ->orderBy('created_at', 'desc')
                ->paginate(20);

            return view('admin.reports.sales', compact('orders'));
        } catch (Exception $e) {
            Log::error('Sales report error: ' . $e->getMessage());
            return view('admin.reports.sales', ['orders' => collect()])
                ->with('error', 'Unable to load sales report.');
        }
    }

    /**
     * Inventory report
     */
    public function inventoryReport()
    {
        try {
            if (!class_exists(Product::class)) {
                return view('admin.reports.inventory', ['products' => collect()])
                    ->with('info', 'Product model not found. Please create your Product model first.');
            }

            $products = Product::with('category')
                ->orderBy('stock_quantity', 'asc')
                ->paginate(20);

            return view('admin.reports.inventory', compact('products'));
        } catch (Exception $e) {
            Log::error('Inventory report error: ' . $e->getMessage());
            return view('admin.reports.inventory', ['products' => collect()])
                ->with('error', 'Unable to load inventory report.');
        }
    }

    // ============ SETTINGS ============

    /**
     * Show settings
     */
    public function settings()
    {
        return view('admin.settings');
    }

    /**
     * Update settings
     */
    public function updateSettings(Request $request)
    {
        try {
            // Settings update logic here
            return back()->with('success', 'Settings updated successfully!');
        } catch (Exception $e) {
            Log::error('Settings update failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to update settings.');
        }
    }

    // ============ HELPER METHODS ============

    /**
     * Get monthly sales data
     */
    private function getMonthlySales()
    {
        try {
            if (!class_exists(Order::class)) {
                return collect();
            }

            return Order::selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
                ->where('payment_status', 'completed')
                ->whereYear('created_at', date('Y'))
                ->groupBy('month')
                ->orderBy('month')
                ->get();
        } catch (Exception $e) {
            Log::error('Monthly sales calculation failed: ' . $e->getMessage());
            return collect();
        }
    }
}
