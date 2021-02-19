<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\StudentYear;

class StudentController extends Controller
{
    //
    public function ViewStudentClass(){
        $data['alldata'] = StudentClass::all();
        return view('backend.admin.studentClass.view_class', $data);
    }

    public function AddStudentClass(){
        return view('backend.admin.studentClass.add_class');
    }

    public function StoreStudentClass(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name'
        ]);

        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Class Inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.class.view')->with($notification);
    }

    public function DeleteStudentClass($id){
        $user = StudentClass::find($id);
        $user->delete();
        $notification = array(
            'message' => 'Class deleted successfully',
            'alert-type' => 'danger'
        );

        return redirect()->route('student.class.view')->with($notification);
    }

    public function ViewStudentYear(){
        $data['alldata'] = StudentYear::all();
        return view('backend.admin.studentYear.view_year', $data);
    }

    public function AddStudentYear(){
        return view('backend.admin.studentYear.add_year');
    }

    public function EditStudentYear($id){
        $data['alldata'] = StudentYear::find($id);
        return view('backend.admin.studentYear.edit_year', $data);
    }

    public function StoreStudentYear(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name'
        ]);

        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year Inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.view')->with($notification);
    }

    public function UpdateStudentYear($id, Request $request){
      $updatedData = StudentYear::find($id);
      $updatedData->name = $request->name;
      
      $updatedData->save();

      $notification = array(
        'message' => 'Student Year updated successfully',
        'alert-type' => 'info'
    );

    return redirect()->route('student.year.view')->with($notification);
      
    }
}
