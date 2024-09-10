<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){}
    public function show($id){
        $department=Department::class::findorfail($id);
        $students=$department->students()->pluck('std_name');
        foreach($students as $student){ // $student
            echo $student." , ";
        }
    }
}
