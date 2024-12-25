<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminsPermission;
use App\Models\ProductCategory;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class QuickShopController extends Controller
{
    public function ProductCategory()
    {
        Session::put('page', 'productCategory');
        $category = ProductCategory::get()->toArray();

        // Set Admin/Sub admin Permission for Product Categories
        $productCategoryModuleCount = AdminsPermission::where(['admin_id' => Auth::guard('admin')->user()->id, 'module' => 'productCategory'])->count();
        $pagesModule = array();
        if (Auth::guard('admin')->user()->type == "admin") {
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        } else if ($productCategoryModuleCount == 0) {
            $message = "This feature is restricted for you...!";
            return redirect('admin/dashboard')->with('error_message', $message);
        } else {
            $pagesModule = AdminsPermission::where(['admin_id' => Auth::guard('admin')->user()->id, 'module' => 'productCategory'])->first()->toArray();
        }
        return view('admin.quick_shop.product_category')->with(compact('category', 'pagesModule'));
    }



    public function addEditCategory(Request $request, $id = null)
    {
        Session::put('page', 'productCategory');

        if ($id == "") {
            $title = "Add Product Category";
            $category = new ProductCategory();
            $message = "Category added successfully";
        } else {
            $title = "Edit Product Category";
            $category = ProductCategory::findOrFail($id);
            $message = "Category edited successfully";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'name' => 'required',
            ];

            $customMessages = [
                'name.required' => 'Category Name is required',
            ];

            $validator = Validator::make($data, $rules, $customMessages);

            // Check if validation fails
            if ($validator->fails()) {
                // If validation fails, set error message and redirect back
                return redirect()->back()->with('error_message', $validator->errors()->first());
            }

            $category->name = $data['name'];
            $category->save();
            return redirect('admin/product-category')->with('success_message', $message);
        }

        return view('admin.quick_shop.add_edit_product_category')->with(compact('title', 'category'));
    }

    public function destroyCategory($id)
    {
        ProductCategory::where('id', $id)->delete();
        return redirect()->back()->with('success_message', 'Product Category deleted...!');
    }

    public function product()
    {
        Session::put('page', 'products');
        $products = Products::with('category')->get()->toArray();

        // Set Admin/Sub admin Permission for Products
        $productsModuleCount = AdminsPermission::where(['admin_id' => Auth::guard('admin')->user()->id, 'module' => 'products'])->count();
        $pagesModule = array();
        if (Auth::guard('admin')->user()->type == "admin") {
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        } else if ($productsModuleCount == 0) {
            $message = "This feature is restricted for you...!";
            return redirect('admin/dashboard')->with('error_message', $message);
        } else {
            $pagesModule = AdminsPermission::where(['admin_id' => Auth::guard('admin')->user()->id, 'module' => 'productCategory'])->first()->toArray();
        }
        return view('admin.quick_shop.products')->with(compact('products', 'pagesModule'));
    }


    public function add_edit_product(Request $request, $id = null)
    {
        Session::put('page', 'add-edit-product');
    
        if ($id == "") {
            $title = "Add Product";
            $product = new Products();
            $message = "Product added successfully";
        } else {
            $title = "Edit Product";
            $product = Products::findOrFail($id);
            $message = "Product edited successfully";
        }
    
        if ($request->isMethod('post')) {
            $data = $request->all();
    
            $rules = [
                'name' => 'required',
                'category_id' => 'required|exists:product_categories,id',
                'actual_price' => 'required',
                'discount_price' => 'required',
                'headline_1' => 'required',
                'features' => 'required|array',
            ];
    
            $customMessages = [
                'name.required' => 'Category Name is required',
                'category_id.required' => 'Category is required',
                'category_id.exists' => 'Selected category does not exist',
                'actual_price.required' => 'Please Provide Actual Price',
                'discount_price.required' => 'Please Provide Discount Price',
                'headline_1.required' => 'headline is required',
                'features.required' => 'Product features is required',
                'features.array' => 'Product features must be an more than one',
            ];
    
            $fileFields = ['image_1', 'image_2', 'image_3'];
    
            foreach ($fileFields as $field) {
                if ($id === null || $request->hasFile($field)) {
                    $rules[$field] = 'required|image|max:2048';
                    $customMessages[$field.'.required'] = 'An image file is required.';
                    $customMessages[$field.'.image'] = 'The file must be an image.';
                    $customMessages[$field.'.max'] = 'The image size must not exceed 2MB.';
                }
            }
    
            $validator = Validator::make($data, $rules, $customMessages);
    
            // Check if validation fails
            if ($validator->fails()) {
                // If validation fails, set error message and redirect back
                return redirect()->back()->with('error_message', $validator->errors()->first());
            }
    
            $product->name = $data['name'];
            $product->category_id = $data['category_id'];
            $product->actual_price = $data['actual_price'];
            $product->discount_price = $data['discount_price'];
            $product->headline_1 = $data['headline_1'];
            $product->features = json_encode($data['features'], JSON_UNESCAPED_UNICODE); 
    
            // Handle file uploads
            foreach ($fileFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    if ($file->isValid()) {
                        $fileName = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                        $filePath = 'front/assets/product_images/' . $fileName;
                        $file->move(public_path('front/assets/product_images'), $fileName);
                        $product->{$field} = $filePath;
                    }
                }
            }
    
            $product->save();
            return redirect('admin/products')->with('success_message', $message);
        }
    
        $categories = ProductCategory::pluck('name', 'id');
        $product->features = json_decode($product->features, true);
        return view('admin.quick_shop.add_edit_product')->with(compact('title', 'product','categories'));
    }
    

    public function destroyProduct($id)
    {
        Products::where('id', $id)->delete();
        return redirect()->back()->with('success_message', 'Product deleted...!');
    }
}
