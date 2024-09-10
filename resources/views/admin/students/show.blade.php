@extends('admin.layout.master')
@section('style')
<link
        href="{{ asset('admin/assets') }}/css/dataTables.bootstrap4.css"
        rel="stylesheet"
      />
@endsection
@section('content')
<div class="row">
    <div class="col-12">
    <div class="card">
        @if(Session::has('msg'))
        <div class="alert alert-success">{{ Session::get('msg'); }}</div>
        @endif
        <div class="card-body">
          <h5 class="card-title">Basic Datatable</h5>
          <div class="table-responsive">
            <table
              id="zero_config"
              class="table table-striped table-bordered"
            >
              <tbody>
                <tr>
                  <th>Code</th>
                  <td>{{ $student->code }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $student->std_name }}</td>
                  </tr>
                  <tr>
                    <th>Name</th>
                    <td>{{ $student->std_name }}</td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td>{{ $student->email }}</td>
                  </tr>
                  <tr>
                    <th>Phone</th>
                    <td>{{ $student->phone }}</td>
                  </tr>
                  <tr>
                    <th>Department</th>
                    <td>{{ $student->department->dept_name }}</td>
                  </tr>
                  <tr>
                    <th>photo</th>
                    <td>
                        @if(!empty($student->photo))
                        <img src="{{ asset('storage/'.$student->photo) }}" width="70" height="70"></td>
                        @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Tablet</th>
                    <td>{{ $student->tablet->tablet_name }}</td>
                  </tr>
                  <tr>
                    <th>Courses</th>
                    <td>
                        <ul>
                        @foreach ($student->courses as $course)
                            <li>{{ $course->course_name ."=>". $course->pivot->degree}}</li>
                        @endforeach
                    </ul>
                    </td>
                  </tr>
              </tbody>
            </table>
            <form method="post" action="{{ route('students.addCourses',$student->code) }}">
                @csrf
                <select class="form-control" name="courses[]" multiple size="2" style="height: 100px">
                    @foreach ($courses as $crs)
                    <option value="{{ $crs->course_id }}">{{ $crs->course_name }}</option>
                    @endforeach
                </select>
                <input type="submit" class="btn btn-primary mt-2" value="Add">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script src="{{ asset('admin/assets') }}/js/datatables.min.js"></script>
<script>
  /****************************************
   *       Basic Table                   *
   ****************************************/
  $("#zero_config").DataTable();
@endsection
