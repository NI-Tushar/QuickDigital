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
                'poster_image' => 'required|image|max:2048',
            ];
    
            $customMessages = [
                'title.required' => 'Enter Software Title',
                'desc.required' => 'Enter Software Description',
                'features.array' => 'Enter Software Features',
                'current_price.required' => 'Enter Software Current Price',
                'before_price.required' => 'Enter Software Before price',
                'star_rating.required' => 'Enter Software Rating',
                'poster_image.required' => 'Enter Software Image',
            ];
    
            $fileFields = ['image_1', 'image_2', 'image_3'];

            foreach ($fileFields as $field) {
                if ($id === null || $request->hasFile($field)) {
                    $rules[$field] = 'required|image|max:2048';
                    $customMessages[$field.'.required'] = 'Enter Preview Image.';
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
            $software->desc = $data['desc'];
            $software->features = json_encode($data['features'], JSON_UNESCAPED_UNICODE); 
            $software->current_price = $data['current_price'];
            $software->before_price = $data['before_price'];
            $software->star_rating = $data['star_rating'];

              // Upload poster images
              if ($request->hasFile('poster_image')) {
                $image_tmp = $request->file('poster_image');
                if ($image_tmp->isValid()) {
                    // Get image extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate new image name
                    $image_name = rand(111, 99999) . '.' . $extension;
                    // Save image
                    $image_path = 'admin/images/software_images/' . $image_name;
                    Image::make($image_tmp)->save($image_path);
                    // storing imagepath with name in data table
                    $software->poster_image = $image_path;
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

            dd('all data saved');
        }
        if ($id != null) {
            dd($id);
        }else{
            return view('admin.software.add_software');
        }
    } 

    public function software_list()
    {
        $softwares = Software::all();
        return view('admin.software.software_list')->with(compact('softwares'));
    }

}
