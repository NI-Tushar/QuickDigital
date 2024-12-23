<?php

namespace App\Http\Controllers;

use App\Models\QuickShopCategory;
use App\Models\QuickShopProduct;
use App\Models\QuickShopProductVariation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuickShopProductController extends Controller
{
    public function index()
    {
        $products = QuickShopProduct::latest()->paginate(20);
        return view('admin.quickShop.product.index', compact('products'));
    }

    public function create()
    {
        $categories = QuickShopCategory::orderBy('name', 'asc')->get();
        return view('admin.quickShop.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255', 'unique:quick_shop_products,name'],
            'unit' => ['required', 'string', 'min:2', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'category' => ['required', 'exists:quick_shop_categories,id'],
            'quantity' => ['required', 'integer', 'min:1'],
            'discount' => ['nullable', 'numeric', 'between:0,100'],
            'description' => ['required', 'string'],
            'thumbnail_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:10048'],
            'images' => 'required',
            'images.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:10048'],
            'variations' => ['nullable', 'array', 'min:1'],
            'variations.*.color' => ['required', 'string', 'min:2', 'max:50'],
            'variations.*.color_code' => ['required', 'regex:/^#[0-9A-Fa-f]{3,6}$/'],
            'variations.*.size' => ['required', 'string', 'min:1', 'max:5'],
            'variations.*.quantity' => ['required', 'integer', 'min:1'],
        ]);

        $images = [];

        // Process multiple images
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('front/assets/product_images'), $fileName);
                $images[] = "front/assets/product_images/" . $fileName;
            }
        }

        // Process thumbnail image
        if ($file = $request->file('thumbnail_image')) {
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/assets/product_images'), $fileName);
            $thumbnailImage = "front/assets/product_images/" . $fileName;
        }

        // Save the main product
        $product = new QuickShopProduct();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->unit = $request->unit;
        $product->price = $request->price;
        $product->quick_shop_category_id = $request->category;
        $product->qty = $request->quantity;
        $product->discount = $request->discount;
        $product->description = $request->description;
        $product->thumbnail_image = $thumbnailImage ?? null;
        $product->images = implode("|", $images);
        $product->save();

        // Save variations if provided
        if ($product && $request->variations) {
            foreach ($request->variations as $variation) {
                QuickShopProductVariation::create([
                    'quick_shop_product_id' => $product->id,
                    'color' => $variation['color'],
                    'color_code' => $variation['color_code'],
                    'size' => $variation['size'],
                    'qty' => $variation['quantity'],
                ]);
            }
        }

        return redirect()->back()->with('success', 'Product added successfully!');
    }


    public function edit(QuickShopProduct $quick_shopping_product)
    {
        $product = $quick_shopping_product;
        $categories = QuickShopCategory::orderBy('name', 'asc')->get();
        $existingVariations  = $product->variations;
        return view('admin.quickShop.product.edit', compact('categories', 'product', 'existingVariations'));
    }

    public function update(Request $request, QuickShopProduct $quick_shopping_product)
    {
        $product = $quick_shopping_product;

        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255', "unique:quick_shop_products,name,$product->id"],
            'unit' => ['required', 'string', 'min:2', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'category' => ['required', 'exists:quick_shop_categories,id'],
            'quantity' => ['required', 'integer', 'min:1'],
            'discount' => ['nullable', 'numeric', 'between:0,100'],
            'description' => ['required', 'string'],
            'thumbnail_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:10048'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:10048'],
            'variations' => ['nullable', 'array', 'min:1'],
            'variations.*.color' => ['required', 'string', 'min:2', 'max:50'],
            'variations.*.color_code' => ['required', 'regex:/^#[0-9A-Fa-f]{3,6}$/'],
            'variations.*.size' => ['required', 'string', 'min:1', 'max:5'],
            'variations.*.quantity' => ['required', 'integer', 'min:1'],
        ]);

        $images = $product->images ? explode('|', $product->images) : [];
        $thumbnailImage = $product->thumbnail_image;

        // Delete old images if new ones are uploaded
        if ($files = $request->file('images')) {
            foreach ($images as $image) {
                $imagePath = public_path($image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $images = []; // Reset the images array
            foreach ($files as $file) {
                $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('front/assets/product_images'), $fileName);
                $images[] = "front/assets/product_images/" . $fileName;
            }
        }

        // Delete old thumbnail image if a new one is uploaded
        if ($file = $request->file('thumbnail_image')) {
            $thumbnailPath = public_path($thumbnailImage);
            if ($thumbnailImage && file_exists($thumbnailPath)) {
                unlink($thumbnailPath);
            }
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/assets/product_images'), $fileName);
            $thumbnailImage = "front/assets/product_images/" . $fileName;
        }

        // Update the main product
        $product->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'unit' => $request->unit,
            'price' => $request->price,
            'quick_shop_category_id' => $request->category,
            'qty' => $request->quantity,
            'discount' => $request->discount,
            'description' => $request->description,
            'thumbnail_image' => $thumbnailImage,
            'images' => implode('|', $images),
        ]);

        // Handle variations
        $product->variations()->delete(); // Remove old variations
        if($request->variations){
            foreach ($request->variations as $variation) {
                QuickShopProductVariation::create([
                    'quick_shop_product_id' => $product->id,
                    'color' => $variation['color'],
                    'color_code' => $variation['color_code'],
                    'size' => $variation['size'],
                    'qty' => $variation['quantity'],
                ]);
            }
        }

        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    public function destroy(QuickShopProduct $quick_shopping_product)
    {
        $product = $quick_shopping_product;

        $images = $product->images ? explode('|', $product->images) : [];
        $thumbnailImage = $product->thumbnail_image;

        // Delete old images if new ones are uploaded
        if ($images) {
            foreach ($images as $image) {
                $imagePath = public_path($image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        // Delete old thumbnail image if a new one is uploaded
        if ($thumbnailImage) {
            $thumbnailPath = public_path($thumbnailImage);
            if ($thumbnailImage && file_exists($thumbnailPath)) {
                unlink($thumbnailPath);
            }
        }

        $product->delete();

        return redirect()->back()->with('success', 'Product Deleted successfully!');
    }



}
