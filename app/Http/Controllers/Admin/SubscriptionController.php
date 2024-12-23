<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminsPermission;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    public function index()
    {
        Session::put('page', 'sunscription');
        $Subscriptions = Subscription::get()->toArray();

        //set Subadmin Permission for Subscription package
        $subscriptionsModuleCount = AdminsPermission::where(['admin_id' => Auth::guard('admin')->user()->id, 'module' => 'subscriptions'])->count();
        $pagesModule = array();
        if (Auth::guard('admin')->user()->type == "admin") {
            $pagesModule['view_access'] = 1;
            $pagesModule['edit_access'] = 1;
            $pagesModule['full_access'] = 1;
        } else if ($subscriptionsModuleCount == 0) {
            $message = "This feature is restricted for you...!";
            return redirect('admin/dashboard')->with('error_message', $message);
        } else {
            $pagesModule = AdminsPermission::where(['admin_id' => Auth::guard('admin')->user()->id, 'module' => 'subscriptions'])->first()->toArray();
        }
        return view('admin.subscription.subscription')->with(compact('Subscriptions', 'pagesModule'));
    }

    public function edit(Request $request, $id = null)
    {
        Session::put('page', 'add_subscription');
        if ($id == "") {
            $title = "Add Subscription Package";
            $subscription = new Subscription;
            $message = "Subscription Package added successfully";
        } else {
            $title = "Edit CMS Page";
            $subscription = Subscription::findOrFail($id);
            $message = "Subscription Package edited successfully";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'name' => 'required',
                'price' => 'required',
                'duration' => 'required',
                'count' => 'required',
                'features' => 'required|array'
            ];

            $customMessages = [
                'name.required' => 'Subscription Package name is required',
                'price.required' => 'Subscription Packages price is required',
                'duration.required' => 'Subscription Packages duration is required',
                'count.required' => 'Please specify to download limit',
                'features.required' => 'Subscription Package features is required',
                'features.array' => 'Subscription Package features must be an array'
            ];

            $validator = Validator::make($data, $rules, $customMessages);

            // Check if validation fails
            if ($validator->fails()) {
                // If validation fails, set error message and redirect back
                return redirect()->back()->with('error_message', $validator->errors()->first());
            }

            $subscription->name = $data['name'];
            $subscription->price = $data['price'];
            $subscription->duration = $data['duration'];
            $subscription->count = $data['count'];
            $subscription->features = json_encode($data['features'], JSON_UNESCAPED_UNICODE); 
            $subscription->save();
            return redirect('admin/subscription')->with('success_message', $message);
        }
        $subscription->features = json_decode($subscription->features, true); 
        return view('admin.subscription.add_edit_subscription')->with(compact('title','subscription'));
    }

    public function destroy($id)
    {
        Subscription::where('id', $id)->delete();
        return redirect()->back()->with('success_message', 'Subscription deleted...!');
    }
}
