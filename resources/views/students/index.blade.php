@extends('layout.app')
@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Student Management System</h2>
            </div>
            <div class="pull-right mb-2">
               <a class="btn btn-success" href="{{ route('students.create') }}"> Create Student</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Gender</th>
            <th scope="col">Reporting Teacher</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($students as $student)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $student->student_name }}</td>
            <td>{{ $student->age }}</td>
            <td>{{ $student->gender_text }}</td>
            <td>{{ $student->teacher->teacher_name}}</td>
            <td>
                <form action="{{ route('students.destroy',encrypt($student->student_id)) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('students.edit',encrypt($student->student_id)) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
          </tr>
        @endforeach
        </tbody>
        {!! $students->links() !!}
      </table>


@endsection
