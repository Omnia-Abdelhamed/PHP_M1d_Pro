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
              <thead>
                <tr>
                  <th>Code</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @forelse ($data as $student)
                <tr>
                    <td>{{ $student->code }}</td>
                    <td>{{ $student->std_name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>
                      <form action="{{ route('students.restore',$student->code) }}" method="post" class="d-inline">
                          @csrf
                          <input type="submit" value="restore" class="btn btn-success">
                      </form>
                      <form action="{{ route('students.forceDelete',$student->code) }}" method="post" class="d-inline">
                          @csrf
                          @method('delete')
                          <input type="submit" value="delete" class="btn btn-danger">
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="5" class="text-danger">no data</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
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
