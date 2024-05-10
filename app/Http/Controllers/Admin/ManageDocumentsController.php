<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManageDocument;
use Illuminate\Http\Request;

class ManageDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = ManageDocument::latest()->simplePaginate('10');
        return view('admin.manageDocument.index', compact('documents'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:manage_documents|',
            'document_description' => 'nullable|string|max:255',
            'document' => 'required|mimes:png,jpg,pdf,doc,docx|max:2024|file'
        ]);
        if ($request->hasFile('document')) {
            // Delete existing photo if it exists
            // if ($user && $user->additional_file && file_exists(public_path($user->additional_file))) {
            //     unlink(public_path($user->additional_file));
            // }

            $image = $request->file('document');
            $fileExtension = $image->getClientOriginalExtension();
            $file_name = hexdec(uniqid()) . '.' . $fileExtension;
            $imagePath = 'upload/documents/' . $file_name;
            $image->move(public_path('upload/documents/'), $file_name);
        }

        ManageDocument::create([
            'title' => $request->title,
            'document' => $imagePath,
            'document_description' => $request->document_description
        ]);
        $notification = [
            'message' => 'Document Uploaded successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);


    }

    /**
     * Display the specified resource.
     */
    public function show($manageDocument)
    {
        $manageDocument = ManageDocument::find($manageDocument);
        //dd($manageDocument);
        return view('admin.manageDocument.show', compact('manageDocument'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ManageDocument $manageDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ManageDocument $manageDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($manageDocument)
    {
        $manageDocument = ManageDocument::find($manageDocument);

        if ($manageDocument->delete()) {
            // Delete existing photo if it exists
            if ($manageDocument->document && file_exists(public_path($manageDocument->document))) {
                 unlink(public_path($manageDocument->document));
             }
        }
        $notification = [
            'message' => 'Document Deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);

    }
}
