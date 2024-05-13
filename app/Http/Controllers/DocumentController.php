<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $document=Cache::remember('documents',60,function(){
            return  Document::all();
            return  Document::with('comments')->get();
        });
        return response()->json(['message' => 'File Back successfully.', 'document' => $document], 202);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentRequest $request)
    {


        $document = Document::Create([
            'title' => $request->title,
            'description' => $request->description,
            'document_type_id' => $request->document_type_id,
            'user_id' => $request->user_id,
            'file_path' => $request->file_path,
        ]);
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('files'), $fileName);
            $document->file_path = $fileName;
        }
        $document->comments()->create([
            'comment'=>$request->comment
        ]);
        $document->save();
        return response()->json(['message' => 'File uploaded successfully.', 'document' => $document], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {

        // if ($request->hasFile('file_path')) {
        //     $file = $request->file('file_path');
        //     $fileName = $file->getClientOriginalName();
        //     $file->move(public_path('files'), $fileName);

        //     // Update file path in the database
        //     $document->file_path = $fileName;
        // }
        $document->title = $request->input('title') ?? $document->title;
        $document->description = $request->input('description')?? $document->description;
        $document->user_id = $request->input('user_id')?? $document->user_id;
        $document->document_type_id = $request->input('document_type_id')??$document->document_type_id;
        $document->file_path = $request->input('file_path')?? $document->file_path;

        $document->save();

        return response()->json(['message' => 'File Updated successfully.', 'document' => $document], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $document = Document::findOrFail($id);

        // Get the file name from the document's file_path
        $fileName = $document->file_path;

        // Construct the full file path
        $filePath = public_path('files/' . $fileName);

        // Check if the file exists before attempting to delete it
        if (file_exists($filePath)) {
            // Delete the file from the storage
            unlink($filePath);
        }

        // Delete the document from the database
        $document->delete();

        return response()->json(['message' => 'Document deleted successfully.'], 200);
    }
}
