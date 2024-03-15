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
    public function store (Request $request)
    {
          $input=$request->validate([
            'name'=>['required'],
            'symbol'=>['required'],
            'unit'=>['required']
          ]);
          Course::create($input);
          return response()->json(["message"=>"course is added successfully"]);
    }
     public function update (Request $request,String $id)
     {
        $input=$request->validate([
            'name'=>['required'],
            'symbol'=>['required'],
            'unit'=>['required']
          ]);
          $course= Course::findOrFail($id);
          $course->update($input);
          return response()->json(["message"=>"course is updated successfully"]);
        }
    public function destroy (String $id)
    {
        $course= Course::findOrFail($id);
        $course->delete();
        return response()->json(["message"=>"course is deleted successfully"]);
    }

     }


