<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
          $students = Student::all();
            return response()->json($students);
        } catch (\Exception $e) {
            return response()->json([
                  'message' => 'Error: ' .
                  $e->getMessage(),
                  'code' => $e->getCode()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required',
            'schoolClass' => 'required'
        ]);
        try {
            $student = new Student();
            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->age = $request->age;
            $student->schoolClass = $request->schoolClass;
            $student->save();
            return response()->json([$student,
                'message' => 'Student created successfully',
                'code' => 200,

            ] );
        } catch (\Exception $e) {
            return response()->json([
                  'message' => 'Error: ' .
                  $e->getMessage(),
                  'code' => $e->getCode()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {
            $student = Student::find($id);
            return response()->json($student);
        } catch (\Exception $e) {
            return response()->json([
                  'message' => 'Error: ' .
                  $e->getMessage(),
                  'code' => $e->getCode()
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required',
            'schoolClass' => 'required'
        ]);
        try {
            $student = Student::find($id);
            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->age = $request->age;
            $student->schoolClass = $request->schoolClass;
            $student->save();
            return response()->json([$student,
                'message' => 'Student updated successfully',
                'code' => 200,

            ] );
        } catch (\Exception $e) {
            return response()->json([
                  'message' => 'Error: ' .
                  $e->getMessage(),
                  'code' => $e->getCode()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $student = Student::find($id);
            $student->delete();
            return response()->json([
                'message' => 'Student deleted successfully',
                'code' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                    'message' => 'Student does not exist: ' .
                    $e->getMessage(),
                    'code' => $e->getCode()
            ]);
        }
    }
}
