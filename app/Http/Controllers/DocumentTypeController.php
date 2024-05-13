<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Illuminate\Http\Request;

class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doc_type = DocumentType::all();
        $doc_type = DocumentType::with('documents')->get();

        return response()->json([
            'status' => 'succes',
            'data' => $doc_type
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
        ]);
        $doc_type = DocumentType::create([
            'name'=>$request->name,
        ]);

        return response()->json([
            'status' => 'succes',
            'data' => $doc_type
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(DocumentType $documentType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DocumentType $documentType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $documentType = DocumentType::findOrFail($id);
        $documentType->delete();
        return response()->json(['message' => 'Document deleted successfully.','data' => $documentType], 200);
    }
}
