<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminsPermission;
use Illuminate\Http\Request;
use App\Models\DigitalserviesAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class AdminDigitalServiceController extends Controller
{

    public function add_digService(Request $request)
    {
        Session::put('page', 'digitalService');
        if ($request->isMethod('post')) {
            $data = $request->all();
            
            
            $request->validate([
                'title' => 'required|max:100',
                'description' => 'max:800',
                'features' => 'array',
                'thumbnail' => 'image|max:2048',
            ]);

            $rules = [
                'title' => 'required|max:100',
                'description' => 'max:800',
                'features' => 'array',
                'thumbnail' => 'image|max:2048',
            ];
    
            $customMessages = [
                'title.required' => 'Enter Product Title',
                'description.required' => 'Enter Product descriptionription',
                'features.array' => 'Enter Product Features',
            ];


            $validator = Validator::make($data, $rules, $customMessages);
    
            // Check if validation fails
            if ($validator->fails()) {  
                // If validation fails, set error message and redirect back
                return redirect()->back()->with('error_message', $validator->errors()->first());
            }

            $digProd = new DigitalserviesAdmin();

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
                    $image_path = 'admin/images/digital_service/' . $image_name;
                    Image::make($image_tmp)->save($image_path);
                    // storing imagepath with name in data table
                    $digProd->thumbnail = $image_path;
                }
            }

            $digProd->save();
            return redirect()->route('digialservice.list');
        }else{
            return view('admin.digital_service.add_service');
        }
    } 

    public function digialservice_list()
    {
        Session::put('page', 'digitalService');
        $digService = DigitalserviesAdmin::all();
        return view('admin.digital_service.service_list')->with(compact('digService'));
    }

    public function update_service($id)
    {
        Session::put('page', 'digitalService');
        $services = DigitalserviesAdmin::findOrFail($id);
        return view('admin.digital_service.update_service')->with(compact('services'));
    }

    public function updating_digService(Request $request)
    {
        Session::put('page', 'digitalService');
        $data = $request->all();
        
        
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'max:800',
            'features' => 'array',
            'thumbnail' => 'image|max:2048',
        ]);

        $rules = [
            'title' => 'required|max:100',
            'description' => 'max:800',
            'features' => 'array',
            'thumbnail' => 'image|max:2048',
        ];

        $customMessages = [
            'title.required' => 'Enter Product Title',
            'description.required' => 'Enter Product descriptionription',
            'features.array' => 'Enter Product Features',
        ];



        $validator = Validator::make($data, $rules, $customMessages);
        // Check if validation fails

        if ($validator->fails()) {  
        // If validation fails, set error message and redirect back
            return redirect()->back()->with('error_message', $validator->errors()->first());
        }

        // Fetch the record by ID
        $id = $request->id;
        $data = DigitalserviesAdmin::findOrFail($id);

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
        

        // Upload poster images
        if ($request->hasFile('thumbnail')) {
            $image_tmp = $request->file('thumbnail');
            if ($image_tmp->isValid()) {
                // Get image extension
                $extension = $image_tmp->getClientOriginalExtension();
                // Generate new image name
                $image_name = rand(111, 99999) . '.' . $extension;
                // Save image
                $image_path = 'admin/images/digital_service/' . $image_name;
                Image::make($image_tmp)->save($image_path);
                // storing imagepath with name in data table
                $data->thumbnail = $image_path;
            }
        }
        $data->save();
        return redirect()->route('digialservice.list');
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



    public function deleteService($id)
    {
        Session::put('page', 'digitalService');
        DigitalserviesAdmin::where('id', $id)->delete();
        return redirect()->route('digialservice.list');
    }

}
