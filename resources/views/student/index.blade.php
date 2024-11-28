@extends('layouts.invention')

@section('titulo', 'Brows Student ')

@section('contenido')
<h1>Students</h1>  


<div class="d-flex mb-3">
    <a href="{{ route('students.create') }}" class="btn btn-primary me-2">Add Student</a>

    <!-- Filtro por nombre -->
    <form method="GET" action="{{ route('students.index') }}" class="me-2">
        <select name="sort_name" class="form-select" onchange="this.form.submit()">
            <option value="">Sort by Name</option>
            <option value="asc" {{ request('sort_name') == 'asc' ? 'selected' : '' }}>A-Z</option>
            <option value="desc" {{ request('sort_name') == 'desc' ? 'selected' : '' }}>Z-A</option>
        </select>
    </form>

    <!-- Filtro por curso -->
    <form method="GET" action="{{ route('students.index') }}">
        <select name="course_id" class="form-select" onchange="this.form.submit()">
            <option value="">Filter by Course</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>
                    {{ $course->name }}
                </option>
            @endforeach
        </select>
    </form>
</div>

@if(session('success'))  
    <div class="alert alert-success">{{ session('success') }}</div>  
@endif

<table class="table table-striped">  
    <thead>  
        <tr>  
            <th>Name</th>  
            <th>Email</th>  
            <th>Actions</th>  
        </tr>  
    </thead>  
    <tbody>  
        @foreach ($students as $student)  
            <tr>  
                <td>{{ $student->name }}</td>  
                <td>{{ $student->email }}</td>  
                <td>  
                    <a href="{{ route('students.show', $student) }}" class="btn btn-primary">Show</a>  
                    <a href="{{ route('students.edit', $student) }}" class="btn btn-warning">Edit</a>  
                    <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline-block;">  
                        @csrf  
                        @method('DELETE')  
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>  
                    </form>  
                </td>  
            </tr>  
        @endforeach  
    </tbody>  
</table>  

@endsection