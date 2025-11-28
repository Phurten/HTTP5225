@extends('template')
@section('content')
<h1>Add New Course</h1>
<form action="{{ route('courses.store') }}" method="POST">
    @csrf
    <input type="text" name="name" id="name" placeholder="Course Name"><br>
    <input type="text" name="code" id="code" placeholder="Course Code"><br>
    <input type="submit" value="Add Course">
</form>
@endsection