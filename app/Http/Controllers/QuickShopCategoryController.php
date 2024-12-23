<?php

namespace App\Http\Controllers;

use App\Models\QuickShopCategory;
use Illuminate\Http\Request;

class QuickShopCategoryController extends Controller
{

    public function index()
    {
        $categories = QuickShopCategory::orderBy('name', 'asc')->get();
        return view('admin.quickShop.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:quick_shop_categories,name', 'string', 'max:255']
        ]);

        $cateogry = new QuickShopCategory();
        $cateogry->name = $request->name;
        $cateogry->save();

        $notification = array(
            'message'=> 'New cateogry Save Successfully',
            'type'=> 'success'
        );
        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function edit(QuickShopCategory $quickShopCategory)
    {
        return response()->json($quickShopCategory);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', "unique:quick_shop_categories,name,$request->id", 'string', 'max:255']
        ]);

        $cateogry = QuickShopCategory::whereId($request->id)->first();
        $cateogry->name = $request->name;
        $cateogry->save();

        $notification = array(
            'message'=> 'Category Updated Successfully',
            'type'=> 'success'
        );
        return redirect()->back()->with('success', 'Category Updated successfully!');
    }

    public function destroy(QuickShopCategory $quickShopCategory)
    {
        $deleteQuickShopCategory = $quickShopCategory->delete();

        if($deleteQuickShopCategory){

            $notification = [
                'message' => 'Category Deleted successfully!',
                'type' => 'warning'
            ];

            return redirect()->back()->with('success', 'Category Deleted successfully!');
        }
    }
}
