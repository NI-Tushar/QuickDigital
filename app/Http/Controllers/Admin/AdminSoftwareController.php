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

class AdminSoftwareController extends Controller
{

    public function add_edit_software(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'title' => 'required',
                'desc' => 'required',
                'features' => 'required|array',
                'current_price' => 'required',
                'before_price' => 'required',
                'star_rating' => 'required',
            ];
    
            $customMessages = [
                'title.required' => 'Software Name is required',
                'desc.required' => 'Description is required',
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
            dd($data);
        }
        if ($id != null) {
            dd($id);
        }else{
            return view('admin.software.add_software');
        }
    } 

    public function manage_software()
    {
        dd('manage software');
        return view('quick_digital.software.software_view');
    }

}
