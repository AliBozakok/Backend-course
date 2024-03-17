<?php

namespace App\Http\Controllers;

use App\Models\studentCourse;
use Illuminate\Http\Request;

class studentCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentCourse= studentCourse::all();
        return response()->json(["data"=>$studentCourse]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input= $request->validate([
            'studentId'=>['required','numeric'],
            'courseId'=>['required','numeric'],
            'mark'=>['required','numeric']
        ]);
        studentCourse::create($input);
        return response()->json(["message"=>'studentCourse is added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $studentCourse=studentCourse::findOrFail($id);
        return response()->json(["data"=>$studentCourse]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input= $request->validate([
            'studentId'=>['required','numeric'],
            'courseId'=>['required','numeric'],
            'mark'=>['required','numeric']
        ]);
       $studentCourse= studentCourse::findOrFail($id);
       $studentCourse->update($input);
       return response()->json(["message"=>'studentCourse is updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $studentCourse= studentCourse::findOrFail($id);
        $studentCourse->delete();
        return response()->json(["message"=>'studentCourse is deleted successfully']);
    }
}
