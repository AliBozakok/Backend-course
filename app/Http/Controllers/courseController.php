<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class courseController extends Controller
{
    public function index()
    {
      $courses= Course::all();
      return response()->json(["data"=>$courses]);
    }
    public function show(String $id)
    {
        $courses= Course::findOrFail($id);
        return response()->json(["data"=>$courses]);
    }

}
