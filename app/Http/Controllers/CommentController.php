<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{

    public function index()
    {
        try {
            $comment = Comment::with('commentable')->get();
            return response()->json(['message' => 'File uploaded successfully.', 'document' => $comment], 200);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json(["there is something wrong in server"],500);
        }
    }



    public function DocumentStoreComment(Request $request,Document $document){
        try {
            $comment = $document->comments()->create([
                'comment' =>$request->comment,
            ]);
            return response()->json(['message' => 'File uploaded successfully.', 'document' => $comment], 201);
        }catch (\Throwable $th) {
            Log::error($th);
            return response()->json(["there is something wrong in server"],500);
        }
    }
}
