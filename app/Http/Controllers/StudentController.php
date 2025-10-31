<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(Request $request)
{
    $query = Student::query();

    if ($request->filled('keyword')) {
        $keyword = $request->input('keyword');
        $query->where('name', 'LIKE', "%{$keyword}%");
    }

    if ($request->filled('sort')) {
        if ($request->sort === 'asc') {
            $query->orderBy('grade', 'asc');
        } elseif ($request->sort === 'desc') {
            $query->orderBy('grade', 'desc');
        }
    }

    $students = $query->get();

    return view('students.index',['students' => $students]);
}

public function create()
{
    return view('students.create');
}

public function store(Request $request)
{
    $student = new \App\Models\Student();
    $student->name = $request->name;
    $student->grade = $request->grade;
    $student->address = $request->address;
    $student->comment = $request->comment;
    $student->save();

    return redirect('/students');
}

public function edit($id)
{
    $student = Student::find($id);
    return view('students.edit', compact('student'));
}

public function update(Request $request, $id)
{
    $student = Student::find($id);
    $student->name = $request->name;
    $student->grade = $request->grade;
    $student->address = $request->address;
    $student->comment = $request->comment;
    $student->save();

    return redirect('/students');
}

public function destroy($id)
{
    $student = Student::find($id);
    $student->delete();

    return redirect('/students');
}

public function show($id)
{
    $student=Student::findOrFail($id);
    return view('students.show',compact('student'));
}
}