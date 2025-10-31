<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolGrade;

class SchoolGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades=\App\Models\SchoolGrade::all();

        return view('school_grades.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('school_grades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id'=>'required|integer|exists:students,id',
            'grade'=>'nullable|integer|min:1|max:6',
            'term'=>'nullable|string|max:3',
            'japanese'=>'nullable|integer|min:0|max:100',
            'math'=>'nullable|integer|min:0|max:100',
            'science'=>'nullable|integer|min:0|max:100',
            'social_studies'=>'nullable|integer|min:0|max:100',
            'music'=>'nullable|integer|min:0|max:100',
            'home_economics'=>'nullable|integer|min:0|max:100',
            'english'=>'nullable|integer|min:0|max:100',
            'art'=>'nullable|integer|min:0|max:100',
            'health_and_physical_education'=>'nullable|integer|min:0|max:100',
        ]);

        $grade=new \App\Models\SchoolGrade();
        $grade->student_id=$request->student_id;
        $grade->grade=$request->grade;
        $grade->term=$request->term;
        $grade->japanese=$request->japanese;
        $grade->math=$request->math;
        $grade->science=$request->science;
        $grade->social_studies=$request->social_studies;
        $grade->music=$request->music;
        $grade->home_economics=$request->economics;
        $grade->english=$request->english;
        $grade->art=$request->art;
        $grade->health_and_physical_education=$request->health_and_physical_education;

    
        $grade->save();

        return redirect()->route('school-grades.index')->with('status','登録しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $grade=\App\Models\SchoolGrade::findOrFail($id);
        return view('school_grades.edit',compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated=$request->validate([
            'math'=>'required|integer|min:0|max:100',
            'english'=>'required|integer|min:0|max:100',
            'science'=>'required|integer|min:0|max:100',
        ]);

        $grade=\App\Models\SchoolGrade::findOrFail($id);
        
        $grade->math=$validated['math'];
        $grade->english=$validated['english'];
        $grade->science=$validated['science'];
        $grade->save();

        return redirect()->route('school-grades.index')->with('status','更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $grade=\App\Models\SchoolGrade::findOrFail($id)->delete();

        return redirect()->route('school-grades.index')->with('status','削除しました');
    }
}
