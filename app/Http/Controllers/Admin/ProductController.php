<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Notifications\ProductNotification;
use Illuminate\Support\Facades\Notification;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        $categories = Category::all();
        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'is_active' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'visibility' => 'nullable|in:public,private',
            'color' => 'nullable|string',
            'size' => 'nullable|string',
            'tags' => 'nullable|array',
            'sku' => 'required|string|max:255|unique:products,sku',
        ]);

        // Handle main image
        $mainImagePath = $request->hasFile('main_image')
            ? $request->file('main_image')->store('products', 'public')
            : null;

        // Handle gallery images
        $galleryImages = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('products/gallery', 'public');
            }
        }

        // Handle tags
        $tags = $request->tags ?? [];

        // Create product
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'is_active' => $request->is_active ?? true,
            'category_id' => $request->category_id,
            'stock' => $request->stock,
            'main_image' => $mainImagePath,
            'gallery_images' => json_encode($galleryImages),
            'visibility' => $request->visibility ?? 'public',
            'color' => $request->color,
            'size' => $request->size,
            'tags' => json_encode($tags),
            'sku' => $request->sku,
        ]);

        Log::info('Product created: ', ['product_id' => $product->id, 'name' => $product->name]);
        // Notify admin about the new product
        $admin = auth()->user();
        Notification::send($admin, new ProductNotification($product, 'created'));
        Log::info('Admin notified about new product: ', ['admin_id' => $admin->id, 'product_id' => $product->id]);
        if ($product->stock == 0) {
            Notification::send($admin, new ProductNotification($product, 'stock_out'));
        }

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product, $id)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'is_active' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'visibility' => 'nullable|in:public,private',
            'color' => 'nullable|string',
            'size' => 'nullable|string',
            'tags' => 'nullable|array',
            'sku' => "required|string|max:255|unique:products,sku,$id",
        ]);

        $product = Product::findOrFail($id);

        // Handle main image
        if ($request->hasFile('main_image')) {
            $path = $request->file('main_image')->store('products', 'public');
            $product->main_image = $path;
        }

        // Handle gallery images
        $existingGalleryImages = is_array($product->gallery_images)
            ? $product->gallery_images
            : (json_decode($product->gallery_images, true) ?? []);

        $removedGalleryImages = $request->input('removed_gallery_images');
        if ($removedGalleryImages) {
            $removedGalleryImages = json_decode($removedGalleryImages, true);
            $existingGalleryImages = array_filter($existingGalleryImages, function ($img) use ($removedGalleryImages) {
                return !in_array($img, $removedGalleryImages);
            });
        }

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $existingGalleryImages[] = $image->store('products/gallery', 'public');
            }
        }
        $product->gallery_images = json_encode(array_values($existingGalleryImages));
        $wasOutOfStock = $product->stock == 0;
        // Handle tags
        $tags = $request->tags ?? [];

        // Update product
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'is_active' => $request->is_active ?? true,
            'category_id' => $request->category_id,
            'stock' => $request->stock,
            'visibility' => $request->visibility ?? 'public',
            'color' => $request->color,
            'size' => $request->size,
            'tags' => json_encode($tags),
            'sku' => $request->sku,
            'main_image' => $product->main_image,
            'gallery_images' => $product->gallery_images,
        ]);
        Log::info('Product updated: ', ['product_id' => $product->id, 'name' => $product->name]);
        // Notify admin about the updated product
        $admin = auth()->user();
        Notification::send($admin, new ProductNotification($product, 'updated'));
        Log::info('Admin notified about product update: ', ['admin_id' => $admin->id, 'product_id' => $product->id]);
        if ($product->stock == 0 && !$wasOutOfStock) {
            Notification::send($admin, new ProductNotification($product, 'stock_out'));
        }
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        // Notify admin about the deleted product
        $admin = auth()->user();
        Notification::send($admin, new ProductNotification($product, 'deleted'));

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.show', compact('product', 'categories'));
    }
}
