<?php

namespace App\Http\Controllers;

use App\Models\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class FileUploadController extends Controller
{





    public function showForm()
    {
        $files = FileUpload::all();
        return view('file-upload-form', compact('files'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,docx,xlsx|max:2048',
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('uploads', $fileName, 'public');

        FileUpload::create([
            'name' => $fileName,
            'path' => 'uploads/' . $fileName,
        ]);

        return redirect()->back()->with('success', 'File uploaded successfully!');
    }


    public function preview($fileName)
    {
        $filePath = 'uploads/' . $fileName;
        $file = Storage::disk('public')->get($filePath);

        return Response::make($file, 200, [
            'Content-Type' => Storage::disk('public')->mimeType($filePath),
            'Content-Disposition' => 'inline; filename="' . $fileName . '"',
        ]);
    }





    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
    public function show(FileUpload $fileUpload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FileUpload $fileUpload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FileUpload $fileUpload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FileUpload $fileUpload)
    {
        //
    }
}
