@extends('layout.app')
@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb pt-5">
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('student-marks.index') }}"> Back</a>
            </div>
            <div class="pull-left mb-2">
                <h2>Add Student Mark</h2>
            </div>

    </div>
</div>
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
       {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('student-marks.update',encrypt($student_mark->mark_id)) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
    <strong>Studnet Name:</strong>
    <select class="form-control" name="student_name">
        @foreach($students as $student)
          <option value="{{$student->student_id}}"
            @if($student_mark->student_id == $student->student_id)
                selected
            @endif

            >{{$student->student_name}}</option>
        @endforeach
    </select>
    @error('student_name')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>


    <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
    <strong>Term:</strong>
    <select class="form-control" name="term_id">
        @foreach($terms as $term)
          <option value="{{$term->term_id}}"
            @if($student_mark->term_id == $term->term_id)
            selected
        @endif>{{$term->term}}</option>
        @endforeach
      </select>
    @error('term_id')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">

        <h5>Marks</h5>
        <div class="col-md-4">
        <strong>Maths:</strong>
        <input type="number" name="maths_mark" class="form-control" placeholder="Maths" min="0" max="50" value="{{$student_mark->maths_mark}}">
            @error('maths_mark')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
        <strong>Science:</strong>
        <input type="number" name="science_mark" class="form-control" placeholder="Science" min="0" max="50" value="{{$student_mark->science_mark}}">
            @error('science_mark')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
        <strong>History:</strong>
        <input type="number" name="history_mark" class="form-control" placeholder="History" min="0" max="50"  value="{{$student_mark->history_mark}}">
            @error('history_mark')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>

        </div>
    <div  class="align-center m-2 col-md-6">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
@endsection
