@extends('template')
@section('content')
<h1>Edit Course</h1>
<form action="{{ route('courses.update', $course) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" id="name" value="{{ $course->name }}" required><br>
    <input type="text" name="code" id="code" value="{{ $course->code }}" required><br>
    <input type="submit" value="Update Course">
</form>
@endsection