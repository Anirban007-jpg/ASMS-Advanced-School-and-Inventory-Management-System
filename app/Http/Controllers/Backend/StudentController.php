<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

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
}
