@extends('layout.app')
@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Student Management System</h2>
            </div>
            <div class="pull-right mb-2">
               <a class="btn btn-success" href="{{ route('student-marks.create') }}"> Add Student's Term Mark</a>
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
            <th scope="col">Maths</th>
            <th scope="col">Science</th>
            <th scope="col">History</th>
            <th scope="col">Term</th>
            <th scope="col">Total Mark</th>
            <th scope="col">Created On</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($student_marks as $student_mark)

          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $student_mark->student->student_name}}</td>
            <td>{{ $student_mark->maths_mark }}</td>
            <td>{{ $student_mark->science_mark }}</td>
            <td>{{ $student_mark->history_mark}}</td>
            <td>{{ $student_mark->term->term }}</td>
            <td>{{ $student_mark->total_mark }}</td>
            <td>{{ $student_mark->created_on }}</td>

            <td>
                <form action="{{ route('student-marks.destroy',encrypt($student_mark->mark_id)) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('student-marks.edit',encrypt($student_mark->mark_id)) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
          </tr>
        @endforeach
        </tbody>
        {!! $student_marks->links() !!}
      </table>

@endsection
