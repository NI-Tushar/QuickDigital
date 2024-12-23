<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class EbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ebooks()
    {
        Session::put('page', 'ebooks');

        $ebooks = Ebook::all();

        return view('admin.ebook.ebooks')->with(compact('ebooks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form and submit the form for both adding and editing the specified resource.
     */
    public function addEditEbook(Request $request, $id = null)
    {
        if ($id == '') {
            $title = "Add E-book";
            $ebook = new Ebook;
            $message = "Ebook added successfully";
        } else {
            $title = "Edit E-book";
            $ebook = Ebook::findOrFail($id);
            $message = "Ebook updated successfully";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'title' => 'required|string|max:255',
                'cover_image' => 'nullable|image|max:5000',
                'pdf' => 'nullable|mimes:pdf|max:40000',
                'price' => 'required|numeric|min:0',
                'total_page' => 'required|integer|min:1',
                'release_date' => 'required|date',
                'author' => 'nullable|max:255',
                'description' => 'nullable'
            ];

            $customMessages = [
                'title.required' => 'শিরোনাম প্রদান করা আবশ্যক।',
                'title.string' => 'শিরোনাম অবশ্যই একটি লেখা হতে হবে।',
                'title.max' => 'শিরোনাম সর্বাধিক ২৫৫ অক্ষরের মধ্যে থাকতে হবে।',
                'cover_image.image' => 'কভার ইমেজ অবশ্যই একটি বৈধ ছবি হতে হবে।',
                'cover_image.max' => 'কভার ইমেজ সর্বাধিক ২ এমবি আকারের হতে পারে।',
                'pdf.mimes' => 'ফাইলটি অবশ্যই PDF ফরম্যাটে হতে হবে।',
                'pdf.max' => 'PDF ফাইল সর্বাধিক ১০ এমবি আকারের হতে পারে।',
                'price.required' => 'মূল্য প্রদান করা আবশ্যক।',
                'price.numeric' => 'মূল্য অবশ্যই একটি সংখ্যার হতে হবে।',
                'price.min' => 'মূল্য শূন্য বা তার বেশি হতে হবে।',
                'total_page.required' => 'মোট পৃষ্ঠা সংখ্যা প্রদান করা আবশ্যক।',
                'total_page.integer' => 'মোট পৃষ্ঠা সংখ্যা একটি পূর্ণসংখ্যা হতে হবে।',
                'total_page.min' => 'মোট পৃষ্ঠা সংখ্যা অন্তত ১ হতে হবে।',
                'release_date.required' => 'প্রকাশের তারিখ প্রদান করা আবশ্যক।',
                'release_date.date' => 'প্রকাশের তারিখটি একটি বৈধ তারিখ হতে হবে।',
                'author.max' => 'সর্বাধিক ২৫৫ অক্ষরের মধ্যে থাকতে হবে।',
            ];

            $validator = Validator::make($data, $rules, $customMessages);


            if ($validator->fails()) {
                return redirect()->back()->with('error_message', $validator->errors()->first());
            }

            // Handle file uploads
            $fileFields = ['cover_image', 'pdf'];
            foreach ($fileFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    if ($file->isValid()) {
                        $fileName = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                        $filePath = 'admin/images/ebook_images/' . $fileName;
                        $file->move(public_path('admin/images/ebook_images/'), $fileName);
                        $ebook->{$field} = $filePath;
                    }
                } else {
                    if ($id !== null) {
                        // Editing existing entry
                        if ($field === 'cover_image' && empty($request->{$field})) {
                            // If no cover image is uploaded, keep the existing one
                            $ebook->{$field} = $ebook->{$field};
                        }
                        if ($field === 'pdf' && empty($request->{$field})) {
                            // If no PDF file is uploaded, keep the existing one
                            $ebook->{$field} = $ebook->{$field};
                        }
                    } else {
                        // Adding new entry
                        if ($field === 'cover_image') {
                            // If no cover image is uploaded, store "no_image.jpg"
                            $ebook->{$field} = 'no_image.jpg';
                        }
                    }
                }
            }

            $ebook->title = $data['title'];
            $ebook->price = $data['price'];
            $ebook->total_page = $data['total_page'];
            $ebook->release_date = $data['release_date'];
            $ebook->author = $data['author'];
            $ebook->description = $data['description'];

            $ebook->save();

            return redirect('admin/ebooks')->with('success_message', $message);
        }
        return view('admin.ebook.add_edit_ebook')->with(compact('title', 'ebook'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ebook = Ebook::find($id);

        if (!$ebook) {
            return redirect()->back()->with('error_message', 'Ebook not found');
        }

        $ebook->delete();
        return redirect()->back()->with('success_message', 'Ebook deleted successfully');
    }
}
