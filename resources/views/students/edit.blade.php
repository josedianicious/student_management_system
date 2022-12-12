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
    <form action="{{ route('students.update',encrypt($student->student_id)) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
    <strong>Studnet Name:</strong>
    <input type="text" name="student_name" class="form-control" placeholder="Name" value="{{$student->student_name}}">
    @error('student_name')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
    <strong>Age:</strong>
    <input type="number" name="age" class="form-control" placeholder="Age" min="3" max="50"  value="{{$student->age}}">
    @error('age')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
        <strong>Gender:</strong><br>
        <input type="radio" name="gender" value="1" @if ($student->gender == 1)
            checked
        @endif> Male
        <input type="radio" name="gender" value="2" @if ($student->gender == 2)
        checked
    @endif> Female<br>
        @error('gender')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <img src="{{asset('storage/images/'.$student->image)}}" alt="{{$student->student_name}}" class="img-thumbnail w-25">
        <div class="form-group">
        <strong>Studnet Photo:</strong>
        <input type="file" name="student_photo" class="form-control">
        @error('student_photo')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
    <strong>Reporting Teacher:</strong>
    <select class="form-control" name="teachers_id">
        @foreach($teachers as $teacher)
          <option value="{{$teacher->teacher_id}}" @if ($student->teacher_id == $teacher->teacher_id)
            selected
          @endif>{{$teacher->teacher_name}}</option>
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
