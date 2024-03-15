<?php

namespace App\Http\Controllers;

use App\Http\Requests\studentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $studens= Student::all();
       return response()->json(["dtat"=>$studens]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(studentRequest $request)
    {
        $input= $request->validated();
        Student::create($input);
        return response()->json(["message"=>" student is added succcessfully"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $studen= Student::findOrFail($id);
        return response()->json(["data"=>$studen]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input= $request->validated();
        $studen=Student::findOrFail($id);
        $studen->update($input);
        return response()->json(["message"=>" student is updated succcessfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student=Student::findOrFail($id);
        $student->delete();
        return response()->json(["message"=>" student is deleted succcessfully"]);
    }
}
