@extends('layout.app')
@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb pt-5">
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('students.index') }}"> Back</a>
            </div>
            <div class="pull-left mb-2">
                <h2>Create Student</h2>
            </div>

    </div>
</div>
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
       {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
    <strong>Studnet Name:</strong>
    <input type="text" name="student_name" class="form-control" placeholder="Name">
    @error('student_name')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
    <strong>Age:</strong>
    <input type="number" name="age" class="form-control" placeholder="Age" min="3" max="50">
    @error('age')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
        <strong>Gender:</strong><br>
        <input type="radio" name="gender" value="1"> Male
        <input type="radio" name="gender" value="2"> Female<br>
        @error('gender')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
    <strong>Reporting Teacher:</strong>
    <select class="form-control" name="teachers_id">
        @foreach($teachers as $teacher)
          <option value="{{$teacher->teacher_id}} ">{{$teacher->teacher_name}}</option>
        @endforeach
      </select>
    @error('teachers_id')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div  class="align-center m-2 col-md-6">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
@endsection
