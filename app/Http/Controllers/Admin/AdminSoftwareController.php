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

    public function add_store_software(Request $request, $id = null)
    {
        Session::put('page', 'software');
        if ($request->isMethod('post')) {
            $data = $request->all();
            $request->validate([
                'title' => 'required|max:70',
                // 'desc' => 'required|max:100',
                // 'features' => 'required|array',
                // 'current_price' => 'required',
                // 'before_price' => 'required',
                // 'star_rating' => 'required',
                // 'poster_image' => 'required|image|max:2048',
            ]);

            $rules = [
                'title' => 'required|max:70',
                // 'desc' => 'required|max:100',
                // 'features' => 'required|array',
                // 'current_price' => 'required',
                // 'before_price' => 'required',
                // 'star_rating' => 'required',
                // 'poster_image' => 'required|image|max:2048',
            ];
    
            $customMessages = [
                'title.required' => 'Enter Software Title',
                // 'desc.required' => 'Enter Software Description',
                // 'features.array' => 'Enter Software Features',
                // 'current_price.required' => 'Enter Software Current Price',
                // 'before_price.required' => 'Enter Software Before price',
                // 'star_rating.required' => 'Enter Software Rating',
                // 'poster_image.required' => 'Enter Software Image',
            ];
    
            // $fileFields = ['image_1', 'image_2', 'image_3'];

            // foreach ($fileFields as $field) {
            //     if ($id === null || $request->hasFile($field)) {
            //         $rules[$field] = 'required|image|max:2048';
            //         $customMessages[$field.'.required'] = 'Enter Preview Image.';
            //         $customMessages[$field.'.image'] = 'The file must be an image.';
            //         $customMessages[$field.'.max'] = 'The image size must not exceed 2MB.';
            //     }
            // }

            $validator = Validator::make($data, $rules, $customMessages);
    
            // Check if validation fails
            if ($validator->fails()) {  
                // If validation fails, set error message and redirect back
                return redirect()->back()->with('error_message', $validator->errors()->first());
            }

            $software = new Software();

            $software->title = $data['title'];
            $software->desc = $data['desc'];
            $software->features = json_encode($data['features'], JSON_UNESCAPED_UNICODE); 
            $software->current_price = $data['current_price'];
            $software->before_price = $data['before_price'];
            $software->star_rating = $data['star_rating'];

            //   // Upload poster images
            //   if ($request->hasFile('poster_image')) {
            //     $image_tmp = $request->file('poster_image');
            //     if ($image_tmp->isValid()) {
            //         // Get image extension
            //         $extension = $image_tmp->getClientOriginalExtension();
            //         // Generate new image name
            //         $image_name = rand(111, 99999) . '.' . $extension;
            //         // Save image
            //         $image_path = 'admin/images/software_images/' . $image_name;
            //         Image::make($image_tmp)->save($image_path);
            //         // storing imagepath with name in data table
            //         $software->poster_image = $image_path;
            //     }
            // }
    

            // soring preview images in data table
            // foreach ($fileFields as $field) {
            //     if ($request->hasFile($field)) {
            //         $file = $request->file($field);
            //         if ($file->isValid()) {
            //             $fileName = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
            //             $filePath = 'admin/images/software_images/' . $fileName;
            //             $file->move(public_path('admin/images/software_images/'), $fileName);
            //             $software->{$field} = $filePath;
            //         }
            //     }
            // }
    
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
    public function updating_software(Request $request)
    {
        Session::put('page', 'software');
        $data = $request->all();
        
        $request->validate([
            'title' => 'required|max:70',
            'desc' => 'max:100',
            'features' => 'array',
            'poster_image' => 'image|max:2048',
        ]);

        $rules = [
            'title' => 'required|max:70',
            'desc' => 'max:100',
            'features' => 'array',
            'poster_image' => 'image|max:2048',
        ];

        $customMessages = [
            'title.required' => 'Enter Software Title',
        ];

        // $fileFields = ['image_1', 'image_2', 'image_3'];

        // foreach ($fileFields as $field) {
        //     if ($id === null || $request->hasFile($field)) {
        //         $rules[$field] = 'required|image|max:2048';
        //         $customMessages[$field.'.required'] = 'Enter Preview Image.';
        //         $customMessages[$field.'.image'] = 'The file must be an image.';
        //         $customMessages[$field.'.max'] = 'The image size must not exceed 2MB.';
        //     }
        // }

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
        if ($request->has('desc')) {
            $data->desc = $request->desc;
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
        if ($request->has('current_price')) {
            $data->current_price = $request->current_price;
        }
        if ($request->has('before_price')) {
            $data->before_price = $request->before_price;
        }
        if ($request->has('star_rating')) {
            $data->star_rating = $request->star_rating;
        }

        $data->save();

        return redirect('admin/software-list');
       
        // $software = Software::findOrFail($id);
        // return view('admin.software.update_software')->with(compact('software'));
    }
    public function deleteSoftware($id)
    {
        Session::put('page', 'software');
        Software::where('id', $id)->delete();
        return redirect('admin/software-list');
    }

}
