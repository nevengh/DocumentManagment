<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::all();
        $user = User::with('documents')->get();
        return response()->json(['message' => 'File Back successfully.', 'document' => $user], 202);
    }
}
