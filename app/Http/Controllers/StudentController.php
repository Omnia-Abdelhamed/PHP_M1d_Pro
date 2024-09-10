<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\student;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $data=student::get(); // select * from students
        return view('admin.students.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments=Department::get();
        return view('admin.students.create',compact('departments'));
    }


    public function store(StudentRequest $request){
        $data=$request->validated();
        if(!empty($request->photo)){
            $file=$request->file('photo'); // from
            $photoExt=$file->getClientOriginalExtension();
            $photoName=$request->code.".".$photoExt; // name => to\
            $photo=$file->storeAs('images',$photoName); // public => rfergfer
            $data['photo']=$photo;
        }
        student::create($data);
        return redirect()->back()->with('msg','Added Successfully..');
    }

    public function show($id)
    {
        $student=student::findorfail($id);
        $courses=Course::get();
         // select * from students where code=123
        // $data->tablet->tablet_name;
        // foreach($data->courses as $course){
        //     echo $course->students_courses->degree." , ";
        // }
        //return $data->department->dept_name;

        return view('admin.students.show',compact('student','courses'));
    }
    public function edit($id)
    {
        $student=student::findorfail($id);
        $departments=Department::get();
        return view('admin.students.edit',compact('student','departments'));
    }
    public function update(StudentRequest $request,$id){
        $student=student::findorfail($id);
        $student->update([
            'std_name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'dept_id'=>$request->department,
        ]);
        return redirect()->back()->with('msg','updated Successfully..');

    }

    public function destroy($id){
        $student=student::findorfail($id);
        $photo=$student->photo;
        if(!empty($photo) && Storage::exists($photo)){
            Storage::delete($photo);
            if(empty(Storage::files('images'))){
                Storage::deleteDirectory('images');
            }
        }
        $student->delete();
        return redirect()->back()->with('msg','deleted Successfully..');
    }

    public function archive(){
        $data=student::onlyTrashed()->get();
        return view('admin.students.archive',compact('data'));
    }

    public function forceDelete($id){

        // $student=student::withTrashed()->where('code',$id)->get();
        // return $student->photo;
        // return student::onlyTrashed()->get();
        // if(!empty($student->photo) && Storage::exists($student->photo)){
        //     Storage::delete($student->photo);
        // }
        //$student->forceDelete();
        //return redirect()->back()->with('msg','deleted Successfully..');

    }
    public function restore($id){
        $student=student::withTrashed()->where('code',$id);
        $student->restore();
        return redirect()->route('students.index')->with('msg','restored Successfully..');
    }
    public function addCourses(Request $request,$id){
        $student=Student::findorfail($id);
        $student->courses()->syncWithoutDetaching($request->courses);
        return redirect()->back();
    }
}
