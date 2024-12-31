<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminsPermission;
use Illuminate\Http\Request;
use App\Models\DigitalProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class AdminDigitalProductController extends Controller
{

    public function add_digProduct(Request $request)
    {
        Session::put('page', 'digitalProduct');
        if ($request->isMethod('post')) {
            $data = $request->all();
            
            
            $request->validate([
                'title' => 'required|max:100',
                'description' => 'max:200',
                'features' => 'array',
                'thumbnail' => 'image|max:2048',
            ]);

            $rules = [
                'title' => 'required|max:100',
                'description' => 'max:200',
                'features' => 'array',
                'thumbnail' => 'image|max:2048',
            ];
    
            $customMessages = [
                'title.required' => 'Enter Software Title',
                'description.required' => 'Enter Software descriptionription',
                'features.array' => 'Enter Software Features',
            ];


            $validator = Validator::make($data, $rules, $customMessages);
    
            // Check if validation fails
            if ($validator->fails()) {  
                // If validation fails, set error message and redirect back
                return redirect()->back()->with('error_message', $validator->errors()->first());
            }

            $digProd = new DigitalProduct();

            $digProd->title = $data['title'];
            $digProd->description = $data['description'];
            $digProd->features = json_encode($data['features'], JSON_UNESCAPED_UNICODE); 
            $digProd->price = $data['price'];
            $digProd->affiliator_commission = $data['affiliator_commission'];

            // Upload thumbnail images
              if ($request->hasFile('thumbnail')) {
                $image_tmp = $request->file('thumbnail');
                if ($image_tmp->isValid()) {
                    // Get image extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate new image name
                    $image_name = rand(111, 99999) . '.' . $extension;
                    // Save image
                    $image_path = 'admin/images/digital_products/' . $image_name;
                    Image::make($image_tmp)->save($image_path);
                    // storing imagepath with name in data table
                    $digProd->thumbnail = $image_path;
                }
            }


            // Upload zip file
            if ($request->hasFile('zip_file')) {
                $zip_tmp = $request->file('zip_file');

                if ($zip_tmp->isValid()) {
                    // Get file extension
                    $extension = $zip_tmp->getClientOriginalExtension();

                    // Ensure the uploaded file is a ZIP
                    if (strtolower($extension) === 'zip') {
                        // Generate new file name
                        $zip_name = rand(111, 99999) . '.' . $extension;

                        // Save the ZIP file
                        $zip_path = 'admin/assets/zip/digital_product/' . $zip_name;
                        $zip_tmp->move(public_path('admin/assets/zip/digital_product'), $zip_name);

                        // Store the file path in the database
                        $digProd->zip_file = $zip_path;
                    } else {
                        return back()->with('error', 'The uploaded file must be a ZIP file.');
                    }
                }
            }

    
            $digProd->save();
            return redirect()->route('digProduct.list');
        }else{
            return view('admin.digital_product.add_digitalProduct');
        }
    } 

    public function digProduct_list()
    {
        Session::put('page', 'digitalProduct');
        $digProd = DigitalProduct::all();
        return view('admin.digital_product.digitalProduct_list')->with(compact('digProd'));
    }

    public function update_product($id)
    {
        Session::put('page', 'digitalProduct');
        $product = DigitalProduct::findOrFail($id);
        return view('admin.digital_product.update_digitalProduct')->with(compact('product'));
    }

    // public function updating_software(Request $request)
    // {
    //     Session::put('page', 'software');
    //     $data = $request->all();
        
    //     $request->validate([
    //         'title' => 'required|max:100',
    //         'description' => 'max:200',
    //         'features' => 'array',
    //         'thumbnail' => 'image|max:2048',
    //         'image_1' => 'image|max:2048',
    //         'image_2' => 'image|max:2048',
    //         'image_3' => 'image|max:2048',
    //     ]);

    //     $rules = [
    //         'title' => 'required|max:100',
    //         'description' => 'max:200',
    //         'features' => 'array',
    //         'thumbnail' => 'image|max:2048',
    //     ];

    //     $customMessages = [
    //         'title.required' => 'Enter Software Title',
    //     ];



    //     $validator = Validator::make($data, $rules, $customMessages);
    //     // Check if validation fails

    //     if ($validator->fails()) {  
    //     // If validation fails, set error message and redirect back
    //         return redirect()->back()->with('error_message', $validator->errors()->first());
    //     }

    //     // Fetch the record by ID
    //     $id = $request->id;
    //     $data = Software::findOrFail($id);

    //     // Update individual fields
    //     if ($request->has('title')) {
    //         $data->title = $request->title;
    //     }
    //     if ($request->has('description')) {
    //         $data->description = $request->description;
    //     }
    //     if ($request->has('features')) {
    //         // Check if features are already encoded
    //         if (is_array($request['features'])) {
    //             // Encode only if features is an array
    //             $data->features = json_encode($request['features'], JSON_UNESCAPED_UNICODE);
    //         } else {
    //             // Assign the existing JSON string as is
    //             $data->features = $request['features'];
    //         }
    //     }        
    //     if ($request->has('price')) {
    //         $data->price = $request->price;
    //     }
    //     if ($request->has('affiliator_commission')) {
    //         $data->affiliator_commission = $request->affiliator_commission;
    //     }
    //     if ($request->has('demo_link')) {
    //         $data->demo_link = $request->demo_link;
    //     }
        

        
    //     // Upload poster images
    //     if ($request->hasFile('thumbnail')) {
    //         $image_tmp = $request->file('thumbnail');
    //         if ($image_tmp->isValid()) {
    //             // Get image extension
    //             $extension = $image_tmp->getClientOriginalExtension();
    //             // Generate new image name
    //             $image_name = rand(111, 99999) . '.' . $extension;
    //             // Save image
    //             $image_path = 'admin/images/software_images/' . $image_name;
    //             Image::make($image_tmp)->save($image_path);
    //             // storing imagepath with name in data table
    //             $data->thumbnail = $image_path;
    //         }
    //     }
        
    //     // Upload preview images validation
    //     $fileFields = ['image_1', 'image_2', 'image_3'];
    //     foreach ($fileFields as $field) {
    //         if ($request->hasFile($field)) {
    //             $rules[$field] = 'required|image|max:2048';
    //             $customMessages[$field.'.required'] = 'Enter Preview Image.';
    //             $customMessages[$field.'.image'] = 'The file must be an image.';
    //             $customMessages[$field.'.max'] = 'The image size must not exceed 2MB.';
    //         }
    //     }
        
    //     // update preview images in data table
    //     foreach ($fileFields as $field) {
    //         if ($request->hasFile($field)) {
    //             $file = $request->file($field);
    //             if ($file->isValid()) {
    //                 $fileName = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
    //                 $filePath = 'admin/images/software_images/' . $fileName;
    //                 $file->move(public_path('admin/images/software_images/'), $fileName);
    //                 $data->{$field} = $filePath;
    //             }
    //         }
    //     }
    
    //     $data->save();
    //     return redirect('admin/software-list');
    // }
    // public function deleteSoftware($id)
    // {
    //     Session::put('page', 'software');
    //     Software::where('id', $id)->delete();
    //     return redirect('admin/software-list');
    // }

}
