
@extends('layouts.app')

@section('content')


<form action="{{ isset($student) ? route('students.update', $student) : route('students.store') }}" method="POST">
    @csrf
    @if(isset($student))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $student->name ?? '') }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $student->email ?? '') }}" required>
    </div>
    <div class="form-group">
      <label for="course_id">Curso id</label>
      <input type="course_id" name="course_id" class="form-control" value="{{ old('course_id', $student->course_id ?? '') }}" required>
  </div>

   
</form>
@endsection
