<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminsPermission;
use Illuminate\Http\Request;
use App\Models\Software;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class AdminSoftwareController extends Controller
{

    public function add_store_software(Request $request)
    {
        Session::put('page', 'software');
        if ($request->isMethod('post')) {
            $data = $request->all();
            $request->validate([
                'title' => 'required|max:200',
                'description' => 'max:500',
                'features' => 'array',
                'thumbnail' => 'image|max:2048',
            ]);

            $rules = [
                'title' => 'required|max:200',
                'description' => 'max:500',
                'features' => 'array',
                'thumbnail' => 'image|max:2048',
            ];
    
            $customMessages = [
                'title.required' => 'Enter Software Title',
                'description.required' => 'Enter Software descriptionription',
                'features.array' => 'Enter Software Features',
            ];
    
            $fileFields = ['image_1', 'image_2', 'image_3'];

            foreach ($fileFields as $field) {
                if ($request->hasFile($field)) {
                    $rules[$field] = 'image|max:2048';
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

            $software = new Software();

            $software->title = $data['title'];
            $software->description = $data['description'];
            $software->features = json_encode($data['features'], JSON_UNESCAPED_UNICODE); 
            $software->price = $data['price'];
            $software->affiliator_commission = $data['affiliator_commission'];
            $software->demo_link = $data['demo_link'];

            // Upload poster images
              if ($request->hasFile('thumbnail')) {
                $image_tmp = $request->file('thumbnail');
                if ($image_tmp->isValid()) {
                    // Get image extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate new image name
                    $image_name = rand(111, 99999) . '.' . $extension;
                    // Save image
                    $image_path = 'admin/images/software_images/' . $image_name;
                    Image::make($image_tmp)->save($image_path);
                    // storing imagepath with name in data table
                    $software->thumbnail = $image_path;
                }
            }

            // soring preview images in data table
            foreach ($fileFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    if ($file->isValid()) {
                        $fileName = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                        $filePath = 'admin/images/software_images/' . $fileName;
                        $file->move(public_path('admin/images/software_images/'), $fileName);
                        $software->{$field} = $filePath;
                    }
                }
            }
    
            $software->save();
            return redirect('admin/software-list');
        }else{
            return view('admin.software.add_software');
        }
    } 

    public function software_list()
    {
        Session::put('page', 'software');
        $softwares = Software::all();
        return view('admin.software.software_list')->with(compact('softwares'));
    }
    public function update_software($id)
    {
        Session::put('page', 'software');
        $software = Software::findOrFail($id);
        return view('admin.software.update_software')->with(compact('software'));
    }
    public function enable_for_customer($id)
    {
        Session::put('page', 'software');
        $enable = Software::findOrFail($id);
        if($enable->customer_enabled == '1'){
            $enable->customer_enabled = null;
            $enable->save();
            return redirect('admin/software-list');
        }else{
            $enable->customer_enabled = 1;
            $enable->save();
            return redirect('admin/software-list');
        }
    }
    public function enable_for_populer($id)
    {
        Session::put('page', 'software');
        $enable = Software::findOrFail($id);
        if($enable->is_populer == '1'){
            $enable->is_populer = null;
            $enable->save();
            return redirect('admin/software-list');
        }else{
            $enable->is_populer = 1;
            $enable->save();
            return redirect('admin/software-list');
        }
    }
    public function updating_software(Request $request)
    {
        Session::put('page', 'software');
        $data = $request->all();
        
        $request->validate([
            'title' => 'required|max:200',
            'description' => 'max:500',
            'features' => 'array',
            'thumbnail' => 'image|max:2048',
            'image_1' => 'image|max:2048',
            'image_2' => 'image|max:2048',
            'image_3' => 'image|max:2048',
        ]);

        $rules = [
            'title' => 'required|max:200',
            'description' => 'max:500',
            'features' => 'array',
            'thumbnail' => 'image|max:2048',
        ];

        $customMessages = [
            'title.required' => 'Enter Software Title',
        ];



        $validator = Validator::make($data, $rules, $customMessages);
        // Check if validation fails

        if ($validator->fails()) {  
        // If validation fails, set error message and redirect back
            return redirect()->back()->with('error_message', $validator->errors()->first());
        }

        // Fetch the record by ID
        $id = $request->id;
        $data = Software::findOrFail($id);

        // Update individual fields
        if ($request->has('title')) {
            $data->title = $request->title;
        }
        if ($request->has('description')) {
            $data->description = $request->description;
        }
        if ($request->has('features')) {
            // Check if features are already encoded
            if (is_array($request['features'])) {
                // Encode only if features is an array
                $data->features = json_encode($request['features'], JSON_UNESCAPED_UNICODE);
            } else {
                // Assign the existing JSON string as is
                $data->features = $request['features'];
            }
        }        
        if ($request->has('price')) {
            $data->price = $request->price;
        }
        if ($request->has('affiliator_commission')) {
            $data->affiliator_commission = $request->affiliator_commission;
        }
        if ($request->has('demo_link')) {
            $data->demo_link = $request->demo_link;
        }
        

        
        // Upload poster images
        if ($request->hasFile('thumbnail')) {
            $image_tmp = $request->file('thumbnail');
            if ($image_tmp->isValid()) {
                // Get image extension
                $extension = $image_tmp->getClientOriginalExtension();
                // Generate new image name
                $image_name = rand(111, 99999) . '.' . $extension;
                // Save image
                $image_path = 'admin/images/software_images/' . $image_name;
                Image::make($image_tmp)->save($image_path);
                // storing imagepath with name in data table
                $data->thumbnail = $image_path;
            }
        }
        
        // Upload preview images validation
        $fileFields = ['image_1', 'image_2', 'image_3'];
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $rules[$field] = 'required|image|max:2048';
                $customMessages[$field.'.required'] = 'Enter Preview Image.';
                $customMessages[$field.'.image'] = 'The file must be an image.';
                $customMessages[$field.'.max'] = 'The image size must not exceed 2MB.';
            }
        }
        
        // update preview images in data table
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                if ($file->isValid()) {
                    $fileName = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                    $filePath = 'admin/images/software_images/' . $fileName;
                    $file->move(public_path('admin/images/software_images/'), $fileName);
                    $data->{$field} = $filePath;
                }
            }
        }
    
        $data->save();
        return redirect('admin/software-list');
    }
    public function deleteSoftware($id)
    {
        Session::put('page', 'software');
        Software::where('id', $id)->delete();
        return redirect('admin/software-list');
    }

}
